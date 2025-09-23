// Password toggle
(function () {
    const input = document.getElementById('password');
    const btn = document.getElementById('togglePassword');
    if (!input || !btn) return;
    btn.addEventListener('click', () => {
        const isPw = input.type === 'password';
        input.type = isPw ? 'text' : 'password';
        btn.textContent = isPw ? 'Hide' : 'Show';
        btn.setAttribute('aria-label', isPw ? 'Hide password' : 'Show password');
    });
})();

// Modal logic (click + keyboard)
document.querySelectorAll('.footer-link[data-modal]').forEach(link => {
    link.addEventListener('click', () => {
        const modalId = link.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        modal.classList.add('active');
    });
    link.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            link.click();
        }
    });
});

document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', e => {
        if (e.target.classList.contains('modal') || e.target.classList.contains('modal-close')) {
            modal.classList.add('closing');
            setTimeout(() => {
                modal.classList.remove('active', 'closing');
            }, 300);
        }
    });

    // Close on ESC
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            modal.classList.add('closing');
            setTimeout(() => {
                modal.classList.remove('active', 'closing');
            }, 300);
        }
    });
});

// reCAPTCHA v3
(function () {
    const form = document.getElementById('login-form');
    const siteKey = document.querySelector('meta[name="captcha-sitekey"]')?.content;
    if (!form || !siteKey) return;
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute(siteKey, { action: 'login' }).then(function (token) {
                document.getElementById('g-recaptcha-response').value = token;
                form.submit();
            });
        });
    });
})();
