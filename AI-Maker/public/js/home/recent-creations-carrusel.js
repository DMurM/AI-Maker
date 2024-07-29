document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('carousel');
    let isDown = false;
    let startX;
    let scrollLeft;

    carousel.addEventListener('mousedown', (e) => {
        isDown = true;
        carousel.classList.add('active');
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
        e.preventDefault();  // Prevenir el comportamiento predeterminado
    });

    carousel.addEventListener('mouseleave', () => {
        isDown = false;
        carousel.classList.remove('active');
    });

    carousel.addEventListener('mouseup', () => {
        isDown = false;
        carousel.classList.remove('active');
    });

    carousel.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2;  // Controla la velocidad del desplazamiento
        carousel.scrollLeft = scrollLeft - walk;
    });

    // Agregar evento wheel para el desplazamiento
    carousel.addEventListener('wheel', (e) => {
        e.preventDefault();
        carousel.scrollLeft += e.deltaY * 2;  // Controla la velocidad del desplazamiento con la rueda del mouse
    });
});
