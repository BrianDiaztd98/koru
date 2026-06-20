import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS with professional settings
AOS.init({
    duration: 800,
    easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
    once: true,
    offset: 100,
    delay: 0,
    anchorPlacement: 'top-bottom',
});

// Carousel functionality
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-indicator');
    let currentSlide = 0;
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            const video = slide.querySelector('video');
            const isActive = i === index;
            slide.classList.toggle('active', isActive);
            slide.classList.toggle('opacity-0', !isActive);
            slide.classList.toggle('opacity-100', isActive);
            if (video) {
                if (isActive) {
                    video.play().catch(() => {});
                } else {
                    video.pause();
                }
            }
        });
        indicators.forEach((ind, i) => {
            ind.classList.toggle('active', i === index);
            ind.classList.toggle('bg-mint', i === index);
            ind.classList.toggle('bg-white/30', i !== index);
        });
    }
    
    indicators.forEach((ind, index) => {
        ind.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });
    
    // Auto-rotate carousel
    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 10000);

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const openVideoModalButton = document.getElementById('open-video-modal');
    const closeVideoModalButton = document.getElementById('close-video-modal');
    const videoModalOverlay = document.getElementById('video-modal-overlay');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            const open = mobileMenu.classList.toggle('hidden');
            mobileMenuButton.setAttribute('aria-expanded', String(!open));
        });
    }

    if (openVideoModalButton && closeVideoModalButton && videoModalOverlay) {
        openVideoModalButton.addEventListener('click', () => {
            videoModalOverlay.classList.remove('hidden');
        });

        closeVideoModalButton.addEventListener('click', () => {
            videoModalOverlay.classList.add('hidden');
        });

        videoModalOverlay.addEventListener('click', (event) => {
            if (event.target === videoModalOverlay) {
                videoModalOverlay.classList.add('hidden');
            }
        });
    }
});