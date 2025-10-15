<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta name="captcha-sitekey" content="{{ config('captcha.sitekey') }}">
    <title>@yield('title', 'Our Smart Community')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- Page-specific CSS (optional) --}}
    @stack('styles')

    {{-- reCAPTCHA v3 --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.sitekey') }}"></script>
</head>
<body class="bg-gradient min-h-screen flex flex-col">

{{-- Header (shared) --}}
<header class="w-full glass py-2 shadow-sm sticky top-0 z-40">
    <div class="mx-auto max-w-5xl px-4 flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/osc-logo.svg') }}" alt="OSC Logo" class="h-10 w-auto">
        </a>
        <nav class="hidden sm:flex gap-4 text-sm">
            @auth
                <a href="{{ url('/dashboard') }}" class="footer-link text-[#565656]/85">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="footer-link text-[#565656]/85 mt-2">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="footer-link text-[#565656]/85 mt-2">Register</a>
                @endif
            @endauth
        </nav>
    </div>
</header>

{{-- Main content from child views --}}
<main class="flex-1 flex flex-col items-center justify-center px-4">
    @yield('content')
</main>

{{-- Footer (shared) --}}
<footer class="mt-auto w-full glass py-4">
    <div class="mx-auto max-w-5xl px-4 flex flex-col sm:flex-row items-center sm:items-start justify-between gap-4 sm:gap-6 text-sm">
        <p class="inline-flex items-center gap-2 text-[#565656]/90 whitespace-nowrap">
            <a href="https://safetynetaccess.com/" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('images/sna-logo.svg') }}" alt="OSC Logo" class="h-5 w-auto" decoding="async">
            </a>
            &copy; {{ date('Y') }} OSC - Comprehensive Network Solution
        </p>

        <p class="flex-1 text-[0.65rem] text-[#565656]/60 text-center leading-snug mt-1">
            Protected by Google reCAPTCHA.&nbsp;
            <a href="https://policies.google.com/privacy" target="_blank" class="underline hover:text-[#8a2334]">Privacy</a> &amp;
            <a href="https://policies.google.com/terms" target="_blank" class="underline hover:text-[#8a2334]">Terms</a>
            apply.
        </p>

        <nav class="flex items-center gap-4 whitespace-nowrap">
            <span class="footer-link text-[#565656]/85" data-modal="privacyModal" tabindex="0">Privacy</span>
            <span class="footer-link text-[#565656]/85" data-modal="termsModal" tabindex="0">Terms</span>
            <a href="#" class="footer-link text-[#565656]/85">Support</a>
        </nav>
    </div>
</footer>

{{-- Shared Modals (optional; available to all auth pages) --}}
<div id="privacyModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="privacyTitle">
    <div class="modal-content glass">
        <span class="modal-close" aria-label="Close">&times;</span>
        <h2 id="privacyTitle">Privacy Policy</h2>
        <p class="text-sm text-[#565656]">
            Here you can include your privacy policy details — how data is collected, used, and protected.
        </p>
    </div>
</div>

<div id="termsModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="termsTitle">
    <div class="modal-content glass">
        <span class="modal-close" aria-label="Close">&times;</span>
        <h2 id="termsTitle">Terms &amp; Conditions</h2>
        <p class="text-sm text-[#565656]">
            Here you can include your terms and conditions — rules for using the service and legal disclaimers.
        </p>
    </div>
</div>

{{-- Page-specific scripts (optional) --}}
@stack('scripts')
</body>
</html>
