import './bootstrap';

// ─── Typing effect ───────────────────────────────────────────────────────────
const typingPhrases = [
    'Laravel Developer',
    'Backend Engineer',
    'API Specialist',
    'PHP Developer',
];

function setupTypingEffect() {
    const el = document.getElementById('typing-label');
    if (!el) return;

    let phraseIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    const type = () => {
        const phrase = typingPhrases[phraseIndex];
        charIndex += isDeleting ? -1 : 1;
        el.textContent = phrase.slice(0, charIndex);

        let delay = isDeleting ? 60 : 120;

        if (!isDeleting && charIndex === phrase.length) {
            delay = 1500;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            phraseIndex = (phraseIndex + 1) % typingPhrases.length;
            delay = 400;
        }

        setTimeout(type, delay);
    };

    type();
}

// ─── Navbar scroll shadow ────────────────────────────────────────────────────
function setupNavbarShadow() {
    const navbar = document.getElementById('navbar');
    if (!navbar) return;

    const update = () => {
        navbar.classList.toggle(
            'shadow-[0_18px_60px_rgba(0,0,0,0.8)]',
            window.scrollY > 50
        );
    };

    window.addEventListener('scroll', update, { passive: true });
    update();
}

// ─── Mobile hamburger toggle ─────────────────────────────────────────────────
function setupMobileMenu() {
    const toggle = document.getElementById('nav-toggle');
    const menu   = document.getElementById('nav-menu');
    if (!toggle || !menu) return;

    const open = () => {
        menu.classList.remove('hidden');
        // Force reflow so transition plays from max-height:0
        menu.getBoundingClientRect();
        menu.classList.add('nav-open');
        toggle.classList.add('nav-open');
        toggle.setAttribute('aria-expanded', 'true');
    };

    const close = () => {
        menu.classList.remove('nav-open');
        toggle.classList.remove('nav-open');
        toggle.setAttribute('aria-expanded', 'false');
        // Hide after transition ends to avoid accessibility issues
        menu.addEventListener('transitionend', () => {
            if (!menu.classList.contains('nav-open')) {
                menu.classList.add('hidden');
            }
        }, { once: true });
    };

    toggle.addEventListener('click', () => {
        menu.classList.contains('nav-open') ? close() : open();
    });

    // Close when a link is tapped
    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', close);
    });

    // Close when clicking outside
    document.addEventListener('click', (e) => {
        if (!toggle.contains(e.target) && !menu.contains(e.target)) {
            if (menu.classList.contains('nav-open')) close();
        }
    });
}

// ─── Active nav link on scroll (Intersection Observer) ───────────────────────
function setupActiveNavLinks() {
    const sectionIds = ['hero', 'about', 'skills', 'experience', 'education', 'projects', 'contact'];

    // Collect all nav links (desktop + mobile)
    const allLinks = () =>
        document.querySelectorAll('.nav-link, .mobile-nav-link');

    const setActive = (id) => {
        allLinks().forEach((link) => {
            const href = link.getAttribute('href');
            if (href === `#${id}`) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    };

    // Intersection Observer — fires when a section enters the viewport
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    setActive(entry.target.id);
                }
            });
        },
        {
            // Trigger when section is ~20% into the viewport from the top
            rootMargin: '-20% 0px -60% 0px',
            threshold: 0,
        }
    );

    sectionIds.forEach((id) => {
        const el = document.getElementById(id);
        if (el) observer.observe(el);
    });

    // Also set active immediately on link click (before scroll completes)
    allLinks().forEach((link) => {
        link.addEventListener('click', () => {
            const href = link.getAttribute('href');
            if (href && href.startsWith('#')) {
                setActive(href.slice(1));
            }
        });
    });
}

// ─── Smooth scroll ───────────────────────────────────────────────────────────
function setupSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            if (!href || href === '#') return;

            const target = document.querySelector(href);
            if (!target) return;

            e.preventDefault();
            const top = target.getBoundingClientRect().top + window.scrollY - 80;
            window.scrollTo({ top, behavior: 'smooth' });
        });
    });
}

// ─── Fade-in + timeline observer ────────────────────────────────────────────
function setupFadeInObserver() {
    const elements = document.querySelectorAll('.fade-section, .timeline-card');
    if (!elements.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
    );

    elements.forEach((el) => observer.observe(el));
}

// ─── Init ────────────────────────────────────────────────────────────────────
window.addEventListener('DOMContentLoaded', () => {
    setupTypingEffect();
    setupNavbarShadow();
    setupMobileMenu();
    setupActiveNavLinks();
    setupSmoothScroll();
    setupFadeInObserver();
});