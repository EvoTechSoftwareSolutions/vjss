// ============================================
// VJ SECURITY SERVICES - COMBINED SCRIPTS
// Merged from Hero/Nav + Footer components
// ============================================

// ============================================
// NAVIGATION & MOBILE MENU
// ============================================

const menuToggle = document.getElementById('menuToggle');
const mobileMenu = document.getElementById('mobileMenu');
const menuOverlay = document.getElementById('menuOverlay');
const mobileMenuClose = document.getElementById('mobileMenuClose');
const navbar = document.getElementById('navbar');

function toggleMenu() {
    menuToggle.classList.toggle('active');
    mobileMenu.classList.toggle('active');
    menuOverlay.classList.toggle('active');
    document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
}

function closeMenu() {
    menuToggle.classList.remove('active');
    mobileMenu.classList.remove('active');
    menuOverlay.classList.remove('active');
    document.body.style.overflow = '';
}

// Event listeners for mobile menu
if (menuToggle) {
    menuToggle.addEventListener('click', toggleMenu);
}

if (menuOverlay) {
    menuOverlay.addEventListener('click', closeMenu);
}

if (mobileMenuClose) {
    mobileMenuClose.addEventListener('click', closeMenu);
}

// Close menu when clicking on links
if (mobileMenu) {
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            if (mobileMenu.classList.contains('active')) {
                closeMenu();
            }
        });
    });
}

// ============================================
// SCROLL EFFECTS - NAVBAR & SCROLL-TO-TOP
// ============================================

const scrollToTopBtn = document.getElementById('scrollToTop');
const sections = document.querySelectorAll('section');
const navLinksArray = document.querySelectorAll('.nav-links a');

window.addEventListener('scroll', () => {
    // Navbar scroll effect
    // if (window.scrollY > 50) {
    //     navbar.classList.add('scrolled');
    // } else {
    //     navbar.classList.remove('scrolled');
    // }

    // Scroll-to-top button visibility
    if (scrollToTopBtn) {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('visible');
        } else {
            scrollToTopBtn.classList.remove('visible');
        }
    }

    // Active nav link highlighting
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        if (scrollY >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });

    navLinksArray.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// ============================================
// SMOOTH SCROLL
// ============================================

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Smooth scroll for all anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Make scrollToTop available globally
window.scrollToTop = scrollToTop;



// ============================================
// STATS COUNT-UP ANIMATION
// Add to bottom of script.js
// ============================================

(function () {
    function animateCountUp(el) {
        const target = parseInt(el.dataset.target, 10);
        const prefix = el.dataset.prefix || '';
        const suffix = el.dataset.suffix || '';
        const pad = el.dataset.pad ? parseInt(el.dataset.pad, 10) : 0;
        const duration = 1800; // ms
        const startTime = performance.now();

        // Special case: ND7924 — animate the number part only
        const isLicense = prefix === 'ND';

        function easeOutExpo(t) {
            return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
        }

        function format(val) {
            if (isLicense) {
                return prefix + String(Math.round(val)).padStart(4, '0');
            }
            if (pad) {
                return String(Math.round(val)).padStart(pad, '0') + suffix;
            }
            return prefix + Math.round(val) + suffix;
        }

        function tick(now) {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const eased = easeOutExpo(progress);
            const current = eased * target;
            el.textContent = format(current);

            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                el.textContent = format(target);
            }
        }

        requestAnimationFrame(tick);
    }

    // IntersectionObserver — trigger once when stats section enters viewport
    const statsSection = document.querySelector('.stats-section');
    if (!statsSection) return;

    const statValues = statsSection.querySelectorAll('.stat-value[data-target]');

    const observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    statValues.forEach(function (el) {
                        animateCountUp(el);
                    });
                    observer.disconnect(); // Only animate once
                }
            });
        },
        { threshold: 0.3 }
    );

    observer.observe(statsSection);
})();