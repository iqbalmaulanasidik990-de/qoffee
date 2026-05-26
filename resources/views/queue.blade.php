<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NO ANTRI - Coffee Queue</title>

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

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">

        <div class="container">

            <a class="navbar-brand" href="/">
                NO ANTRI
            </a>

        </div>

    </nav>

    <!-- Queue Section -->

    <section class="queue-page">

        <div class="container">

            <div class="row justify-content-center align-items-center min-vh-100">

                <div class="col-lg-7">

                    <div class="queue-form-box">

                        <div class="text-center mb-5">

                            <p class="queue-subtitle">
                                DIGITAL COFFEE ORDER
                            </p>

                            <h1 class="queue-title">

                                Order Your
                                <span class="coffee-text">
                                    Coffee
                                </span>

                            </h1>

                            <p class="queue-description">

                                Pilih menu coffee favoritmu lalu ambil
                                nomor antrean secara digital tanpa harus
                                menunggu lama.

                            </p>

                        </div>

                        <!-- ERROR MESSAGE -->

                        @if ($errors->any())

                            <div class="alert alert-danger mb-4">

                                <ul class="mb-0">

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif

                        <!-- FORM -->

                        <form action="/queue/store" method="POST">

                            @csrf

                            <!-- Coffee Menu -->

                            <div class="mb-5">

                                <!-- Latte -->

                                <div class="premium-menu-card">

                                    <div class="menu-left">

                                        <img
                                            src="https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?q=80&w=600&auto=format&fit=crop"
                                            class="coffee-image">

                                        <div>

                                            <h5 class="coffee-name">
                                                Latte
                                            </h5>

                                            <p class="coffee-price">
                                                Rp 28.000
                                            </p>

                                        </div>

                                    </div>

                                    <input
                                        type="number"
                                        id="latte"
                                        name="latte"
                                        class="form-control quantity-input"
                                        value="{{ old('latte', 0) }}"
                                        min="0">

                                </div>

                                <!-- Americano -->

                                <div class="premium-menu-card mt-4">

                                    <div class="menu-left">

                                        <img
                                            src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?q=80&w=600&auto=format&fit=crop"
                                            class="coffee-image">

                                        <div>

                                            <h5 class="coffee-name">
                                                Americano
                                            </h5>

                                            <p class="coffee-price">
                                                Rp 20.000
                                            </p>

                                        </div>

                                    </div>

                                    <input
                                        type="number"
                                        id="americano"
                                        name="americano"
                                        class="form-control quantity-input"
                                        value="{{ old('americano', 0) }}"
                                        min="0">

                                </div>

                                <!-- Cappuccino -->

                                <div class="premium-menu-card mt-4">

                                    <div class="menu-left">

                                        <img
                                            src="https://images.unsplash.com/photo-1534778101976-62847782c213?q=80&w=600&auto=format&fit=crop"
                                            class="coffee-image">

                                        <div>

                                            <h5 class="coffee-name">
                                                Cappuccino
                                            </h5>

                                            <p class="coffee-price">
                                                Rp 25.000
                                            </p>

                                        </div>

                                    </div>

                                    <input
                                        type="number"
                                        id="cappuccino"
                                        name="cappuccino"
                                        class="form-control quantity-input"
                                        value="{{ old('cappuccino', 0) }}"
                                        min="0">

                                </div>

                            </div>

                            <!-- Customer Name -->

                            <div class="mb-4">

                                <label class="form-label">
                                    Customer Name
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-person-fill"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="customer_name"
                                        class="form-control"
                                        placeholder="Enter your name"
                                        value="{{ old('customer_name') }}">

                                </div>

                            </div>

                            <!-- Total People -->

                            <div class="mb-4">

                                <label class="form-label">
                                    Total People
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-people-fill"></i>
                                    </span>

                                    <input
                                        type="number"
                                        name="total_people"
                                        class="form-control"
                                        placeholder="Example : 2"
                                        value="{{ old('total_people') }}">

                                </div>

                            </div>

                            <!-- Phone -->

                            <div class="mb-4">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-telephone-fill"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        placeholder="08xxxxxxxxxx"
                                        value="{{ old('phone') }}">

                                </div>

                            </div>

                            <!-- TOTAL PRICE -->

                            <div class="total-price-box mb-4">

                                <h5 class="mb-2">
                                    Total Price
                                </h5>

                                <h2 id="totalPrice">
                                    Rp 0
                                </h2>

                            </div>

                            <!-- Button -->

                            <button type="submit" class="btn btn-queue-submit w-100">

                                <i class="bi bi-cup-hot-fill"></i>

                                Order & Take Queue

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- REALTIME TOTAL PRICE -->

    <script>

        const latteInput = document.getElementById('latte');

        const americanoInput = document.getElementById('americano');

        const cappuccinoInput = document.getElementById('cappuccino');

        const totalPrice = document.getElementById('totalPrice');

        function calculateTotal() {

            const latte = parseInt(latteInput.value) || 0;

            const americano = parseInt(americanoInput.value) || 0;

            const cappuccino = parseInt(cappuccinoInput.value) || 0;

            const total =
                (latte * 28000) +
                (americano * 20000) +
                (cappuccino * 25000);

            totalPrice.innerText =
                'Rp ' + total.toLocaleString('id-ID');

        }

        latteInput.addEventListener('input', calculateTotal);

        americanoInput.addEventListener('input', calculateTotal);

        cappuccinoInput.addEventListener('input', calculateTotal);

        calculateTotal();
        

    </script>

</body>

</html>
