document.addEventListener('DOMContentLoaded', () => {
    const loadPartial = (type) => {
        let url = '';

        if (type === 'monthly') {
            url = '/pricing/monthly';
        } else if (type === 'yearly') {
            url = '/pricing/yearly';
        } else if (type === 'team') {
            url = '/pricing/team';
        } else if (type === 'coins') {
            url = '/pricing/coins';
        }

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('pricing-container').innerHTML = data;
                updateActiveButton(type);
                addEventListeners();
            });
    };

    const updateActiveButton = (type) => {
        const buttons = document.querySelectorAll('.toggle-button');
        buttons.forEach(button => {
            button.classList.remove('active');
        });

        document.getElementById('btn-' + type).classList.add('active');
    };

    const addEventListeners = () => {
        document.getElementById('btn-monthly').addEventListener('click', () => loadPartial('monthly'));
        document.getElementById('btn-yearly').addEventListener('click', () => loadPartial('yearly'));
        document.getElementById('btn-team').addEventListener('click', () => loadPartial('team'));
        document.getElementById('btn-coins').addEventListener('click', () => loadPartial('coins'));
    };

    addEventListeners();
});
