document.addEventListener('DOMContentLoaded', () => {
    let isLoading = false;

    window.loadPartial = (type) => {
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

                if (type === 'coins') {
                    window.initCoinCalculator();
                }
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

    document.querySelectorAll('.toggle-button').forEach(button => {
        button.addEventListener('click', (event) => {
            const type = event.target.id.split('-')[1];
            loadPartial(type);
        });
    });

    loadPartial('monthly');
});
