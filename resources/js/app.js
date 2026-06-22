import AOS from 'aos';
import 'aos/dist/aos.css';
import Alpine from 'alpinejs';

const prefersReducedMotion = () => window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function initializeAOS() {
    AOS.init({
        duration: 800,
        easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
        once: true,
        offset: 120,
        delay: 0,
        anchorPlacement: 'top-bottom',
        debounceDelay: 50,
        throttleDelay: 99,
        disable: prefersReducedMotion(),
    });
}

Alpine.start();

function bindMobileMenu() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (!mobileMenuButton || !mobileMenu) {
        return;
    }

    mobileMenuButton.addEventListener('click', () => {
        const open = mobileMenu.classList.toggle('hidden');
        mobileMenuButton.setAttribute('aria-expanded', String(!open));
    });
}

function bindVideoModal() {
    const openVideoModalButton = document.getElementById('open-video-modal');
    const closeVideoModalButton = document.getElementById('close-video-modal');
    const videoModalOverlay = document.getElementById('video-modal-overlay');

    if (!openVideoModalButton || !closeVideoModalButton || !videoModalOverlay) {
        return;
    }

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

// initialize after DOM ready and once AOS has had a chance to paint
function onDocumentReady() {
    bindMobileMenu();
    bindVideoModal();

    if (document.querySelector('[data-aos]')) {
        initializeAOS();
    }

    if (prefersReducedMotion() && AOS && AOS.refresh) {
        AOS.refresh();
        console.info('User prefers reduced motion: disabling non-essential animations');
    }

    initScrollLinkedAnimations();
}

document.addEventListener('DOMContentLoaded', onDocumentReady);

// Scroll-linked animations: performant, rAF-driven transforms
function initScrollLinkedAnimations() {
    if (prefersReducedMotion()) return;

    const elements = Array.from(document.querySelectorAll('.scroll-animate'));
    if (!elements.length) return;

    const active = new Set();
    const elData = new Map();
    const DEFAULT_SPEED = 0.08;
    const MAX_SPEED = 0.18;
    const MIN_SPEED = 0.02;

    const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const el = entry.target;
            if (entry.isIntersecting) {
                active.add(el);
                const rawSpeed = parseFloat(el.dataset.speed);
                elData.set(el, {
                    speed: Number.isFinite(rawSpeed) ? Math.min(MAX_SPEED, Math.max(MIN_SPEED, rawSpeed)) : DEFAULT_SPEED,
                    fade: el.dataset.fade === 'true'
                });
            } else {
                active.delete(el);
            }
        });
    }, { root: null, rootMargin: '150px 0px', threshold: [0, 0.2, 0.5, 0.8, 1] });

    elements.forEach(el => {
        el.classList.add('scroll-animate-ready');
        el.style.willChange = 'transform, opacity';
        io.observe(el);
    });

    let ticking = false;
    function update() {
        const vh = window.innerHeight;
        active.forEach(el => {
            const rect = el.getBoundingClientRect();
            const { speed, fade } = elData.get(el) || { speed: DEFAULT_SPEED, fade: false };
            const progress = Math.max(0, Math.min(1, 1 - ((rect.top + rect.height) / (vh + rect.height))));
            const offset = (progress - 0.5) * speed * 80;
            el.style.transform = `translate3d(0, ${offset}px, 0)`;
            if (fade) {
                const visible = Math.max(0, Math.min(1, (vh - rect.top) / (vh + rect.height)));
                el.style.opacity = String(Math.max(0.97, visible));
            } else if (el.style.opacity) {
                el.style.opacity = '';
            }
        });
        ticking = false;
    }

    function scheduleUpdate() {
        if (!ticking) {
            requestAnimationFrame(update);
            ticking = true;
        }
    }

    window.addEventListener('scroll', scheduleUpdate, { passive: true });
    window.addEventListener('resize', scheduleUpdate);

    // initial update
    requestAnimationFrame(update);
}