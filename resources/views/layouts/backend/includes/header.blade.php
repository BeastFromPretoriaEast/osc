{{-- ===== Fixed Header ===== --}}
<header class="fixed inset-x-0 top-0 z-40 border-b border-neutral-200 bg-white">
    <div class="h-16 w-full px-4 sm:px-6 lg:px-7 flex items-center gap-4">
        <button class="lg:hidden rounded-xl border border-neutral-200 px-3 py-2 text-sm"
                @click="mobileNav = true">
            Menu
        </button>

        <a href="#" class="flex items-center gap-3">
            <img src="{{ asset('images/osc-logo.svg') }}" alt="Logo" class="h-9 w-auto max-w-none">
        </a>

        <nav class="hidden md:flex items-center gap-6 text-sm ml-6">
            @yield('topnav')
        </nav>

        <div class="ml-auto flex items-center gap-3">
            {{--<input type="search" placeholder="Search…"
                   class="w-64 rounded-xl border border-neutral-200 bg-neutral-50 px-3 py-2 text-sm
                              focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#8a2334]/30">--}}
            <a href="#" class="rounded-xl border border-neutral-200 px-3 py-2 text-sm hover:bg-neutral-100">Settings</a>
        </div>
    </div>
    <div class="h-[1px] w-full bg-gradient-to-r from-[#8a2334] via-fuchsia-500/70 to-sky-500/70 opacity-80"></div>
</header>
