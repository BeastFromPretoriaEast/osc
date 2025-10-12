<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>



@extends('layouts.auth')

@section('title', 'Our Smart Community - Login')

@section('content')
    <div class="relative w-full max-w-md glass glass-deep rounded-2xl p-1">
        <div class="rounded-2xl p-8 border border-[#8a2334]/20">
            <div class="text-center mb-4">
                <h1 class="text-3xl font-bold text-[#8a2334] tracking-tight">Welcome back</h1>
                <p class="text-sm text-[#565656]/80 mt-1">Sign in to continue</p>
            </div>

            <form id="login-form" method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-[#565656]">Email</label>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6-6v6a2 2 0 002 2h8a2 2 0 002-2v-6m-2-4a4 4 0 00-8 0v4h8v-4z"/>
                            </svg>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password..."
                               class="block w-full rounded-xl border border-[#565656]/30 bg-white/70 pr-12 px-3 py-2 shadow-sm focus:border-[#8a2334] focus:ring focus:ring-[#8a2334]/20 transition placeholder-[#dcdcdc]"
                        />
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-2 my-auto h-8 px-2 rounded-md text-[#565656] hover:text-[#8a2334] text-sm" aria-label="Show password">
                            Show
                        </button>
                    </div>
                    @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center gap-2 select-none">
                        <input type="checkbox" name="remember">
                        <span class="text-sm text-[#565656]">Remember me</span>
                    </label>
                </div>

                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                <button type="submit" class="btn-animated w-full py-2.5 px-4 rounded-xl font-semibold text-white shadow active:scale-[0.99] transition">
                    Sign in
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

