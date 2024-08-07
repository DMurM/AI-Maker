document.addEventListener('DOMContentLoaded', function() {
    const fetchImages = (url) => {
        fetch(url)
            .then(response => {
                if (response.status === 204) { // No Content
                    return [];
                }
                return response.json();
            })
            .then(images => {
                if (images.length > 0) {
                    const gallerySection = document.getElementById('gallery-section');
                    if (gallerySection) {
                        const grid = document.createElement('div');
                        grid.classList.add('grid');

                        images.forEach((image, index) => {
                            const figure = document.createElement('figure');
                            const img = document.createElement('img');
                            img.classList.add('grid-image');
                            img.src = image.url;
                            img.alt = `Creation ${index + 1}`;
                            figure.appendChild(img);
                            grid.appendChild(figure);
                        });

                        gallerySection.innerHTML = ''; // Clear the existing content
                        gallerySection.appendChild(grid); // Append the new content
                    }
                }
            })
            .catch(error => console.error('Error fetching images:', error));
    };

    fetchImages(initialImagesUrl); // Initial fetch
    setInterval(() => fetchImages(recentImagesUrl), 7000); // Fetch every 7 seconds
});
