import AOS from 'aos';
import 'aos/dist/aos.css';
import Alpine from 'alpinejs';

// Initialize AOS with professional settings
AOS.init({
    duration: 800,
    easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
    once: true,
    offset: 100,
    delay: 0,
    anchorPlacement: 'top-bottom',
});

// Initialize Alpine.js
Alpine.start();

// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
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