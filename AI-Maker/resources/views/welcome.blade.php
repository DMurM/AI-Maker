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
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/pricing-team.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/pricing-coins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/hero.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/ai-tools.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partials/recent-creations.css') }}" rel="stylesheet">
</head>

<body>

    <body>
        <header>
            <x-menu />
        </header>

        <main>
            @include('partials.hero')

            @include('partials.ai-tools')

            @include('partials.recent-creations')

            <section id="features" class="section">
                <div class="container">
                    <div class="feature">
                        <div class="icon"></div>
                        <h3>AI-Powered design tools</h3>
                        <p>Harness the power of AI to create professional-quality images, videos, and podcasts with
                            ease.</p>
                    </div>
                    <div class="feature">
                        <div class="icon"></div>
                        <h3>User-friendly interface</h3>
                        <p>Our intuitive platform is designed for everyone, from beginners to experts.</p>
                    </div>
                    <div class="feature">
                        <div class="icon"></div>
                        <h3>High-Quality outputs</h3>
                        <p>Export your projects in high resolution for any use, from social media to professional
                            presentations.</p>
                    </div>
                </div>
            </section>

            <section id="join" class="section join-section">
                <div class="container">
                    <h2>Join millions in creating AI Art</h2>
                    <p>Start your own creative journey with AiTools.</p>
                    <div class="join-steps">
                        <div class="step">Create</div>
                        <div class="step">Edit</div>
                        <div class="step">Download</div>
                    </div>
                    <button class="start-creating">Start creating now</button>
                </div>
            </section>

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

            <section id="faqs" class="section">
                <div class="container">
                    <h2>FAQs</h2>
                    <div class="faqs">
                        <div class="faq">
                            <h3>What is an AI art generator?</h3>
                        </div>
                        <div class="faq">
                            <h3>How do I create AI generated art?</h3>
                        </div>
                        <div class="faq">
                            <h3>Is AiTools’s AI art generator free to use?</h3>
                        </div>
                        <div class="faq">
                            <h3>How do I create AI Generated Art?</h3>
                        </div>
                        <div class="faq">
                            <h3>How can I use AI-generated art? Are there any copyright or licensing concerns?</h3>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="container">
                <div class="footer-logo">LOGO</div>
                <p>Tincidunt urna rhoncus nibh aliquet amet accumsan sed. Nisl ipsum dignissim magna accumsan suscipit
                    mi.</p>
                <div class="social">
                    <h3>Follow us</h3>
                    <div class="social-icons">
                        <div class="icon"></div>
                        <div class="icon"></div>
                        <div class="icon"></div>
                        <div class="icon"></div>
                    </div>
                </div>
                <div class="footer-links">
                    <div>
                        <h3>AI Tools</h3>
                        <ul>
                            <li>Image Generation</li>
                            <li>Sketch Rendering</li>
                            <li>Creative Fusion</li>
                            <li>Photo to sketch</li>
                            <li>AI Supermodel</li>
                            <li>AI Headshot Generator</li>
                            <li>AI Image Generator</li>
                            <li>Image Variation</li>
                            <li>Background diffusion</li>
                            <li>Text effects</li>
                            <li>AI PNG Generator</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Image Editing</h3>
                        <ul>
                            <li>HD Upscaler</li>
                            <li>Outpainting</li>
                            <li>Relight</li>
                            <li>Erase & Replace</li>
                            <li>Background remover</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Video</h3>
                        <ul>
                            <li>Image to video</li>
                            <li>Text to video</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Audio</h3>
                        <ul>
                            <li>AI text to speech</li>
                            <li>Song generation</li>
                            <li>Podcast maker</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Privacy</h3>
                        <ul>
                            <li>Privacy Policy</li>
                            <li>Terms of use</li>
                            <li>License</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </body>

    <script src="{{ asset('js/home/pricing.js') }}" defer></script>
    <script src="{{ asset('js/home/menu.js') }}" defer></script>
    <script src="{{ asset('js/home/recent-creations-carrusel.js') }}" defer></script>
    <script src="{{ asset('js/loginRedirect.js') }}" defer></script>

</html>
