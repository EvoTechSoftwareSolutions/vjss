// Styled Toast Notification Function
function showToast(message, type = 'success') {
    const existingToasts = document.querySelectorAll('.custom-toast');
    existingToasts.forEach(toast => toast.remove());

    const toast = document.createElement('div');
    toast.className = 'custom-toast';
    
    const icon = type === 'success' 
        ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>'
        : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>';

    toast.innerHTML = `
        <div class="toast-icon">${icon}</div>
        <div class="toast-content">
            <div class="toast-title">${type === 'success' ? 'Succes!' : 'Fout!'}</div>
            <div class="toast-message">${message}</div>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove()">×</button>
    `;

    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 16px 20px;
        border-radius: 12px;
        z-index: 99999;
        font-family: 'Segoe UI', system-ui, sans-serif;
        max-width: 400px;
        min-width: 300px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15), 0 2px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: flex-start;
        gap: 12px;
        animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        backdrop-filter: blur(10px);
        ${type === 'success' 
            ? 'background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%); color: #155724; border: 1px solid #b1dfbb;' 
            : 'background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%); color: #721c24; border: 1px solid #f1b0b7;'
        }
    `;

    if (!document.getElementById('toast-styles')) {
        const style = document.createElement('style');
        style.id = 'toast-styles';
        style.textContent = `
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
            .toast-icon { flex-shrink: 0; margin-top: 2px; }
            .toast-content { flex: 1; }
            .toast-title { font-weight: 700; font-size: 15px; margin-bottom: 4px; }
            .toast-message { font-size: 14px; line-height: 1.5; opacity: 0.9; }
            .toast-close {
                background: none;
                border: none;
                font-size: 20px;
                cursor: pointer;
                padding: 0;
                width: 24px;
                height: 24px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                transition: background 0.2s;
                color: inherit;
                opacity: 0.6;
            }
            .toast-close:hover { background: rgba(0,0,0,0.1); opacity: 1; }
        `;
        document.head.appendChild(style);
    }

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.style.animation = 'slideOutRight 0.3s ease forwards';
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

// Helper — placeholder text strip කරලා real value ගන්නවා
function getFieldValue(selector) {
    const el = document.querySelector(selector);
    if (!el) return '';
    const val = el.innerText.trim();
    const placeholder = el.getAttribute('data-placeholder') || '';
    return val === placeholder ? '' : val;
}

// Form Submission Function
function sendQuote() {
    const fname    = getFieldValue('.quote-left + .quote-right .quote-row:nth-child(1) .quote-field:nth-child(1) .quote-input');
    const lname    = getFieldValue('.quote-left + .quote-right .quote-row:nth-child(1) .quote-field:nth-child(2) .quote-input');
    const phone    = getFieldValue('.quote-left + .quote-right .quote-row:nth-child(2) .quote-field:nth-child(1) .quote-input');
    const email    = getFieldValue('.quote-left + .quote-right .quote-row:nth-child(2) .quote-field:nth-child(2) .quote-input');
    const location = getFieldValue('.quote-left + .quote-right .quote-row:nth-child(3) .quote-field:nth-child(2) .quote-input');
    const message  = getFieldValue('.quote-textarea');

    // Get selected service
    const serviceSelect = document.getElementById('serviceTypeSelect');
    const serviceText = serviceSelect?.querySelector('.quote-select-text')?.innerText || '';
    const service = serviceText.includes('Selecteer') ? '' : serviceText;

    // Get date info
    const activeTab = document.querySelector('.quote-date-tab.active');
    const dateType  = activeTab?.dataset.type || 'single';
    const singleDate = document.getElementById('singleDate')?.value || '';
    const dateFrom   = document.getElementById('dateFrom')?.value || '';
    const dateTo     = document.getElementById('dateTo')?.value || '';

    // Validation
    if (!fname) {
        showToast('Vul alstublieft uw naam in.', 'error');
        return;
    }
    if (!phone) {
        showToast('Vul alstublieft uw telefoonnummer in.', 'error');
        return;
    }
    if (!service) {
        showToast('Selecteer alstublieft een dienst.', 'error');
        return;
    }
    if (!location) {
        showToast('Vul alstublieft de locatie in.', 'error');
        return;
    }
    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showToast('Vul alstublieft een geldig e-mailadres in.', 'error');
        return;
    }

    // Prepare FormData
    const f = new FormData();
    f.append("fname",      fname);
    f.append("lname",      lname);
    f.append("phone",      phone);
    f.append("email",      email);
    f.append("service",    service);
    f.append("location",   location);
    f.append("dateType",   dateType);
    f.append("singleDate", singleDate);
    f.append("dateFrom",   dateFrom);
    f.append("dateTo",     dateTo);
    f.append("message",    message);

    // Submit button disable
    const submitBtn = document.getElementById('quoteSubmitBtn');
    if (submitBtn) {
        submitBtn.style.pointerEvents = 'none';
        submitBtn.style.opacity = '0.6';
        submitBtn.innerText = 'Verzenden...';
    }

    // Send request
    const r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            try {
                const response = JSON.parse(r.responseText);
                
                if (response.status === "success") {
                    // Clear form
                    document.querySelectorAll('.quote-input').forEach(input => {
                        input.innerText = '';
                    });
                    document.getElementById('singleDate').value = '';
                    document.getElementById('dateFrom').value  = '';
                    document.getElementById('dateTo').value    = '';

                    if (serviceSelect) {
                        serviceSelect.querySelector('.quote-select-text').innerText = 'Selecteer het gewenste servicetype.';
                    }

                    showToast('Offerte aanvraag succesvol verzonden! We nemen spoedig contact met u op.', 'success');
                } else {
                    showToast(response.message || 'Er is een fout opgetreden. Probeer het opnieuw.', 'error');
                }
            } catch (e) {
                if (r.responseText === "Message Sent successfully") {
                    document.querySelectorAll('.quote-input').forEach(input => input.innerText = '');
                    showToast('Offerte aanvraag succesvol verzonden!', 'success');
                } else {
                    showToast(r.responseText || 'Er is een fout opgetreden.', 'error');
                }
            }

            // Reset button
            if (submitBtn) {
                submitBtn.style.pointerEvents = 'auto';
                submitBtn.style.opacity = '1';
                submitBtn.innerText = 'Verzoek Verzenden';
            }
        }
    };

    r.onerror = function() {
        showToast('Verbindingsfout. Controleer uw internetverbinding.', 'error');
        if (submitBtn) {
            submitBtn.style.pointerEvents = 'auto';
            submitBtn.style.opacity = '1';
            submitBtn.innerText = 'Verzoek Verzenden';
        }
    };

    r.open("POST", "mail/sendEmailProcess.php", true);
    r.send(f);
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Submit button click
    const submitBtn = document.getElementById('quoteSubmitBtn');
    if (submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            e.preventDefault();
            sendQuote();
        });
    }

    // Phone field max 16 chars
    const phoneField = document.querySelector('.quote-left + .quote-right .quote-row:nth-child(2) .quote-field:nth-child(1) .quote-input');
    if (phoneField) {
        phoneField.addEventListener('input', function () {
            if (this.innerText.length > 16) {
                this.innerText = this.innerText.slice(0, 16);
                const range = document.createRange();
                const sel = window.getSelection();
                range.selectNodeContents(this);
                range.collapse(false);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        });
    }

    // Placeholder handling for contenteditable divs
    document.querySelectorAll('.quote-input[contenteditable="true"]').forEach(div => {
        const placeholder = div.getAttribute('data-placeholder');
        
        if (placeholder) {
            if (div.innerText.trim() === '') {
                div.innerText = placeholder;
                div.style.color = '#999';
                div.style.fontStyle = 'italic';
            }

            div.addEventListener('focus', function() {
                if (this.innerText === placeholder) {
                    this.innerText = '';
                    this.style.color = '';
                    this.style.fontStyle = '';
                }
            });

            div.addEventListener('blur', function() {
                if (this.innerText.trim() === '') {
                    this.innerText = placeholder;
                    this.style.color = '#999';
                    this.style.fontStyle = 'italic';
                }
            });
        }
    });
});