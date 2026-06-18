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
            slide.classList.toggle('active', i === index);
            slide.classList.toggle('opacity-0', i !== index);
            slide.classList.toggle('opacity-100', i === index);
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
    }, 5000);
});