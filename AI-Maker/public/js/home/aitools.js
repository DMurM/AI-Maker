document.addEventListener('DOMContentLoaded', () => {
    let isLoading = false;

    const loadPartial = (type) => {
        if (isLoading) return;
        isLoading = true;

        const url = {
            'image-generator': '/ai-tools/image-generator',
            'background-remover': '/ai-tools/background-remover',
            'image-to-video': '/ai-tools/image-to-video',
            'text-to-speech': '/ai-tools/text-to-speech'
        }[type];

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('tools-container').innerHTML = data;
                updateActiveButton(type);
                addEventListeners();
            })
            .finally(() => {
                isLoading = false;
            });
    };

    const updateActiveButton = (type) => {
        document.querySelectorAll('.tool-button').forEach(button => {
            button.classList.remove('active');
        });
        document.getElementById('btn-' + type).classList.add('active');
    };

    const addEventListeners = () => {
        document.getElementById('btn-image-generator').addEventListener('click', () => loadPartial('image-generator'));
        document.getElementById('btn-background-remover').addEventListener('click', () => loadPartial('background-remover'));
        document.getElementById('btn-image-to-video').addEventListener('click', () => loadPartial('image-to-video'));
        document.getElementById('btn-text-to-speech').addEventListener('click', () => loadPartial('text-to-speech'));
    };

    addEventListeners();
});