import './bootstrap';

const typingPhrases = [
    'Laravel Developer',
    'Backend Engineer',
    'API Specialist',
    'PHP Developer',
];

const typingElement = document.getElementById('typing-label');

function setupTypingEffect() {
    if (!typingElement) return;

    let phraseIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    const type = () => {
        const currentPhrase = typingPhrases[phraseIndex];

        if (isDeleting) {
            charIndex--;
        } else {
            charIndex++;
        }

        typingElement.textContent = currentPhrase.slice(0, charIndex);

        let delay = isDeleting ? 60 : 120;

        if (!isDeleting && charIndex === currentPhrase.length) {
            delay = 1500;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            phraseIndex = (phraseIndex + 1) % typingPhrases.length;
            delay = 400;
        }

        window.setTimeout(type, delay);
    };

    type();
}

function setupNavbar() {
    const navbar = document.getElementById('navbar');
    const toggle = document.getElementById('nav-toggle');
    const menu = document.getElementById('nav-menu');

    if (!navbar || !toggle || !menu) return;

    const updateNavbar = () => {
        const scrolled = window.scrollY > 50;
        if (scrolled) {
            navbar.classList.add('shadow-[0_18px_60px_rgba(0,0,0,0.8)]');
        } else {
            navbar.classList.remove('shadow-[0_18px_60px_rgba(0,0,0,0.8)]');
        }
    };

    window.addEventListener('scroll', updateNavbar, { passive: true });
    updateNavbar();

    const toggleMenu = () => {
        menu.classList.toggle('nav-open');
        toggle.classList.toggle('nav-open');
    };

    toggle.addEventListener('click', toggleMenu);

    menu.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768) {
                toggleMenu();
            }
        });
    });
}

function setupSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const href = link.getAttribute('href');
            if (!href || href === '#') return;

            const target = document.querySelector(href);
            if (!target) return;

            event.preventDefault();
            const offset = 80;
            const top = target.getBoundingClientRect().top + window.scrollY - offset;

            window.scrollTo({
                top,
                behavior: 'smooth',
            });
        });
    });
}

function setupFadeInObserver() {
    const sections = document.querySelectorAll('.fade-section, .timeline-card');
    if (!sections.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.2,
            rootMargin: '0px 0px -40px 0px',
        }
    );

    sections.forEach((section) => observer.observe(section));
}

window.addEventListener('DOMContentLoaded', () => {
    setupTypingEffect();
    setupNavbar();
    setupSmoothScroll();
    setupFadeInObserver();
});
