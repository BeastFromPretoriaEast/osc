<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Our Smart Community - Login</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- Load Google reCAPTCHA v3 --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.sitekey') }}"></script>

    <style>
        /* Glass utilities */
        .glass {
            background: rgba(255,255,255,0.6);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(86,86,86,0.12);
            box-shadow: 0 10px 25px rgba(0,0,0,0.06),
            inset 0 1px 0 rgba(255,255,255,0.35);
        }
        .glass-deep {
            background: rgba(255,255,255,0.72);
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
        }

        /* Background gradient */
        .bg-gradient {
            background:
                repeating-radial-gradient(circle at 15% 90%, #fbfbfb, #fefefe 320px),
                linear-gradient(
                    180deg,
                    #fcfcfc 0%,
                    #f2f2f2 30%,
                    #ededed 70%,
                    #f7f7f7 100%
                );
        }

        /* Input icon box */
        .icon-box {
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 0.75rem;
            border-top-left-radius: 0.75rem;
            border-bottom-left-radius: 0.75rem;
            border: 1px solid rgba(86,86,86,0.3);
            border-right: none;
            color: #565656;
        }
        .icon-box.at-symbol { font-weight: 500; font-size: 1rem; }
        .input-with-icon { display: flex; align-items: stretch; width: 100%; }
        .input-with-icon input {
            flex: 1;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
        }

        /* Footer link animation */
        .footer-link { position: relative; transition: all 0.2s ease; cursor: pointer; }
        .footer-link:hover { color: #8a2334; transform: translateY(-2px); }

        /* Modal styles + animations */
        .modal {
            display: flex; position: fixed; inset: 0; z-index: 50;
            background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);
            align-items: center; justify-content: center; padding: 1rem;
            opacity: 0; pointer-events: none; transition: opacity 0.3s ease;
        }
        .modal.active { opacity: 1; pointer-events: auto; }
        .modal-content {
            max-width: 1000px; width: 100%; background: rgba(255,255,255,0.95);
            border-radius: 1rem; padding: 2rem; box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            position: relative; transform: translateY(-30px); opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .modal.active .modal-content { transform: translateY(0); opacity: 1; }
        .modal.closing .modal-content { transform: translateY(-20px); opacity: 0; }
        .modal-content h2 { color: #8a2334; font-size: 1.5rem; margin-bottom: 1rem; }
        .modal-close { position: absolute; top: .75rem; right: .75rem; font-size: 1.25rem; color: #565656; cursor: pointer; transition: color .2s; }
        .modal-close:hover { color: #8a2334; }

        /* SIGN-IN BUTTON: animated gradient + shine */
        .btn-animated {
            position: relative; overflow: hidden; color: #fff;
            background-image: linear-gradient(90deg, #8a2334, #701b29);
            background-size: 200% 100%;
            animation: btnShift 4s ease-in-out infinite;
        }
        @keyframes btnShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .btn-animated::before {
            content: ""; position: absolute; top: 0; left: -75%;
            width: 50%; height: 100%;
            background: linear-gradient(120deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.25) 50%, rgba(255,255,255,0) 100%);
            transform: skewX(-25deg);
        }
        .btn-animated:hover::before { animation: shine 1s ease; }
        @keyframes shine { from { left: -75%; } to { left: 125%; } }

        /* Checkbox: red + happy bounce */
        input[type="checkbox"] {
            appearance: none; width: 1rem; height: 1rem; border: 1px solid #565656;
            border-radius: 0.25rem; display: grid; place-content: center; cursor: pointer;
            background-color: white; box-sizing: border-box; position: relative;
        }
        input[type="checkbox"]:checked { background-color: #8a2334; border-color: #8a2334; }
        input[type="checkbox"]::before {
            content: ""; width: 0.5rem; height: 0.5rem; transform: scale(0);
            transition: transform 0.2s ease-in-out; background-color: white;
            clip-path: polygon(14% 44%, 0% 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
        }
        input[type="checkbox"]:checked::before { transform: scale(1); animation: happyBounce 0.3s ease; }
        @keyframes happyBounce { 0% { transform: scale(0.8); } 50% { transform: scale(1.2); } 100% { transform: scale(1); } }

        /* Hide reCAPTCHA v3 badge (keep disclosure visible in footer) */
        .grecaptcha-badge { visibility: hidden !important; }

        /* Focus-visible for accessibility */
        a:focus-visible, .footer-link:focus-visible, button:focus-visible {
            outline: 2px solid #8a2334;
            outline-offset: 2px;
            border-radius: .25rem;
        }

        /* Respect reduced motion preferences */
        @media (prefers-reduced-motion: reduce) {
            .btn-animated { animation: none; }
            .btn-animated:hover::before { animation: none; }
            .modal, .modal-content { transition: none !important; }
        }
    </style>
</head>
<body class="bg-gradient min-h-screen flex flex-col">

<!-- Header -->
<header class="w-full glass py-2 shadow-sm sticky top-0 z-40">
    <div class="mx-auto max-w-5xl px-4 flex items-center justify-between">
        <!-- Left: Logo -->
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/osc-logo.svg') }}" alt="OSC Logo" class="h-10 w-auto">
        </a>

        <!-- Right: Optional link(s) -->
        <nav class="hidden sm:flex gap-4 text-sm">
            <a href="#" class="text-[#565656]/85 hover:text-[#8a2334] transition">Help</a>
            <a href="#" class="text-[#565656]/85 hover:text-[#8a2334] transition">Contact</a>
        </nav>
    </div>
</header>

<!-- Main -->
<main class="flex-1 flex flex-col items-center justify-center px-4">
    <!-- Login card -->
    <div class="relative w-full max-w-md glass glass-deep rounded-2xl p-1">
        <div class="rounded-2xl p-8 border border-[#8a2334]/20">
            <!-- Header -->
            <div class="text-center mb-4">
                <h1 class="text-3xl font-bold text-[#8a2334] tracking-tight">Welcome back</h1>
                <p class="text-sm text-[#565656]/80 mt-1">Sign in to continue</p>
            </div>

            <!-- Form -->
            <form id="login-form" method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-[#565656]">Email</label>
                    <div class="input-with-icon mt-1">
                        <span class="icon-box at-symbol">@</span>
                        <input id="email" type="email" name="email" required autofocus
                               autocomplete="username" inputmode="email" value="{{ old('email') }}"
                               class="block w-full rounded-xl border border-[#565656]/30 bg-white/70 px-3 py-2 shadow-sm
              focus:border-[#8a2334] focus:ring focus:ring-[#8a2334]/20 transition
              placeholder-[#dcdcdc]"
                               placeholder="Email Address..." autocapitalize="none" spellcheck="false" />

                    </div>
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-[#565656]">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-[#8a2334] hover:underline">Forgot?</a>
                        @endif
                    </div>
                    <div class="input-with-icon mt-1 relative">
                        <span class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#565656]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M12 15v2m-6-6v6a2 2 0 002 2h8a2 2 0 002-2v-6m-2-4a4 4 0 00-8 0v4h8v-4z"/>
                            </svg>
                        </span>
                        <input id="password" type="password" name="password" required
                               autocomplete="current-password"
                               class="block w-full rounded-xl border border-[#565656]/30 bg-white/70 pr-12 px-3 py-2 shadow-sm
                                      focus:border-[#8a2334] focus:ring focus:ring-[#8a2334]/20 transition placeholder-[#dcdcdc]" placeholder="Password..." />
                        <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-2 my-auto h-8 px-2 rounded-md text-[#565656] hover:text-[#8a2334] text-sm"
                                aria-label="Show password">Show</button>
                    </div>
                    @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember me -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center gap-2 select-none">
                        <input type="checkbox" name="remember">
                        <span class="text-sm text-[#565656]">Remember me</span>
                    </label>
                </div>

                <!-- Hidden reCAPTCHA response -->
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                <!-- Submit -->
                <button type="submit"
                        class="btn-animated w-full py-2.5 px-4 rounded-xl font-semibold text-white shadow
                               active:scale-[0.99] transition">
                    Sign in
                </button>

                @error('g-recaptcha-response')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </form>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="mt-auto w-full glass py-4">
    <div class="mx-auto max-w-5xl px-4 flex flex-col sm:flex-row items-center sm:items-start justify-between gap-4 sm:gap-6 text-sm">
        <!-- Left -->
        <p class="inline-flex items-center gap-2 text-[#565656]/90 whitespace-nowrap">
            <a href="https://safetynetaccess.com/" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('images/sna-logo.svg') }}" alt="OSC Logo" class="h-5 w-auto" decoding="async">
            </a>
            &copy; {{ date('Y') }} OSC - Comprehensive Network Solution
        </p>

        <!-- Center (Google Disclosure) -->
        <p class="flex-1 text-[0.65rem] text-[#565656]/60 text-center leading-snug mt-1">
            Protected by Google reCAPTCHA.&nbsp;
            <a href="https://policies.google.com/privacy" target="_blank" class="underline hover:text-[#8a2334]">Privacy</a> &amp;
            <a href="https://policies.google.com/terms" target="_blank" class="underline hover:text-[#8a2334]">Terms</a>
            apply.
        </p>

        <!-- Right -->
        <nav class="flex items-center gap-4 whitespace-nowrap">
            <span class="footer-link text-[#565656]/85" data-modal="privacyModal" tabindex="0">Privacy</span>
            <span class="footer-link text-[#565656]/85" data-modal="termsModal" tabindex="0">Terms</span>
            <a href="#" class="footer-link text-[#565656]/85">Support</a>
        </nav>
    </div>
</footer>

<!-- Privacy Modal -->
<div id="privacyModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="privacyTitle">
    <div class="modal-content glass">
        <span class="modal-close" aria-label="Close">&times;</span>
        <h2 id="privacyTitle">Privacy Policy</h2>
        <p class="text-sm text-[#565656]">
            Here you can include your privacy policy details — how data is collected, used, and protected.
        </p>
    </div>
</div>

<!-- Terms Modal -->
<div id="termsModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="termsTitle">
    <div class="modal-content glass">
        <span class="modal-close" aria-label="Close">&times;</span>
        <h2 id="termsTitle">Terms &amp; Conditions</h2>
        <p class="text-sm text-[#565656]">
            Here you can include your terms and conditions — rules for using the service and legal disclaimers.
        </p>
    </div>
</div>

<!-- Scripts -->
<script>
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
        const siteKey = "{{ config('captcha.sitekey') }}";
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
</script>
</body>
</html>
