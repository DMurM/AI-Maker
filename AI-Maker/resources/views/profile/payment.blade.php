<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <x-sidebar />
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div>
                        <h1 class="h2">{{ Auth::user()->full_name }}</h1>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credit }}</button>
                    </div>
                </header>
                <div class="tabs">
                    <div class="tab">
                        <a class="label" href="{{ route('profile') }}">My Account</a>
                    </div>
                    <div class="tab">
                        <a href="#" class="label">Membership & Plans</a>
                    </div>
                    <div class="tab">
                        <a href="#" class="label">My Referrals</a>
                    </div>
                </div>
                <div class="dashboard-container">
                    <div class="current-coins">
                        <h2>Current coins</h2>
                        <div class="coin-info">
                            <div class="coin-count">
                                <h3>0</h3>
                                <p>Monthly Coins</p>
                            </div>
                            <div class="coin-divider">+</div>
                            <div class="coin-count">
                                <h3>{{ Auth::user()->credit }}</h3>
                                <p>Lifetime Coins</p>
                            </div>
                        </div>
                    </div>
                    <div class="recent-transactions">
                        <div class="header">
                            <h2>Recent Transactions</h2>
                            <button
                                onclick="window.open('https://billing.stripe.com/p/login/test_00g9B3eoZ5dNewU5kk', '_blank')">View
                                More</button>
                        </div>
                        <div class="header">
                            <h2>Buy Credits</h2>
                            <button onclick="window.open('{{ route('payment.form') }}', '_blank')">Buy</button>
                        </div>
                    </div>
                </div>
                <div class="line-div"></div>
                <div>
                    <div class="coins">
                        <div class="input-parent">
                            <div class="input">
                                <div class="subscription">Subscription</div>
                            </div>
                            <div class="coins-wrapper">
                                <div class="input">
                                    <div class="free">Free</div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="https://buy.stripe.com/test_cN202JacueJM9OMbII" target="_blank">
                                <img src="/images/payment/boton.png" alt="Botón de pago">
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>