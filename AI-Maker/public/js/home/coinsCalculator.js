document.addEventListener('DOMContentLoaded', () => {
    window.initCoinCalculator = () => {
        const coinAmountInput = document.getElementById('coin-amount');
        const coinValueDisplay = document.getElementById('coin-value');

        if (!coinAmountInput || !coinValueDisplay) {
            console.error('Elementos no encontrados');
            return;
        }

        const coinRate = window.COIN_RATE || 0.05;

        coinAmountInput.addEventListener('input', () => {
            const euroAmount = parseFloat(coinAmountInput.value) || 0;
            const coinValue = (euroAmount / coinRate).toFixed(2);
            coinValueDisplay.textContent = `${coinValue} Coins`;
        });
    };

    if (document.getElementById('coin-amount') && document.getElementById('coin-value')) {
        window.initCoinCalculator();
    }
});
