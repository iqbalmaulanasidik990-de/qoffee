<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - NO ANTRI</title>

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

    <section class="admin-page">

        <div class="container">

            <div class="admin-box">

                <!-- HEADER -->

                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

                    <div>

                        <h1 class="admin-title">
                            Coffee Queue Dashboard
                        </h1>

                        <p class="admin-subtitle">
                            Manage customer orders and queue list
                        </p>

                    </div>

                </div>

                <!-- STATISTICS -->

                <div class="row mb-5 g-4">

                    <!-- Total Income -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">

                                <p class="text-secondary mb-2">
                                    Total Income
                                </p>

                                <h3 class="fw-bold">

                                    Rp {{ number_format($totalIncome) }}

                                </h3>

                            </div>

                        </div>

                    </div>

                    <!-- Total Orders -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">

                                <p class="text-secondary mb-2">
                                    Total Orders
                                </p>

                                <h3 class="fw-bold">

                                    {{ $totalOrders }}

                                </h3>

                            </div>

                        </div>

                    </div>

                    <!-- Processing -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">

                                <p class="text-secondary mb-2">
                                    Processing
                                </p>

                                <h3 class="fw-bold text-primary">

                                    {{ $totalProcessing }}

                                </h3>

                            </div>

                        </div>

                    </div>

                    <!-- Done -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">

                                <p class="text-secondary mb-2">
                                    Done Orders
                                </p>

                                <h3 class="fw-bold text-success">

                                    {{ $totalDone }}

                                </h3>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- BEST SELLER -->

                <div class="card border-0 shadow-sm mb-5">

                    <div class="card-body">

                        <h5 class="mb-3">

                            ☕ Best Selling Coffee

                        </h5>

                        <h2 class="fw-bold coffee-text">

                            {{ $bestMenu }}

                        </h2>

                    </div>

                </div>

                <!-- SEARCH -->

                <form action="/admin" method="GET" class="mb-4">

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search customer name..."
                            value="{{ request('search') }}">

                        <button class="btn btn-queue-submit">

                            Search

                        </button>

                    </div>

                </form>

                <!-- TABLE -->

                <div class="table-responsive">

                    <table class="table admin-table align-middle">

                        <thead>

                            <tr>

                                <th>Queue</th>

                                <th>Name</th>

                                <th>Phone</th>

                                <th>Orders</th>

                                <th>Total</th>

                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($queues as $queue)

                            <tr>

                                <!-- Queue Number -->

                                <td>

                                    <span class="queue-admin-number">

                                        {{ $queue->queue_number }}

                                    </span>

                                </td>

                                <!-- Customer Name -->

                                <td>

                                    <div class="fw-semibold">

                                        {{ $queue->customer_name }}

                                    </div>

                                    <small class="text-secondary">

                                        {{ $queue->total_people }} People

                                    </small>

                                </td>

                                <!-- Phone -->

                                <td>

                                    {{ $queue->phone }}

                                </td>

                                <!-- Orders -->

                                <td>

                                    @if($queue->latte > 0)

                                        <div class="mb-1">
                                            ☕ Latte : {{ $queue->latte }}
                                        </div>

                                    @endif

                                    @if($queue->americano > 0)

                                        <div class="mb-1">
                                            ☕ Americano : {{ $queue->americano }}
                                        </div>

                                    @endif

                                    @if($queue->cappuccino > 0)

                                        <div>
                                            ☕ Cappuccino : {{ $queue->cappuccino }}
                                        </div>

                                    @endif

                                </td>

                                <!-- Total -->

                                <td>

                                    <span class="price-text">

                                        Rp {{ number_format($queue->total_price) }}

                                    </span>

                                </td>

                                <!-- Status -->

                                <td>

                                    @if($queue->status == 'Waiting')

                                        <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
                                            Waiting
                                        </span>

                                    @elseif($queue->status == 'Processing')

                                        <span class="badge rounded-pill bg-primary px-3 py-2">
                                            Processing
                                        </span>

                                    @elseif($queue->status == 'Done')

                                        <span class="badge rounded-pill bg-success px-3 py-2">
                                            Done
                                        </span>

                                    @endif

                                </td>

                                <!-- Action -->

                                <td>

                                    <div class="d-flex gap-2 flex-wrap">

                                        <!-- Waiting -->

                                        <a href="/admin/status/{{ $queue->id }}/waiting"
                                           class="btn btn-warning btn-sm">

                                            Waiting

                                        </a>

                                        <!-- Processing -->

                                        <a href="/admin/status/{{ $queue->id }}/processing"
                                           class="btn btn-primary btn-sm">

                                            Process

                                        </a>

                                        <!-- Done -->

                                        <a href="/admin/status/{{ $queue->id }}/done"
                                           class="btn btn-success btn-sm">

                                            Done

                                        </a>

                                        <!-- Delete -->

                                        <a href="/admin/delete/{{ $queue->id }}"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Delete this queue?')">

                                            Delete

                                        </a>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="7" class="text-center py-5">

                                    <h5 class="text-secondary">

                                        No Orders Yet ☕

                                    </h5>

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>

</body>

</html>
