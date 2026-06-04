<?php

namespace App\Http\Controllers;

use App\Models\Queue;

abstract class Controller
{
    public function admin()
{
    $queues = Queue::latest()->get();

    return view('admin', compact('queues'));
}
}
