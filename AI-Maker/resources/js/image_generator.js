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
    const styles = window.styles;
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
            const styleOption = document.createElement('div');
            styleOption.className = 'form-check style-option';
            styleOption.innerHTML = `
                <input class="form-check-input" type="radio" name="style" id="style-${style.replace(/\s+/g, '-').toLowerCase()}" value="${style}" ${start === 0 ? 'checked' : ''}>
                <label class="form-check-label" for="style-${style.replace(/\s+/g, '-').toLowerCase()}">
                    <img src="/images/styles/${style.replace(/\s+/g, '-').toLowerCase()}.png" alt="${style}" class="img-fluid img-thumbnail">
                    <div>${style}</div>
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
