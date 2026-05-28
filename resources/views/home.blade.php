<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Qoffee</title>

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

            <a class="navbar-brand" href="#">
                NO ANTRI
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">

                        <a class="nav-link active" href="/">
                            Home
                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/queue">
                            Order
                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="#">
                            About
                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Hero -->

    <section class="hero">

        <div class="container">

            <div class="row align-items-center min-vh-100">

                <!-- Left -->

                <div class="col-lg-6">

                    <h1 class="hero-title">

                        Skip The Line,
                        <br>

                        Enjoy The
                        <span class="coffee-text">
                            Coffee
                        </span>

                    </h1>

                    <p class="hero-description">

                        Pesan coffee favoritmu dan ambil nomor antrean
                        secara digital tanpa harus menunggu lama.

                    </p>

                    <div class="hero-button">

                        <a href="/queue" class="btn btn-queue">

                            <i class="bi bi-cup-hot-fill"></i>

                            Order Now

                        </a>

                    </div>

                </div>

                <!-- Right -->

                <div class="col-lg-5 offset-lg-1">

                    <div class="queue-card">

                        <p class="queue-label">
                            NOW SERVING
                        </p>

                        <h1 class="queue-number">
                            A-021
                        </h1>

                        <p class="queue-info">

                            Estimasi waktu tunggu :
                            10 Menit

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Features -->

    <section class="features">

        <div class="container">

            <div class="section-title text-center">

                <h1>
                    Why Choose NO ANTRI?
                </h1>

                <p>
                    Solusi antrean digital modern untuk coffee shop masa kini.
                </p>

            </div>

            <div class="row g-4 mt-4">

                <!-- Feature 1 -->

                <div class="col-lg-4">

                    <div class="feature-box">

                        <i class="bi bi-qr-code-scan feature-icon"></i>

                        <h3>
                            QR Queue
                        </h3>

                        <p>
                            Pelanggan cukup scan QR code untuk langsung memesan coffee dan mengambil nomor antrean.
                        </p>

                    </div>

                </div>

                <!-- Feature 2 -->

                <div class="col-lg-4">

                    <div class="feature-box">

                        <i class="bi bi-lightning-charge-fill feature-icon"></i>

                        <h3>
                            Faster Service
                        </h3>

                        <p>
                            Membantu mengurangi antrean panjang dan membuat pelayanan lebih cepat serta teratur.
                        </p>

                    </div>

                </div>

                <!-- Feature 3 -->

                <div class="col-lg-4">

                    <div class="feature-box">

                        <i class="bi bi-phone-fill feature-icon"></i>

                        <h3>
                            Mobile Friendly
                        </h3>

                        <p>
                            Tampilan responsive dan nyaman digunakan di smartphone maupun tablet pelanggan.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->

    <footer>

        <div class="container">

            <p>
                © 2026 Qoffee — Smart Coffee Queue System
            </p>

        </div>

    </footer>

    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
