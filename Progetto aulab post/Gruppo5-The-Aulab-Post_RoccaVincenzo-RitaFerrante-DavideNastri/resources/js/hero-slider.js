document.addEventListener('DOMContentLoaded', function() {
    // Array di percorsi delle immagini
    const images = [
        '/images/sfondohero.jpg',
        '/images/work-5382501_1280.jpg',
        '/images/teamwork-3213924_1280.jpg'
    ];

    let currentImageIndex = 0;
    const heroContainer = document.querySelector('.hero-image-container');

    // Crea gli elementi immagine
    if (heroContainer) {
        heroContainer.innerHTML = '';

        // Crea e aggiunge tutte le immagini
        images.forEach((src, index) => {
            const img = document.createElement('img');
            img.src = src;
            img.alt = 'Hero image ' + (index + 1);
            img.className = 'hero-image ' + (index === 0 ? 'active' : 'next');
            heroContainer.appendChild(img);
        });

        // Imposta il timer per cambiare le immagini
        setInterval(() => {
            const currentImage = heroContainer.querySelector('.hero-image.active');
            const nextIndex = (currentImageIndex + 1) % images.length;
            const nextImage = heroContainer.querySelectorAll('.hero-image')[nextIndex];

            // Aggiungo una classe per l'effetto di transizione
            currentImage.classList.add('fade-out');
            nextImage.classList.add('fade-in');


            setTimeout(() => {
                currentImage.classList.remove('active', 'fade-out');
                currentImage.classList.add('next');
                nextImage.classList.remove('next', 'fade-in');
                nextImage.classList.add('active');

                currentImageIndex = nextIndex;
            }, 1000); // Durata della transizione

        }, 5000); // Cambia ogni 5 secondi
    }
});
