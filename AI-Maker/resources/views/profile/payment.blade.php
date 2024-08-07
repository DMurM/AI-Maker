<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark text-white">
                <div class="d-flex flex-column h-100">
                    <div class="flex-grow-1">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center"
                                    href="{{ route('user_dashboard') }}" id="home-link">
                                    <img src="\images\home-05.png" class="icon" alt="">Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="{{ route('profile') }}">
                                    <img src="{{ asset('images/user-01.svg') }}" class="icon" alt="">My Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\folder.svg" class="icon" alt="">Assets
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\team.svg" class="icon" alt="">Team
                                </a>
                            </li>
                        </ul>
                        <div class="line-div"></div>
                        <ul class="nav flex-column mt-3">
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="/Images/imageneration.svg" class="icon" alt="">Image Generation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\imagedit.svg" class="icon" alt="">Image Editing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\videotools.svg" class="icon" alt="">Video Tools
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\audiotool.svg" class="icon" alt="">Audio Tools
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="profile-info p-3 mt-auto bg-dark">
                        <div class="d-flex flex-column align-items-start">
                            <p class="mb-1">{{ Auth::user()->full_name }}</p>
                            <p class="mb-2">{{ Auth::user()->email }}</p>
                            <a href="{{ route('logout') }}" class="btn btn-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ Auth::user()->full_name }}</h1>
                    <div class="btn-group">
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
                                <h3>{{ Auth::user()->credit }}</h3>
                                <p>Monthly Coins</p>
                            </div>
                            <div class="coin-divider">+</div>
                            <div class="coin-count">
                                <h3>0</h3>
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
                <div>
                    <form action="{{ route('process.payment') }}" method="POST" id="payment-form">
                        @csrf
                        <div class="form-row">
                            <label for="card-element">
                                Tarjeta de crédito o débito
                            </label>
                            <div id="card-element">
                                <!-- Un Stripe Element será insertado aquí -->
                            </div>
                            <!-- Muestra errores de validación de la tarjeta -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="form-row">
                            <label for="credits">
                                Cantidad de créditos
                            </label>
                            <input type="number" id="credits" name="credits" min="1" value="1" required>
                            <span id="euros">0.10 €</span>
                        </div>
                        <button type="submit">Pagar</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script>
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');
        var elements = stripe.elements();

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        var card = elements.create('card', { style: style });
        card.mount('#card-element');

        card.on('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        var creditsInput = document.getElementById('credits');
        var eurosDisplay = document.getElementById('euros');

        creditsInput.addEventListener('input', function (event) {
            var credits = event.target.value;
            var euros = (credits * 0.10).toFixed(2);
            eurosDisplay.textContent = euros + ' €';
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>