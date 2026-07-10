import sal from 'sal.js';
import 'sal.js/dist/sal.css';

const prefersReducedMotion = () => window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// Keep a reference so we can re-scan dynamically added [data-sal] elements.
let salInstance = null;

function initializeSal() {
    // When reduced motion is preferred, SAL is initialized in "disabled" mode so it
    // adds `sal-disabled` to <body>, which makes every [data-sal] element visible.
    salInstance = sal({
        threshold: 0.15,
        once: true,
        disabled: prefersReducedMotion(),
    });
}

// SAL builds its IntersectionObserver only once. Livewire re-renders the Service Pillars
// cards on every tab switch (the container uses a dynamic wire:key), producing brand new
// [data-sal] nodes that the original observer never watches. Without re-scanning, those
// cards stay at opacity:0 and the tabs appear broken. `sal().update()` re-observes any
// [data-sal] element that has not been animated yet.
function registerLivewireSalSync() {
    if (!window.Livewire) {
        return;
    }

    window.Livewire.hook('morphed', ({ component }) => {
        if (component?.name !== 'components.service-pillars') {
            return;
        }

        if (salInstance && typeof salInstance.update === 'function') {
            salInstance.update();
        }
    });
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('heroCarousel', ({ totalSlides = 0 }) => ({
        currentSlide: 0,
        totalSlides,
        autoPlay: true,
        autoPlayTimer: null,
        autoPlayResume: null,
        reduceMotion: false,

        init() {
            this.reduceMotion = prefersReducedMotion();

            if (this.totalSlides > 1 && !this.reduceMotion) {
                this.startAutoPlay();
            }
        },

        startAutoPlay() {
            this.autoPlay = true;
            this.autoPlayTimer = setInterval(() => {
                if (this.autoPlay) {
                    this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                }
            }, 6000);
        },

        pauseAutoPlay() {
            this.autoPlay = false;
            clearInterval(this.autoPlayTimer);
            this.autoPlayTimer = null;
            clearTimeout(this.autoPlayResume);
            this.autoPlayResume = setTimeout(() => this.startAutoPlay(), 10000);
        },

        goTo(index) {
            const count = this.totalSlides;
            if (count === 0) {
                return;
            }
            this.currentSlide = ((index % count) + count) % count;
            this.pauseAutoPlay();
        },

        next() {
            this.goTo(this.currentSlide + 1);
        },

        prev() {
            this.goTo(this.currentSlide - 1);
        },

        destroy() {
            clearInterval(this.autoPlayTimer);
            clearTimeout(this.autoPlayResume);
        },
    }));
});

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

// initialize after DOM ready
function onDocumentReady() {
    if (document.querySelector('[data-sal]')) {
        initializeSal();
    }

    bindMobileMenu();
    bindVideoModal();
    initScrollLinkedAnimations();

    // Livewire may already be booted (script order), otherwise wait for its init event.
    if (window.Livewire) {
        registerLivewireSalSync();
    } else {
        document.addEventListener('livewire:init', registerLivewireSalSync, { once: true });
    }
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