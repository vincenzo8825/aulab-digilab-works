
document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            const slideNav = document.querySelector('.slide-nav');
            const slideProgress = document.querySelector('.slide-progress');
            const slideLabels = [
                'Introduzione',
                'Panoramica',
                'Sprint 1',
                'Sprint 2',
                'Sprint 3',
                'Sprint 4',
                'Risultati',
                'Grazie'
            ];

            // Aggiunta di una classe al body per gestire lo stile in base alla slide attiva
            function updateBodyClass(index) {
                document.body.className = '';
                document.body.classList.add(`on-slide-${index + 1}`);
            }

            while (slideLabels.length < slides.length) {
                slideLabels.push(`Slide ${slideLabels.length + 1}`);
            }

            if (slideNav) {
                slideNav.innerHTML = '';

                slides.forEach((slide, index) => {
                    const navDot = document.createElement('div');
                    navDot.classList.add('slide-nav-item');
                    navDot.setAttribute('data-tooltip', slideLabels[index]);
                    if (index === 0) {
                        navDot.classList.add('active');
                        updateBodyClass(0);
                    }
                    navDot.addEventListener('click', () => {
                        slide.scrollIntoView({ behavior: 'smooth' });
                    });
                    slideNav.appendChild(navDot);
                });
            }

            const prevBtn = document.querySelector('.prev-slide');
            const nextBtn = document.querySelector('.next-slide');
            const navDots = document.querySelectorAll('.slide-nav-item');

            function getCurrentSlideIndex() {
                const viewportHeight = window.innerHeight;
                const viewportCenter = viewportHeight / 2;

                let closestSlide = 0;
                let closestDistance = Infinity;

                slides.forEach((slide, index) => {
                    const rect = slide.getBoundingClientRect();
                    const slideCenter = rect.top + (rect.height / 2);
                    const distance = Math.abs(slideCenter - viewportCenter);

                    if (distance < closestDistance) {
                        closestDistance = distance;
                        closestSlide = index;
                    }
                });

                return closestSlide;
            }

            if (prevBtn && nextBtn) {
                prevBtn.addEventListener('click', () => {
                    const activeIndex = getCurrentSlideIndex();
                    if (activeIndex > 0) {
                        slides[activeIndex - 1].scrollIntoView({ behavior: 'smooth' });
                    }
                });

                nextBtn.addEventListener('click', () => {
                    const activeIndex = getCurrentSlideIndex();
                    if (activeIndex < slides.length - 1) {
                        slides[activeIndex + 1].scrollIntoView({ behavior: 'smooth' });
                    }
                });
            }

            const observerOptions = {
                root: null,
                rootMargin: '-10% 0px -10% 0px',
                threshold: 0.4
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const slideId = entry.target.id;
                        const slideIndex = parseInt(slideId.split('-')[1]) - 1;


                        navDots.forEach(dot => dot.classList.remove('active'));
                        if (navDots[slideIndex]) {
                            navDots[slideIndex].classList.add('active');
                        }

                        // Update progress bar
                        if (slideProgress) {
                            const progress = (slideIndex / (slides.length - 1)) * 100;
                            slideProgress.style.width = `${progress}%`;
                        }

                        // Animate slide content
                        const content = entry.target.querySelector('.slide-content');
                        if (content) {
                            content.style.opacity = 0;
                            content.style.transform = 'translateY(30px)';
                            setTimeout(() => {
                                content.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                                content.style.opacity = 1;
                                content.style.transform = 'translateY(0)';

                                // Anima le barre di contribuzione quando la slide 2  è visibile
                                if (slideIndex === 1) {
                                    animateContributionBars();
                                }
                            }, 200);
                        }


                        if (slideIndex === 7) {
                            generateParticles();
                        }
                    }
                });
            }, observerOptions);

            slides.forEach(slide => {
                observer.observe(slide);
            });

            function animateContributionBars() {
                const contributionBars = document.querySelectorAll('.contribution-bar');
                const contributionPercentages = document.querySelectorAll('.contribution-percentage');

                contributionBars.forEach((bar, index) => {
                    bar.style.width = '0%';
                    bar.classList.remove('animated');

                    // Resetta il testo della percentuale a 0%
                    if (contributionPercentages[index]) {
                        contributionPercentages[index].textContent = '0%';
                    }

                    setTimeout(() => {
                        bar.classList.add('animated');
                    }, 100);

                    let width = 0;
                    const targetWidth = 100;
                    const duration = 2000;
                    const interval = 20;
                    const steps = duration / interval;
                    const increment = targetWidth / steps;

                    const animation = setInterval(() => {
                        width += increment;
                        if (width >= targetWidth) {
                            width = targetWidth;
                            clearInterval(animation);
                        }

                        bar.style.width = `${width}%`;

                        // Aggiorna il testo della percentuale in sincronia con la barra
                        if (contributionPercentages[index]) {
                            contributionPercentages[index].textContent = `${Math.round(width)}%`;
                        }
                    }, interval);
                });
            }

            function generateParticles() {
                const container = document.getElementById('particles-container');
                if (!container) return;

                // Pulisce l container prima di aggiungere nuove particelle
                container.innerHTML = '';

                for (let i = 0; i < 50; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');

                    // Posizione casuale
                    const posX = Math.random() * 100;
                    const posY = Math.random() * 100;
                    particle.style.left = `${posX}%`;
                    particle.style.bottom = `${posY}%`;

                    // Dimensione casuale
                    const size = Math.random() * 8 + 2;
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;

                    // Durata animazione casuale
                    const duration = Math.random() * 15 + 10;
                    particle.style.animationDuration = `${duration}s`;

                    // Ritardo casuale
                    const delay = Math.random() * 5;
                    particle.style.animationDelay = `${delay}s`;

                    container.appendChild(particle);
                }
            }

            setTimeout(() => {
                const firstSlideContent = slides[0].querySelector('.slide-content');
                if (firstSlideContent) {
                    firstSlideContent.style.opacity = 0;
                    firstSlideContent.style.transform = 'translateY(30px)';
                    setTimeout(() => {
                        firstSlideContent.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                        firstSlideContent.style.opacity = 1;
                        firstSlideContent.style.transform = 'translateY(0)';
                    }, 200);
                }
            }, 500);


            document.addEventListener('keydown', (e) => {
                const activeIndex = getCurrentSlideIndex();

                if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                    if (activeIndex < slides.length - 1) {
                        slides[activeIndex + 1].scrollIntoView({ behavior: 'smooth' });
                    }
                } else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                    if (activeIndex > 0) {
                        slides[activeIndex - 1].scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });

        // Aggiornamento della funzione updateActiveSlide per includere l'aggiornamento della classe del body
        function updateActiveSlide() {
            const activeIndex = getCurrentSlideIndex();

            navDots.forEach((dot, index) => {
                if (index === activeIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });

            // Aggiorna la barra di progresso
            if (slideProgress) {
                const progress = ((activeIndex + 1) / slides.length) * 100;
                slideProgress.style.width = `${progress}%`;
            }

            // Aggiorna la classe del body
            updateBodyClass(activeIndex);
        }

        // Aggiunge un effetto di fade-in per i pulsanti di navigazione
        setTimeout(() => {
            if (slideNav) slideNav.classList.add('fade-in');
            const controls = document.querySelector('.slide-controls');
            if (controls) controls.classList.add('fade-in');
        }, 1000);
