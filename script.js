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

    // Call Now button
    const callBtn = document.querySelector('.nav-cta .btn-outline');
    if (callBtn) {
        if (window.scrollY > 100) {
            callBtn.style.borderColor = 'rgba(255, 255, 255, 0.4)';
            callBtn.style.color = 'rgba(255, 255, 255, 0.9)';
        } else {
            callBtn.style.borderColor = '';
            callBtn.style.color = '';
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


/* ============================================
   DATE PICKER — script.js ඒකේ date section replace
   HTML ඒ wenas karanna ne — native inputs ඒ
   JavaScript ඒ inject කරලා hide කරනවා
   ============================================ */

(function () {

    /* ──────────────────────────────────────────
       CONFIG
    ────────────────────────────────────────── */
    var MONTHS = ['January','February','March','April','May','June',
                  'July','August','September','October','November','December'];
    var DAYS   = ['Su','Mo','Tu','We','Th','Fr','Sa'];

    var today  = new Date();
    var TOD    = { y: today.getFullYear(), m: today.getMonth(), d: today.getDate() };

    /* ──────────────────────────────────────────
       STATE
    ────────────────────────────────────────── */
    var singleDate = null;   // { y, m, d }
    var fromDate   = null;
    var toDate     = null;

    var viewSingle = { y: TOD.y, m: TOD.m };
    var viewFrom   = { y: TOD.y, m: TOD.m };
    var viewTo     = { y: TOD.y, m: TOD.m };

    var openId = null;  // 'single' | 'from' | 'to'

    /* ──────────────────────────────────────────
       HELPERS
    ────────────────────────────────────────── */
    function dn(d)  { return d ? d.y*10000 + d.m*100 + d.d : 0; }
    function todayDn() { return TOD.y*10000 + TOD.m*100 + TOD.d; }

    function fmt(d) {
        if (!d) return null;
        return MONTHS[d.m].slice(0,3) + ' ' + d.d + ', ' + d.y;
    }

    function isoStr(d) {
        if (!d) return '';
        return d.y + '-' +
               String(d.m + 1).padStart(2,'0') + '-' +
               String(d.d).padStart(2,'0');
    }

    /* ──────────────────────────────────────────
       BUILD TRIGGER BUTTON + POPUP around each
       native <input type="date">
    ────────────────────────────────────────── */
    function buildTrigger(inputEl, triggerId, popupId, popupRight, placeholder) {
        /* wrapper */
        var wrap = document.createElement('div');
        wrap.className = 'qd-wrap';

        /* insert wrapper before input, then move input inside */
        inputEl.parentNode.insertBefore(wrap, inputEl);
        wrap.appendChild(inputEl);   /* native input moves into wrap (hidden via CSS) */

        /* trigger button */
        var btn = document.createElement('button');
        btn.type      = 'button';
        btn.className = 'qd-trigger';
        btn.id        = triggerId;
        btn.innerHTML =
            '<svg class="qd-trigger-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>' +
            '<span class="qd-trigger-text" id="' + triggerId + '-text">' + placeholder + '</span>' +
            '<svg class="qd-trigger-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>';

        wrap.insertBefore(btn, inputEl);

        /* popup */
        var popup = document.createElement('div');
        popup.className = 'qd-popup' + (popupRight ? ' qd-popup--right' : '');
        popup.id        = popupId;
        wrap.appendChild(popup);

        return { btn: btn, popup: popup, input: inputEl };
    }

    /* ──────────────────────────────────────────
       INIT — called after DOM ready
    ────────────────────────────────────────── */
    function init() {

        var nativeSingle = document.getElementById('singleDate');
        var nativeFrom   = document.getElementById('dateFrom');
        var nativeTo     = document.getElementById('dateTo');

        if (!nativeSingle || !nativeFrom || !nativeTo) return;

        var single = buildTrigger(nativeSingle, 'qd-single-btn', 'qd-single-popup', false, 'Select a date');
        var from   = buildTrigger(nativeFrom,   'qd-from-btn',   'qd-from-popup',   false, 'From date');
        var to     = buildTrigger(nativeTo,      'qd-to-btn',     'qd-to-popup',     true,  'To date');

        /* ── open / close ── */
        function openPopup(id) {
            if (openId === id) { closePopup(); return; }
            closePopup();
            openId = id;

            var el  = getEl(id);
            var pop = el.popup;
            var btn = el.btn;

            /* render content first */
            renderCal(id);

            /* move popup to body so overflow:hidden parents can't clip it */
            document.body.appendChild(pop);

            /* measure while invisible */
            pop.style.position   = 'fixed';
            pop.style.visibility = 'hidden';
            pop.style.top        = '-9999px';
            pop.style.left       = '-9999px';
            pop.classList.add('open');

            var btnRect = btn.getBoundingClientRect();
            var popH    = pop.offsetHeight;
            var popW    = pop.offsetWidth;

            /* vertical: open upward if not enough space below */
            var spaceBelow = window.innerHeight - btnRect.bottom - 8;
            var spaceAbove = btnRect.top - 8;
            var topVal = (spaceBelow >= popH || spaceBelow >= spaceAbove)
                ? btnRect.bottom + 6
                : btnRect.top - popH - 6;

            /* horizontal: right-align for "to" popup, clamp to viewport */
            var isRight = pop.classList.contains('qd-popup--right');
            var leftVal = isRight ? btnRect.right - popW : btnRect.left;
            leftVal = Math.max(8, Math.min(leftVal, window.innerWidth - popW - 8));

            pop.style.top        = topVal + 'px';
            pop.style.left       = leftVal + 'px';
            pop.style.visibility = '';

            btn.classList.add('open');
        }

        function closePopup() {
            if (!openId) return;
            var el  = getEl(openId);
            var pop = el.popup;
            pop.classList.remove('open');
            pop.style.top        = '';
            pop.style.left       = '';
            pop.style.bottom     = '';
            pop.style.position   = '';
            pop.style.visibility = '';
            /* move popup back into its wrap */
            if (pop.parentNode === document.body) {
                el.btn.parentNode.appendChild(pop);
            }
            el.btn.classList.remove('open');
            openId = null;
        }

        function getEl(id) {
            return id === 'single' ? single : id === 'from' ? from : to;
        }

        function getView(id) {
            return id === 'single' ? viewSingle : id === 'from' ? viewFrom : viewTo;
        }

        /* ── update button label ── */
        function updateBtn(id, dateObj, placeholder) {
            var el = getEl(id);
            var textEl = document.getElementById('qd-' + id + '-btn-text');
            if (!textEl) textEl = el.btn.querySelector('.qd-trigger-text');
            if (dateObj) {
                textEl.textContent = fmt(dateObj);
                el.btn.classList.add('has-value');
                el.input.value = isoStr(dateObj);
            } else {
                textEl.textContent = placeholder;
                el.btn.classList.remove('has-value');
                el.input.value = '';
            }
        }

        /* ── render calendar ── */
        function renderCal(id) {
            var v   = getView(id);
            var pop = getEl(id).popup;

            var first   = new Date(v.y, v.m, 1).getDay();
            var last    = new Date(v.y, v.m + 1, 0).getDate();
            var prevLst = new Date(v.y, v.m, 0).getDate();

            var h = '<div class="qd-header">'
                  + '<button type="button" class="qd-nav-btn" data-cal="' + id + '" data-dir="-1">&#8249;</button>'
                  + '<span class="qd-month-label">' + MONTHS[v.m] + ' ' + v.y + '</span>'
                  + '<button type="button" class="qd-nav-btn" data-cal="' + id + '" data-dir="1">&#8250;</button>'
                  + '</div>'
                  + '<div class="qd-grid">';

            /* day headers */
            DAYS.forEach(function(d){ h += '<div class="qd-dow">' + d + '</div>'; });

            /* leading prev-month days */
            for (var i = 0; i < first; i++) {
                h += '<div class="qd-day qd-other">' + (prevLst - first + 1 + i) + '</div>';
            }

            /* current month */
            for (var d = 1; d <= last; d++) {
                var dNum     = v.y*10000 + v.m*100 + d;
                var isToday  = (v.y === TOD.y && v.m === TOD.m && d === TOD.d);
                var isPast   = dNum < todayDn();

                var cls = 'qd-day';
                if (isToday) cls += ' qd-today';
                if (isPast)  cls += ' qd-disabled';

                /* selected / range coloring */
                if (id === 'single') {
                    if (singleDate && singleDate.y===v.y && singleDate.m===v.m && singleDate.d===d) {
                        cls += ' qd-selected';
                    }
                } else {
                    var rfn = dn(fromDate), rtn = dn(toDate);
                    if (rfn && rtn) {
                        if      (dNum === rfn && dNum === rtn) cls += ' qd-range-start qd-range-end';
                        else if (dNum === rfn)                 cls += ' qd-range-start';
                        else if (dNum === rtn)                 cls += ' qd-range-end';
                        else if (dNum > rfn && dNum < rtn)    cls += ' qd-in-range';
                    } else if (rfn && dNum === rfn) {
                        cls += ' qd-range-start qd-range-end';
                    }
                }

                h += '<div class="' + cls + '" data-cal="' + id + '" data-d="' + d + '">' + d + '</div>';
            }

            /* trailing next-month days */
            var total = first + last;
            var trail = total % 7 === 0 ? 0 : 7 - (total % 7);
            for (var t = 1; t <= trail; t++) {
                h += '<div class="qd-day qd-other">' + t + '</div>';
            }

            h += '</div>'
              + '<div class="qd-footer">'
              + '<button type="button" class="qd-foot-btn" data-action="cancel">Cancel</button>'
              + '<button type="button" class="qd-foot-btn qd-primary" data-action="done">Done</button>'
              + '</div>';

            pop.innerHTML = h;
        }

        /* ── day select logic ── */
        function selectDay(id, d) {
            var v      = getView(id);
            var chosen = { y: v.y, m: v.m, d: d };
            var choN   = dn(chosen);

            if (id === 'single') {
                singleDate = chosen;
                updateBtn('single', chosen, 'Select a date');
                renderCal('single');
                return;
            }

            if (id === 'from') {
                fromDate = chosen;
                if (toDate && dn(toDate) < choN) {
                    toDate = null;
                    updateBtn('to', null, 'To date');
                }
                updateBtn('from', chosen, 'From date');
                renderCal('from');
                if (toDate) renderCal('to');
                return;
            }

            if (id === 'to') {
                if (fromDate && choN < dn(fromDate)) {
                    toDate   = fromDate;
                    fromDate = chosen;
                    updateBtn('from', fromDate, 'From date');
                    updateBtn('to',   toDate,   'To date');
                    renderCal('from');
                    renderCal('to');
                } else {
                    toDate = chosen;
                    updateBtn('to', toDate, 'To date');
                    renderCal('to');
                    if (fromDate) renderCal('from');
                }
            }
        }

        /* ── nav month ── */
        function navMonth(id, dir) {
            var v = getView(id);
            v.m += dir;
            if (v.m > 11) { v.m = 0; v.y++; }
            if (v.m < 0)  { v.m = 11; v.y--; }
            renderCal(id);
        }

        /* ── click delegation ── */
        document.addEventListener('click', function(e) {

            /* trigger buttons */
            if (e.target.closest('#qd-single-btn')) { openPopup('single'); return; }
            if (e.target.closest('#qd-from-btn'))   { openPopup('from');   return; }
            if (e.target.closest('#qd-to-btn'))      { openPopup('to');     return; }

            /* nav buttons */
            var navBtn = e.target.closest('.qd-nav-btn');
            if (navBtn) {
                navMonth(navBtn.dataset.cal, parseInt(navBtn.dataset.dir));
                return;
            }

            /* day cells */
            var dayEl = e.target.closest('.qd-day');
            if (dayEl && dayEl.dataset.cal
                && !dayEl.classList.contains('qd-disabled')
                && !dayEl.classList.contains('qd-other')) {
                selectDay(dayEl.dataset.cal, parseInt(dayEl.dataset.d));
                return;
            }

            /* footer buttons */
            var footBtn = e.target.closest('.qd-foot-btn');
            if (footBtn) { closePopup(); return; }

            /* outside click */
            if (!e.target.closest('.qd-wrap')) { closePopup(); }
        });

        /* ── Date toggle tabs (Single / Range) ── */
        var dateTabs   = document.querySelectorAll('.quote-date-tab');
        var singleView = document.querySelector('.quote-date-single');
        var rangeView  = document.querySelector('.quote-date-range');

        dateTabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                dateTabs.forEach(function(t) { t.classList.remove('active'); });
                tab.classList.add('active');
                closePopup();
                if (tab.dataset.type === 'single') {
                    singleView.classList.remove('hidden');
                    rangeView.classList.add('hidden');
                } else {
                    singleView.classList.add('hidden');
                    rangeView.classList.remove('hidden');
                }
            });
        });
    }

    /* ── Run after DOM ready ── */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
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