<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Success - NO ANTRI</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <section class="queue-page">

        <div class="container">

            <div class="row justify-content-center align-items-center min-vh-100">

                <div class="col-lg-6">

                    <div class="queue-form-box text-center">

                        <!-- Success Icon -->

                        <div class="mb-4">

                            <i class="bi bi-check-circle-fill success-icon"></i>

                        </div>

                        <!-- Title -->

                        <h1 class="queue-title mb-3">

                            Order
                            <span class="coffee-text">
                                Success
                            </span>

                        </h1>

                        <p class="queue-description">

                            Pesanan coffee kamu berhasil dibuat
                            dan nomor antrean sudah diterima.

                        </p>

                        <!-- Queue Number -->

                        <div class="success-queue-box mt-5">

                            <p class="queue-label">
                                YOUR QUEUE NUMBER
                            </p>

                            <h1 class="success-queue-number">

                                {{ $queue->queue_number }}

                            </h1>

                        </div>

                        <!-- CUSTOMER DETAIL -->

                        <div class="success-detail-box mt-4 text-start">

                            <p>

                                <strong>Name :</strong>

                                {{ $queue->customer_name }}

                            </p>

                            @if($queue->latte > 0)

                            <p>

                                <strong>Latte :</strong>

                                {{ $queue->latte }}

                            </p>

                            @endif

                            @if($queue->americano > 0)

                            <p>

                                <strong>Americano :</strong>

                                {{ $queue->americano }}

                            </p>

                            @endif

                            @if($queue->cappuccino > 0)

                            <p>

                                <strong>Cappuccino :</strong>

                                {{ $queue->cappuccino }}

                            </p>

                            @endif

                            <p>

                                <strong>Total Price :</strong>

                                Rp {{ number_format($queue->total_price) }}

                            </p>

                            <!-- STATUS -->

                            <p>

                                <strong>Status :</strong>

                                @if($queue->status == 'Waiting')

                                    <span class="text-warning fw-bold">
                                        Waiting
                                    </span>

                                @elseif($queue->status == 'Processing')

                                    <span class="text-primary fw-bold">
                                        Processing
                                    </span>

                                @elseif($queue->status == 'Done')

                                    <span class="text-success fw-bold">
                                        Done
                                    </span>

                                @endif

                            </p>

                        </div>

                        <!-- QR CODE -->

                        <div class="mt-4 text-center">

                            <h5 class="mb-3">

                                Scan Queue Status

                            </h5>

                            <div class="bg-white p-3 rounded-4 d-inline-block">

                                {!! QrCode::size(180)->generate(url('/success/' . $queue->id)) !!}

                            </div>

                            <p class="text-secondary mt-3 mb-0">

                                Scan untuk membuka status antrean

                            </p>

                        </div>

                        

                        <!-- DOWNLOAD PDF -->

                        <a href="/receipt/{{ $queue->id }}"
                           class="btn btn-dark w-100 mb-3 mt-4">

                            <i class="bi bi-download"></i>

                            Download Receipt PDF

                        </a>

                        <!-- BACK HOME -->

                        <a href="/"
                           class="btn btn-queue-submit w-100">

                            <i class="bi bi-house-fill"></i>

                            Back To Home

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- AUTO REFRESH STATUS -->

    <script>

        setInterval(() => {

            location.reload();

        }, 5000);

    </script>

</body>

</html>
