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
    anchor.addEventListener('click', function (e) {
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


// ============================================
// APPROACH SECTION - SCROLL REVEAL ANIMATION
// ============================================

(function () {
    const approachCards = document.querySelectorAll('[data-approach-card]');
    if (!approachCards.length) return;

    // Set initial state
    approachCards.forEach((card, i) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(24px)';
        card.style.transition = `opacity 0.55s ease ${i * 0.15}s, transform 0.55s ease ${i * 0.15}s`;
    });

    const approachObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                approachCards.forEach(card => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                });
                approachObserver.disconnect();
            }
        });
    }, { threshold: 0.15 });

    const approachSection = document.querySelector('.approach-section');
    if (approachSection) approachObserver.observe(approachSection);
})();


// ============================================
// SERVICE AREAS ACCORDION
// ============================================

(function () {
    const accordion = document.getElementById('areasAccordion');
    if (!accordion) return;

    const cards = accordion.querySelectorAll('.area-card');

    cards.forEach(function (card) {
        card.addEventListener('click', function () {
            if (card.classList.contains('active')) return;

            // Collapse all
            cards.forEach(function (c) {
                c.classList.remove('active');
            });

            // Expand clicked
            card.classList.add('active');
        });
    });
})();


// ============================================
// QUOTE SECTION — Custom Select & Placeholder
// ============================================

(function () {
    // Custom select dropdown
    const selectEl = document.getElementById('serviceTypeSelect');
    const dropdownEl = document.getElementById('serviceDropdown');

    if (selectEl && dropdownEl) {
        selectEl.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = dropdownEl.classList.contains('open');
            dropdownEl.classList.toggle('open', !isOpen);
            selectEl.classList.toggle('open', !isOpen);
        });

        dropdownEl.querySelectorAll('.quote-select-option').forEach(function (opt) {
            opt.addEventListener('click', function (e) {
                e.stopPropagation();
                const val = opt.textContent;
                selectEl.querySelector('.quote-select-text').textContent = val;
                selectEl.classList.add('selected');
                selectEl.classList.remove('open');
                dropdownEl.classList.remove('open');

                // Clear previous selection
                dropdownEl.querySelectorAll('.quote-select-option').forEach(o => o.classList.remove('selected'));
                opt.classList.add('selected');
            });
        });

        // Close on outside click
        document.addEventListener('click', function () {
            selectEl.classList.remove('open');
            dropdownEl.classList.remove('open');
        });
    }

    // Submit button feedback
    const submitBtn = document.getElementById('quoteSubmitBtn');
    if (submitBtn) {
        submitBtn.addEventListener('click', function () {
            submitBtn.textContent = 'Request Sent ✓';
            submitBtn.style.background = '#2a7a4b';
            submitBtn.style.color = '#fff';
            submitBtn.style.pointerEvents = 'none';
            setTimeout(function () {
                submitBtn.textContent = 'Send Request';
                submitBtn.style.background = '';
                submitBtn.style.color = '';
                submitBtn.style.pointerEvents = '';
            }, 3000);
        });
    }
})();


(function () {
    const items = document.querySelectorAll('[data-faq]');
    items.forEach(function (item) {
        item.querySelector('.faq-q').addEventListener('click', function () {
            const isActive = item.classList.contains('active');
            // Collapse all
            items.forEach(function (i) { i.classList.remove('active'); });
            // Expand clicked (unless it was already open)
            if (!isActive) item.classList.add('active');
        });
    });
})();