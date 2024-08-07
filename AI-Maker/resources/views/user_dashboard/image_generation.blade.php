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
            <x-sidebar /> <!-- Side-bar add component -->
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
                                        <textarea class="form-control" id="prompt" name="prompt" rows="2" placeholder="For example: Huge, frothy waves crashing against a small, lush green island with tall palm trees, under a dramatic stormy sky."></textarea>
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
                                                <input class="form-check-input aspect-radio" type="radio" name="aspect-ratio" id="aspect1" value="1:1" checked>
                                                <label class="form-check-label aspect-label" for="aspect1">
                                                    <div class="aspect-display aspect-1-1">1:1</div>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input aspect-radio" type="radio" name="aspect-ratio" id="aspect2" value="3:4">
                                                <label class="form-check-label aspect-label" for="aspect2">
                                                    <div class="aspect-display aspect-3-4">3:4</div>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input aspect-radio" type="radio" name="aspect-ratio" id="aspect3" value="4:3">
                                                <label class="form-check-label aspect-label" for="aspect3">
                                                    <div class="aspect-display aspect-4-3">4:3</div>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input aspect-radio" type="radio" name="aspect-ratio" id="aspect4" value="16:9">
                                                <label class="form-check-label aspect-label" for="aspect4">
                                                    <div class="aspect-display aspect-16-9">16:9</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label for="style">Style</label>
                                        <input type="text" class="form-control ml-2" id="style-search" placeholder="Search styles..." style="max-width: 400px;">
                                    </div>
                                    <div class="d-flex flex-wrap mt-2" id="style-options"></div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <button type="button" class="btn btn-secondary arrow-btn" id="prev-page"><i class="fas fa-arrow-left"></i></button>
                                        <button type="button" class="btn btn-secondary arrow-btn" id="next-page"><i class="fas fa-arrow-right"></i></button>
                                    </div>
                                    <div class="form-group mt-3">
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popularStyles = [
                'Fooocus Masterpiece',
                'Fooocus Photograph',
                'SAI Anime',
                'SAI Cinematic',
                'MRE Cinematic Dynamic',
                'MRE Heroic Fantasy',
                'Ads Automotive',
                'Ads Luxury',
                'Artstyle Hyperrealism',
                'Futuristic Cyberpunk Cityscape',
                'Game Cyberpunk Game',
                'Misc Fairy Tale',
                'Papercraft Papercut Collage',
                'Photo Glamour',
                'Cinematic Diva',
                'Adorable 3D Character',
                'Doodle Art',
                'Flat 2d Art',
                'Glitchcore',
                'Harlem Renaissance Art'
            ];
            const styles = @json(config('styles'));
            const customStyles = @json(config('custom_styles'));
            const styleOptionsContainer = document.getElementById('style-options');
            const styleSearchInput = document.getElementById('style-search');
            const prevPageButton = document.getElementById('prev-page');
            const nextPageButton = document.getElementById('next-page');

            let currentPage = 0;
            const stylesPerPage = 6;
            const allStyles = [];

            // Add popular styles first
            popularStyles.forEach(style => {
                allStyles.push({ style });
            });

            // Flatten styles into a single array and add non-popular styles
            Object.keys(styles).forEach(category => {
                styles[category].forEach(style => {
                    if (!popularStyles.includes(style)) {
                        allStyles.push({ category, style });
                    }
                });
            });

            let filteredStyles = allStyles;

            const renderStyles = () => {
                styleOptionsContainer.innerHTML = '';
                const start = currentPage * stylesPerPage;
                const end = start + stylesPerPage;
                const currentStyles = filteredStyles.slice(start, end);

                currentStyles.forEach(({ style }) => {
                    const customName = customStyles[style.replace(/\s+/g, '_').toLowerCase()] || style;
                    const styleOption = document.createElement('div');
                    styleOption.className = 'form-check style-option';
                    styleOption.innerHTML = `
                        <input class="form-check-input" type="radio" name="style" id="style-${style.replace(/\s+/g, '-').toLowerCase()}" value="${style}" ${start === 0 ? 'checked' : ''}>
                        <label class="form-check-label" for="style-${style.replace(/\s+/g, '-').toLowerCase()}">
                            <img src="{{ asset('images/styles') }}/${style.replace(/\s+/g, '-').toLowerCase()}.png" alt="${style}" class="img-fluid img-thumbnail">
                            <div>${customName}</div>
                        </label>
                    `;
                    styleOptionsContainer.appendChild(styleOption);
                });

                prevPageButton.disabled = currentPage === 0;
                nextPageButton.disabled = end >= filteredStyles.length;
            };

            styleSearchInput.addEventListener('input', () => {
                const searchText = styleSearchInput.value.toLowerCase();
                filteredStyles = allStyles.filter(({ style }) => style.toLowerCase().includes(searchText));
                currentPage = 0;
                renderStyles();
            });

            prevPageButton.addEventListener('click', () => {
                if (currentPage > 0) {
                    currentPage--;
                    renderStyles();
                }
            });

            nextPageButton.addEventListener('click', () => {
                if ((currentPage + 1) * stylesPerPage < filteredStyles.length) {
                    currentPage++;
                    renderStyles();
                }
            });

            renderStyles();

            const form = document.getElementById('image-generation-form');
            const spinner = document.getElementById('spinner');
            const errorMessage = document.getElementById('error-message');
            const generateButton = document.getElementById('generate-button');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                if (generateButton.disabled) {
                    return;
                }

                generateButton.disabled = true;

                errorMessage.style.display = 'none';
                errorMessage.textContent = '';

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

                generateButton.disabled = false;
            });
        });
    </script>
</body>

</html>
