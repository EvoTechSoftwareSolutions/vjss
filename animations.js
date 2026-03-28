// ============================================
// VJ SECURITY SERVICES — ANIMATIONS JS
// Netherlands / Europe ambient light effects
// Add: <script src="animations.js"></script>
// at bottom of <body>, AFTER script.js
// ============================================


// ============================================
// 1. FLOATING PARTICLES — European night sky
// ============================================

(function () {
    const canvas = document.createElement('canvas');
    canvas.id = 'vj-particles';
    document.body.prepend(canvas);

    const ctx = canvas.getContext('2d');
    let W = window.innerWidth;
    let H = window.innerHeight;
    canvas.width = W;
    canvas.height = H;

    // Resize handler
    window.addEventListener('resize', function () {
        W = window.innerWidth;
        H = window.innerHeight;
        canvas.width = W;
        canvas.height = H;
    });

    // Particle config — very subtle, small
    const PARTICLE_COUNT = 55;
    const particles = [];

    function rand(min, max) {
        return Math.random() * (max - min) + min;
    }

    // Colors inspired by Netherlands flag + gold accent + night sky
    const COLORS = [
        'rgba(201, 162, 39, ',   // gold
        'rgba(74, 144, 226, ',   // blue
        'rgba(255, 255, 255, ',  // white star
        'rgba(30,  58,  95, ',   // deep blue
    ];

    for (let i = 0; i < PARTICLE_COUNT; i++) {
        particles.push({
            x:     rand(0, W),
            y:     rand(0, H),
            r:     rand(0.4, 1.8),
            dx:    rand(-0.12, 0.12),
            dy:    rand(-0.1, -0.3),   // drift upward slowly
            alpha: rand(0.08, 0.45),
            dAlpha: rand(0.001, 0.004),
            alphaDir: Math.random() < 0.5 ? 1 : -1,
            color: COLORS[Math.floor(Math.random() * COLORS.length)],
            twinkleSpeed: rand(0.005, 0.018),
        });
    }

    function drawParticles() {
        ctx.clearRect(0, 0, W, H);

        particles.forEach(function (p) {
            // Twinkle
            p.alpha += p.dAlpha * p.alphaDir;
            if (p.alpha >= 0.5 || p.alpha <= 0.04) {
                p.alphaDir *= -1;
            }

            // Drift
            p.x += p.dx;
            p.y += p.dy;

            // Wrap around
            if (p.y < -5)  p.y = H + 5;
            if (p.x < -5)  p.x = W + 5;
            if (p.x > W + 5) p.x = -5;

            // Draw
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = p.color + p.alpha + ')';
            ctx.fill();
        });

        requestAnimationFrame(drawParticles);
    }

    drawParticles();
})();


// ============================================
// 2. SCROLL REVEAL — Sections & Elements
// ============================================

(function () {
    // Elements to reveal on scroll
    const revealTargets = [
        { selector: '.about-left',        cls: 'vj-reveal-left' },
        { selector: '.about-right',       cls: 'vj-reveal-right' },
        { selector: '.about-license-box', cls: 'vj-reveal' },
        { selector: '.stat-item',         cls: 'vj-reveal' },
        { selector: '.service-card',      cls: 'vj-reveal' },
        { selector: '.services-intro',    cls: 'vj-reveal-left' },
        { selector: '.quote-left',        cls: 'vj-reveal-left' },
        { selector: '.quote-right',       cls: 'vj-reveal-right' },
        { selector: '.contact-info-left', cls: 'vj-reveal-left' },
        { selector: '.contact-info-right',cls: 'vj-reveal-right' },
        { selector: '.faq-item',          cls: 'vj-reveal' },
        { selector: '.areas-header',      cls: 'vj-reveal' },
        { selector: '.areas-info-bar',    cls: 'vj-reveal' },
        { selector: '.footer-cta-box',    cls: 'vj-reveal' },
    ];

    revealTargets.forEach(function (t) {
        document.querySelectorAll(t.selector).forEach(function (el, i) {
            el.classList.add(t.cls);
            // Stagger delay for lists
            if (['stat-item','service-card','faq-item'].some(s => t.selector.includes(s))) {
                el.style.transitionDelay = (i * 0.08) + 's';
            }
        });
    });

    const revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('vj-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.vj-reveal, .vj-reveal-left, .vj-reveal-right')
        .forEach(function (el) {
            revealObserver.observe(el);
        });
})();


