@extends('layouts.auth')

@section('title', 'Our Smart Community - Registration')

@section('content')
    <div class="relative w-full max-w-md glass glass-deep rounded-2xl p-1">
        <div class="rounded-2xl p-8 border border-[#8a2334]/20">
            <div class="text-center mb-4">
                <h1 class="text-3xl font-bold text-[#8a2334] tracking-tight">
                    Reset Password
                </h1>
                <p class="text-sm text-[#565656]/80 mt-1">
                    Please complete the form below
                </p>
            </div>

            <form id="login-form" method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-[#565656]">Email Address</label>
                    <div class="input-with-icon mt-1">
                        <span class="icon-box at-symbol">@</span>
                        <input id="email" type="text" name="email" value="{{ old('email') }}" placeholder="Email Address..."
                               class="block w-full rounded-xl border border-[#565656]/30 bg-white/70 px-3 py-2 shadow-sm focus:border-[#8a2334] focus:ring focus:ring-[#8a2334]/20 transition placeholder-[#dcdcdc]"
                        />
                    </div>
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium">Password</label>
                    </div>
                    <div class="input-with-icon mt-1 relative">
                        <span class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#565656]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6-6v6a2 2 0 002 2h8a2 2 0 002-2v-6m-2-4a4 4 0 00-8 0v4h8v-4z"></path>
                            </svg>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               placeholder="Password..."
                               class="block w-full rounded-xl border border-[#565656]/30 bg-white/70 pr-12 px-3 py-2 shadow-sm focus:border-[#8a2334] focus:ring focus:ring-[#8a2334]/20 transition placeholder-[#dcdcdc]" />
                        <button type="button"
                                class="toggle-password absolute inset-y-0 right-2 my-auto h-8 px-2 rounded-md hover:text-[#8a2334] text-sm"
                                aria-controls="password" aria-label="Show password">
                            Show
                        </button>
                    </div>
                    @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Confirm --}}
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password_confirm" class="block text-sm font-medium ">
                            Password Confirm
                        </label>
                    </div>
                    <div class="input-with-icon mt-1 relative">
                        <span class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#565656]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6-6v6a2 2 0 002 2h8a2 2 0 002-2v-6m-2-4a4 4 0 00-8 0v4h8v-4z"></path>
                            </svg>
                        </span>
                        <input id="passwordConfirm" type="password" name="password_confirm" required autocomplete="new-password"
                               placeholder="Password Confirm..."
                               class="block w-full rounded-xl border border-[#565656]/30 bg-white/70 pr-12 px-3 py-2 shadow-sm focus:border-[#8a2334] focus:ring focus:ring-[#8a2334]/20 transition placeholder-[#dcdcdc]" />
                        <button type="button"
                                class="toggle-password absolute inset-y-0 right-2 my-auto h-8 px-2 rounded-md hover:text-[#8a2334] text-sm"
                                aria-controls="passwordConfirm" aria-label="Show password">
                            Show
                        </button>
                    </div>
                    @error('password_confirm')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center gap-2 select-none">
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
