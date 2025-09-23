@extends('layouts.auth')

@section('title', 'Our Smart Community - Login')

@section('content')
    <div class="relative w-full max-w-md glass glass-deep rounded-2xl p-1">
        <div class="rounded-2xl p-8 border border-[#8a2334]/20">
            <div class="text-center mb-4">
                <h1 class="text-3xl font-bold text-[#8a2334] tracking-tight pb-2">Forgot your password?</h1>
                <p class="text-sm text-[#565656]/80 mt-1">
                    No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </p>
            </div>

            <form id="login-form" method="POST" action="{{ route('password.email') }}" class="space-y-7">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-[#565656]">
                        Email <span class="text-xs text-[#565656]/60 mt-1">(To send password reset link to)</span>
                    </label>
                    <div class="input-with-icon mt-1">
                        <span class="icon-box at-symbol">@</span>
                        <input id="email" type="email" name="email" required autofocus autocomplete="username" inputmode="email" value="{{ old('email') }}" placeholder="Email Address..." autocapitalize="none" spellcheck="false"
                               class="block w-full rounded-xl border border-[#565656]/30 bg-white/70 px-3 py-2 shadow-sm focus:border-[#8a2334] focus:ring focus:ring-[#8a2334]/20 transition placeholder-[#dcdcdc]"
                        />
                    </div>
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                <button type="submit" class="btn-animated w-full py-2.5 px-4 mt-6 rounded-xl font-semibold text-white shadow active:scale-[0.99] transition">
                    Send Reset Link
                </button>

                @error('g-recaptcha-response')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Page-specific JS via Vite --}}
    @vite(['resources/js/auth/login.js'])
@endpush
