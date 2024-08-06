document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.nav-links a');
    const sections = document.querySelectorAll('.section');

    // Show the hero section initially
    const heroSection = document.getElementById('hero');
    heroSection.classList.remove('hidden');
    console.log('Hero section loaded:', heroSection);

    sections.forEach(section => {
        console.log('Section found:', section.id);
    });

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetSection = document.getElementById(link.getAttribute(
            'data-section'));
            console.log('Navigating to section:', targetSection.id);

            sections.forEach(section => section.classList.add('hidden'));
            targetSection.classList.remove('hidden');
        });
    });
});