document.addEventListener('DOMContentLoaded', () => {
    const aiToolsSection = document.getElementById('ai-tools');
    const aiToolsBackground = document.getElementById('ai-tools-background');
    const heading = document.getElementById('ai-tools-heading');
    const description = document.getElementById('ai-tools-description');
    const tools = document.getElementById('tools');
    let hasLoaded = false;

    const sections = document.querySelectorAll('.section');
    const menuLinks = document.querySelectorAll('.nav-links a');

    const typeWriter = (textElement, text, speed) => {
        return new Promise((resolve) => {
            let i = 0;
            textElement.textContent = '';
            textElement.style.opacity = 1;

            const type = () => {
                if (i < text.length) {
                    textElement.textContent += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                } else {
                    resolve();
                }
            };

            type();
        });
    };

    const showAIToolsSection = () => {
        hideAllSections();
        aiToolsSection.classList.remove('hidden');
        aiToolsBackground.classList.remove('hidden');

        if (!hasLoaded) {
            hasLoaded = true;
            heading.classList.remove('hidden');
            description.classList.remove('hidden');

            typeWriter(heading, 'Where imagination meets innovation.', 100)
                .then(() => typeWriter(description, 'Unlock your creative potential and transform your ideas into stunning realities with the power of AI.', 100))
                .then(() => new Promise(resolve => setTimeout(resolve, 3000)))
                .then(() => {
                    heading.style.opacity = 0;
                    description.style.opacity = 0;
                    setTimeout(() => {
                        heading.classList.add('hidden');
                        description.classList.add('hidden');

                        tools.classList.remove('hidden');
                        tools.classList.add('fade-in');
                    }, 1000);
                });
        } else {
            tools.classList.remove('hidden');
            tools.classList.add('fade-in');
        }
    };

    const hideAllSections = () => {
        sections.forEach(section => {
            section.classList.add('hidden');
        });
        aiToolsBackground.classList.add('hidden');
    };

    menuLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            const sectionId = event.target.getAttribute('data-section');
            if (sectionId) {
                event.preventDefault();
                hideAllSections();
                document.getElementById(sectionId).classList.remove('hidden');
                if (sectionId === 'ai-tools') {
                    showAIToolsSection();
                } else {
                    aiToolsBackground.classList.add('hidden');
                }
            }
        });
    });
});
