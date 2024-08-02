document.addEventListener('DOMContentLoaded', () => {
    let isLoading = false;

    const loadPartial = (type) => {
        if (isLoading) return;
        isLoading = true;

        const url = {
            monthly: '/pricing/monthly',
            yearly: '/pricing/yearly',
            team: '/pricing/team',
            coins: '/pricing/coins'
        }[type];

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('pricing-container').innerHTML = data;
                updateActiveButton(type);
                addEventListeners();
            })
            .finally(() => {
                isLoading = false;
            });
    };

    const updateActiveButton = (type) => {
        document.querySelectorAll('.toggle-button').forEach(button => {
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
