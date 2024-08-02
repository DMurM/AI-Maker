<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/pricing-team.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/pricing-coins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/hero.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/ai-tools.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/recent-creations.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/feature.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/join.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/pricing.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/faqs.css') }}" rel="stylesheet">
</head>

<body>

    <body>
        <header>
            <x-menu />
        </header>

        <main class="content">
            <div class="no-margin">
                @include('partials.hero')
            </div>

            @include('partials.ai-tools')

            @include('partials.recent-creations')

            @include('partials.feature')

            @include('partials.join')

            <section id="pricing" class="section">
                <div class="container">
                    <h2>Choose a plan for your workspace</h2>
                    <div class="toggle-buttons">
                        <button id="btn-monthly" class="toggle-button active">Monthly</button>
                        <button id="btn-yearly" class="toggle-button">Yearly</button>
                        <button id="btn-team" class="toggle-button">Team</button>
                        <button id="btn-coins" class="toggle-button">Coins</button>
                    </div>
                    <div id="pricing-container">
                        @include('partials.pricing-monthly')
                    </div>
                </div>
            </section>

            @include('partials.faqs')

        </main>

        <x-footer />


    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/home/pricing.js') }}" defer></script>
    <script src="{{ asset('js/home/menu.js') }}" defer></script>
    <script src="{{ asset('js/home/recent-creations-carrusel.js') }}" defer></script>
    <script src="{{ asset('js/loginRedirect.js') }}" defer></script>

</html>