// ============================================
// 3. AMBIENT CURSOR GLOW — subtle, desktop only
// ============================================

(function () {
    if (window.matchMedia('(pointer: coarse)').matches) return; // skip touch devices

    const glow = document.createElement('div');
    glow.style.cssText = [
        'position:fixed',
        'pointer-events:none',
        'z-index:9999',
        'width:280px',
        'height:280px',
        'border-radius:50%',
        'background:radial-gradient(ellipse at center, rgba(201, 163, 39, 0.1) 0%, transparent 65%)',
        'transform:translate(-50%,-50%)',
        'transition:opacity 0.4s ease',
        'opacity:0',
        'top:0',
        'left:0',
    ].join(';');
    document.body.appendChild(glow);

    let mouseX = 0, mouseY = 0;
    let glowX = 0, glowY = 0;
    let visible = false;

    document.addEventListener('mousemove', function (e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
        if (!visible) {
            glow.style.opacity = '1';
            visible = true;
        }
    });

    document.addEventListener('mouseleave', function () {
        glow.style.opacity = '0';
        visible = false;
    });

    // Smooth follow with lerp
    function followCursor() {
        glowX += (mouseX - glowX) * 0.06;
        glowY += (mouseY - glowY) * 0.06;
        glow.style.left = glowX + 'px';
        glow.style.top  = glowY + 'px';
        requestAnimationFrame(followCursor);
    }

    followCursor();
})();


// ============================================
// 4. SECTION AMBIENT LIGHT — radial bg glow
//    Highlights the currently visible section
// ============================================

(function () {
    const sectionGlows = {
        'about':        'rgba(30, 58, 95, 0.12)',
        'stats':        'rgba(201, 162, 39, 0.06)',
        'services':     'rgba(30, 58, 95, 0.1)',
        'approach':     'rgba(4, 55, 117, 0.15)',
        'service-areas':'rgba(201, 162, 39, 0.07)',
        'booking':      'rgba(12, 21, 40, 0.2)',
        'contact':      'rgba(30, 58, 95, 0.12)',
        'faq':          'rgba(11, 25, 37, 0.15)',
    };

    const overlay = document.createElement('div');
    overlay.style.cssText = [
        'position:fixed',
        'top:0', 'left:0',
        'width:100%', 'height:100%',
        'pointer-events:none',
        'z-index:0',
        'transition:background 1.5s ease',
    ].join(';');
    document.body.appendChild(overlay);

    const sectionEls = document.querySelectorAll('section[id]');

    const sectionObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                const color = sectionGlows[id];
                if (color) {
                    overlay.style.background =
                        'radial-gradient(ellipse at center, ' + color + ' 0%, transparent 70%)';
                } else {
                    overlay.style.background = 'none';
                }
            }
        });
    }, { threshold: 0.35 });

    sectionEls.forEach(function (s) { sectionObserver.observe(s); });
})();


// ============================================
// 5. NAVBAR — scroll glass effect enhancer
// ============================================

(function () {
    const nav = document.getElementById('navbar');
    if (!nav) return;

    let lastY = 0;

    window.addEventListener('scroll', function () {
        const y = window.scrollY;

        if (y > 50) {
            nav.style.top = '0';
            nav.style.backdropFilter = 'blur(10px)';
            // nav.style.background = 'rgba(10, 15, 26, 0.92)';
            nav.style.borderRadius = '0 0 20px 20px';
            nav.style.paddingTop = '0.35rem';
            nav.style.paddingBottom = '0.35rem';
            // nav.style.borderBottom = '1px solid rgba(201, 162, 39, 0.12)';
        } else {
            nav.style.top = '12px';
            nav.style.backdropFilter = '';
            nav.style.background = '';
            nav.style.borderRadius = '';
            nav.style.paddingTop = '';
            nav.style.paddingBottom = '';
            nav.style.borderBottom = '';
        }

        lastY = y;
    });
})();