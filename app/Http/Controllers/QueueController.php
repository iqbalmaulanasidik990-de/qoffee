<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class QueueController extends Controller
{
    /**
     * Store Queue
     */
    public function store(Request $request)
    {
        // VALIDATION

        $request->validate([

            'customer_name' => 'required|min:3',

            'phone' => 'required|numeric|digits_between:10,13',

        ], [

            'customer_name.required' => 'Nama wajib diisi',

            'customer_name.min' => 'Nama minimal 3 karakter',

            'phone.required' => 'Nomor HP wajib diisi',

            'phone.numeric' => 'Nomor HP harus angka',

            'phone.digits_between' => 'Nomor HP harus 10 sampai 13 digit',

        ]);

        // VALIDASI MINIMAL ORDER

        if (
            $request->latte < 1 &&
            $request->americano < 1 &&
            $request->cappuccino < 1
        ) {

            return back()
                ->withErrors([
                    'menu' => 'Minimal pesan 1 menu coffee'
                ])
                ->withInput();
        }

        // AMBIL NOMOR ANTREAN TERAKHIR

        $lastQueue = Queue::latest()->first();

        if ($lastQueue) {

            $lastNumber = (int) substr($lastQueue->queue_number, 2);

            $newNumber = $lastNumber + 1;

        } else {

            $newNumber = 1;
        }

        // FORMAT NOMOR ANTREAN

        $queueNumber = 'A-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        // HARGA MENU

        $lattePrice = 28000;

        $americanoPrice = 20000;

        $cappuccinoPrice = 25000;

        // HITUNG TOTAL HARGA

        $totalPrice =
            ($request->latte * $lattePrice) +
            ($request->americano * $americanoPrice) +
            ($request->cappuccino * $cappuccinoPrice);

        // SIMPAN DATABASE

        $queue = Queue::create([

            'queue_number' => $queueNumber,

            'customer_name' => $request->customer_name,

            'phone' => $request->phone,

            'total_people' => $request->total_people,

            'latte' => $request->latte,

            'americano' => $request->americano,

            'cappuccino' => $request->cappuccino,

            'total_price' => $totalPrice,

            'status' => 'Waiting',

        ]);

        // REDIRECT SUCCESS

        return redirect('/success/' . $queue->id);
    }

    /**
     * Success Page
     */
    public function success($id)
    {
        $queue = Queue::findOrFail($id);

        return view('success', compact('queue'));
    }

    /**
     * PDF RECEIPT
     */
    public function receipt($id)
    {
        $queue = Queue::findOrFail($id);

        $pdf = Pdf::loadView('receipt', compact('queue'));

        return $pdf->download(
            'receipt-' . $queue->queue_number . '.pdf'
        );
    }

    /**
     * Admin Dashboard + Search + Statistics
     */
    public function dashboard(Request $request)
    {
        $search = $request->search;

        $queues = Queue::when($search, function ($query) use ($search) {

            $query->where(
                'customer_name',
                'like',
                '%' . $search . '%'
            );

        })->latest()->get();

        // TOTAL ORDERS

        $totalOrders = Queue::count();

        // TOTAL INCOME

        $totalIncome = Queue::sum('total_price');

        // TOTAL PROCESSING

        $totalProcessing = Queue::where(
            'status',
            'Processing'
        )->count();

        // TOTAL DONE

        $totalDone = Queue::where(
            'status',
            'Done'
        )->count();

        // MENU PALING LARIS

        $latteTotal = Queue::sum('latte');

        $americanoTotal = Queue::sum('americano');

        $cappuccinoTotal = Queue::sum('cappuccino');

        $menus = [

            'Latte' => $latteTotal,

            'Americano' => $americanoTotal,

            'Cappuccino' => $cappuccinoTotal,

        ];

        arsort($menus);

        $bestMenu = array_key_first($menus);

        return view('admin', compact(
            'queues',
            'totalOrders',
            'totalIncome',
            'totalProcessing',
            'totalDone',
            'bestMenu'
        ));
    }

    /**
     * Update Status
     */
    public function updateStatus($id, $status)
    {
        $queue = Queue::findOrFail($id);

        if ($status == 'processing') {

            $queue->status = 'Processing';

        } elseif ($status == 'done') {

            $queue->status = 'Done';

        } else {

            $queue->status = 'Waiting';
        }

        $queue->save();

        return redirect('/admin');
    }

    /**
     * DELETE QUEUE
     */
    public function delete($id)
    {
        $queue = Queue::findOrFail($id);

        $queue->delete();

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Queue $queue)
    {
        //
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Queue $queue)
    {
        //
    }
}
