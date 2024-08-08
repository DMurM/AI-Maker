<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts and Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
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
    <style>
        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <header>
        <x-menu />
    </header>

    <main class="content">
        <div id="hero" class="section">
            @include('partials.hero')
        </div>
        <div id="ai-tools-background" class="hero-background hidden">
            <div class="shape shape1"></div>
            <div class="shape shape2"></div>
            <div class="shape shape3"></div>
            <div class="shape shape4"></div>
            <div class="shape shape5"></div>
            <div class="shape shape6"></div>
            <div class="shape shape7"></div>
            <div class="shape shape8"></div>
            <div class="shape shape9"></div>
            <div class="shape shape10"></div>
        </div>
        <div id="ai-tools" class="section hidden">
            <div class="container ai-tools-container">
                <h2 id="ai-tools-heading">Where imagination meets innovation.</h2>
                <p id="ai-tools-description">Unlock your creative potential and transform your ideas into stunning
                    realities with the power of AI.</p>
                <div id="tools" class="tools hidden">
                    <div class="tool-buttons">
                        <button id="btn-image-generator" class="tool-button">AI Image Generator</button>
                        <button id="btn-background-remover" class="tool-button active">Background Remover</button>
                        <button id="btn-image-to-video" class="tool-button">Image to Video</button>
                        <button id="btn-text-to-speech" class="tool-button">Text to Speech</button>
                        <button class="see-all-tools" aria-label="See all tools">
                            See all tools
                            <span class="arrow"></span>
                        </button>
                    </div>
                    <div id="tools-container">
                        @include('partials.ai-tools-background-remover')
                    </div>
                </div>
            </div>
        </div>

        <div id="recent-creations" class="section hidden">
            @include('partials.recent-creations', ['images' => $images])
        </div>
        <div id="feature" class="section hidden">
            @include('partials.feature')
        </div>
        {{-- <div id="join" class="section hidden">
            @include('partials.join')
        </div> --}}
        <div id="pricing" class="section hidden">
            <div class="hero-background">
                <div class="shape shape1"></div>
                <div class="shape shape2"></div>
                <div class="shape shape3"></div>
                <div class="shape shape4"></div>
                <div class="shape shape5"></div>
                <div class="shape shape6"></div>
                <div class="shape shape7"></div>
                <div class="shape shape8"></div>
                <div class="shape shape9"></div>
                <div class="shape shape10"></div>
            </div>
            <div class="container">
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
        </div>
        <div id="faqs" class="section hidden">
            @include('partials.faqs')
        </div>
    </main>

    <x-footer />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/home/aitools.js') }}" defer></script>
    <script src="{{ asset('js/home/pricing.js') }}" defer></script>
    <script src="{{ asset('js/home/menu.js') }}" defer></script>
    <script src="{{ asset('js/home/loginRedirect.js') }}" defer></script>
    <script src="{{ asset('js/home/refreshGallery.js') }}" defer></script>
    <script src="{{ asset('js/home/changeSectionandAnimationTools.js') }}" defer></script>
    <script src="{{ asset('js/home/coinsCalculator.js') }}" defer></script>

    <script>
        var recentImagesUrl = "{{ route('recent-images') }}";
        var initialImagesUrl = "{{ route('initial-images') }}";
        window.COIN_RATE = {{ env('COIN_RATE', 0.05) }};
    </script>

</body>

</html>
