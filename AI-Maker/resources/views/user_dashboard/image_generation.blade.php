<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Image Generator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/image_generation.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-2 col-lg-2 bg-dark text-white d-flex flex-column justify-content-between">
                <div>
                    <div class="sidebar-header">
                        <h3 class="logo">AI-Maker</h3>
                    </div>
                    <ul class="nav flex-column flex-grow-1 mt-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user_dashboard') }}">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user_dashboard') }}">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user_dashboard') }}">
                                <i class="fas fa-briefcase"></i> Assets
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('pricing.team') }}">
                                <i class="fas fa-users"></i> Team
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('generate_image') }}">
                                <i class="fas fa-image"></i> Image Generation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-sliders"></i> Image Editing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-video"></i> Video Tools
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-microphone"></i> Audio Tools
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="profile-info p-3 bg-dark">
                    <div class="d-flex flex-column align-items-start">
                        <p class="mb-1">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                        <p class="mb-2">{{ Auth::user()->email }}</p>
                        <a href="#" class="btn btn-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div>
                        <h1 class="h2">AI Image Generator</h1>
                        <p>Easily create an image from scratch with our AI image generator by entering descriptive text.</p>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credits }}</button>
                    </div>
                </header>
                <div class="section mb-4">
                    <div class="container-fluid">
                        <form id="image-generation-form" method="POST" action="{{ route('generate_image') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-7 col-lg-8" id="prompt-container">
                                    <div class="form-group">
                                        <label for="prompt">Describe an image you want to create:</label>
                                        <textarea class="form-control" id="prompt" name="prompt" rows="2"
                                            placeholder="For example: Huge, frothy waves crashing against a small, lush green island with tall palm trees swaying, under a dramatic stormy sky."></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center mb-2">
                                        <div class="spinner-border" role="status" id="spinner">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="row" id="generated-images-container"></div>
                                    <div class="alert alert-danger" id="error-message" style="display: none;"></div>
                                </div>
                                <div class="col-md-5 col-lg-4" id="config-container">
                                    <div class="form-group">
                                        <label for="aspect-ratio">Aspect ratio</label>
                                        <div class="d-flex flex-row align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input aspect-circle" type="radio" name="aspect-ratio" id="aspect1" value="1:1" checked>
                                                <label class="form-check-label aspect-label" for="aspect1">1:1</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input aspect-circle" type="radio" name="aspect-ratio" id="aspect2" value="3:4">
                                                <label class="form-check-label aspect-label" for="aspect2">3:4</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input aspect-circle" type="radio" name="aspect-ratio" id="aspect3" value="4:3">
                                                <label class="form-check-label aspect-label" for="aspect3">4:3</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input aspect-circle" type="radio" name="aspect-ratio" id="aspect4" value="16:9">
                                                <label class="form-check-label aspect-label" for="aspect4">16:9</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="style">Style</label>
                                        <select class="form-control" id="style" name="style">
                                            <option value="none">None</option>
                                            <!-- Add more styles as options here -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="outputs">Number of outputs</label>
                                        <div class="d-flex flex-row align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input output-circle" type="radio" name="outputs" id="output1" value="1">
                                                <label class="form-check-label output-label" for="output1">1</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input output-circle" type="radio" name="outputs" id="output2" value="2" checked>
                                                <label class="form-check-label output-label" for="output2">2</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input output-circle" type="radio" name="outputs" id="output3" value="3">
                                                <label class="form-check-label output-label" for="output3">3</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input output-circle" type="radio" name="outputs" id="output4" value="4">
                                                <label class="form-check-label output-label" for="output4">4</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" id="generate-button">Generate</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-4 justify-content-center" id="spinner-container" style="display: none;">
                            <div class="col-auto">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Script to handle image generation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('image-generation-form');
            const spinner = document.getElementById('spinner');
            const errorMessage = document.getElementById('error-message');
            const generateButton = document.getElementById('generate-button');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                // If the button is disabled, return early
                if (generateButton.disabled) {
                    return;
                }

                // Disable the button to prevent multiple submissions
                generateButton.disabled = true;

                // Remove the error message if it exists
                errorMessage.style.display = 'none';
                errorMessage.textContent = '';

                // Show the spinner
                spinner.style.display = 'block';

                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData.get('_token')
                    },
                    body: formData
                });

                const result = await response.json();

                // Hide the spinner
                spinner.style.display = 'none';

                const generatedImagesContainer = document.getElementById('generated-images-container');
                generatedImagesContainer.innerHTML = ''; 
                if (response.ok && result.image_urls) {
                    result.image_urls.forEach(url => {
                        const col = document.createElement('div');
                        col.className = 'generated-image-container'; 
                        col.innerHTML = `<img src="${url}" alt="Generated Image" class="img-fluid img-thumbnail">`;
                        generatedImagesContainer.appendChild(col);
                    });
                } else {
                    errorMessage.textContent = result.error || 'An error occurred while generating the image.';
                    errorMessage.style.display = 'block';
                }

                // Re-enable the button after processing
                generateButton.disabled = false;
            });
        });
    </script>
</body>

</html>
