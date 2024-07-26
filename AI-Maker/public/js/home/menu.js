document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggles = document.querySelectorAll('.has-dropdown > a');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = this.nextElementSibling;
            const isVisible = dropdown.style.display === 'flex';

            // Cierra todos los dropdowns abiertos
            document.querySelectorAll('.nav-links .dropdown').forEach(menu => {
                menu.style.display = 'none';
            });

            // Abre el dropdown seleccionado
            if (!isVisible) {
                dropdown.style.display = 'flex';
            }
        });
    });

    // Cierra el dropdown si se hace clic fuera
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.has-dropdown')) {
            document.querySelectorAll('.nav-links .dropdown').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
});
