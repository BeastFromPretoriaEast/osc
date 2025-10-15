<!DOCTYPE html>
<html lang="en" x-data="{ mobileNav:false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'OSC-Markus')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased bg-neutral-50 text-neutral-800">

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
            <input type="search" placeholder="Search…"
                   class="w-64 rounded-xl border border-neutral-200 bg-neutral-50 px-3 py-2 text-sm
                              focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#8a2334]/30">
            <a href="#" class="rounded-xl border border-neutral-200 px-3 py-2 text-sm hover:bg-neutral-100">Profile</a>
        </div>
    </div>
    <div class="h-[1px] w-full bg-gradient-to-r from-[#8a2334] via-fuchsia-500/70 to-sky-500/70 opacity-80"></div>
</header>

{{-- ===== Fixed Sidebar (Desktop) ===== --}}
<aside class="hidden lg:block fixed left-0 top-16 bottom-0 w-[12.8rem] border-r border-neutral-200 bg-white z-30 overflow-y-auto">
    <div class="p-3">
        @php
            $nav = [
                ['label'=>'Dashboard','icon'=>'M3 6h18M3 12h18M3 18h18'],
                ['label'=>'Tenants','icon'=>'M4 6h16v12H4z'],
                ['label'=>'Subscriptions','icon'=>'M3 7h18M3 12h18M3 17h18'],
                ['label'=>'Support','icon'=>'M18 10c0 3.866-3.582 7-8 7H5l-2 2V5a2 2 0 012-2h10a3 3 0 013 3'],
                ['label'=>'Reports','icon'=>'M4 19h16M4 4h16v10H4z'],
            ];
        @endphp

        <ul class="space-y-1">
            @foreach ($nav as $item)
                <li>
                    <a href="#"
                       class="group relative flex items-center gap-3 rounded-xl px-3 py-2 text-sm hover:bg-neutral-100">
                        <span class="absolute left-0 top-1/2 -translate-y-1/2 h-5 w-[3px] rounded-full bg-[#8a2334] opacity-0 group-hover:opacity-40"></span>
                        <svg viewBox="0 0 24 24" class="h-5 w-5 stroke-current text-neutral-600"
                             fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="{{ $item['icon'] }}" />
                        </svg>
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="mt-4 rounded-2xl border border-neutral-200 bg-white p-4">
            <div class="text-xs uppercase tracking-wide text-neutral-500 mb-2">Shortcuts</div>
            <a href="#" class="block rounded-lg px-3 py-2 text-sm hover:bg-neutral-100">Open Tickets</a>
            <a href="#" class="block rounded-lg px-3 py-2 text-sm hover:bg-neutral-100">Monthly Report</a>
        </div>
    </div>
</aside>

{{-- ===== Mobile Drawer ===== --}}
<div class="lg:hidden" x-show="mobileNav" x-transition.opacity>
    <div class="fixed inset-0 bg-black/40 z-40" @click="mobileNav=false"></div>
    <div class="fixed inset-y-0 left-0 w-72 bg-white border-r border-neutral-200 z-50 p-3 overflow-y-auto"
         x-transition:enter="transition transform ease-out duration-200"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform ease-in duration-150"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full">
        <div class="flex items-center justify-between h-12">
            <span class="font-bold">Navigation</span>
            <button class="rounded-lg border border-neutral-200 px-2 py-1 text-sm" @click="mobileNav=false">Close</button>
        </div>
        <ul class="space-y-1 mt-2">
            @foreach($nav as $item)
                <li>
                    <a href="#"
                       class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm hover:bg-neutral-100"
                       @click="mobileNav=false">
                        <svg viewBox="0 0 24 24" class="h-5 w-5 stroke-current text-neutral-600"
                             fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="{{ $item['icon'] }}" />
                        </svg>
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- ===== Page Wrapper: offsets for header + sidebar, controls page height ===== --}}
<div class="pt-16 lg:pl-[12.8rem] min-h-screen flex flex-col">
    {{-- Main content (padded) --}}
    <main class="flex-1 flex flex-col px-4 sm:px-6 lg:px-8 py-8 relative
    before:content-[''] before:absolute before:inset-x-0 before:top-0 before:h-3 before:bg-gradient-to-b before:from-black/5 before:to-transparent
    after:content-[''] after:absolute after:inset-x-0 after:bottom-0 after:h-3 after:bg-gradient-to-t after:from-black/5 after:to-transparent">

        {{-- Left gradient edge --}}
        <div class="absolute top-0 left-0 bottom-0 w-3 bg-gradient-to-r from-black/5 to-transparent pointer-events-none"></div>

        {{-- Right gradient edge --}}
        <div class="absolute top-0 right-0 bottom-0 w-3 bg-gradient-to-l from-black/5 to-transparent pointer-events-none"></div>

        {{-- Main content --}}
        <div class="relative z-10">
            {{-- Top row --}}
            <div class="flex flex-wrap items-center justify-between gap-3 mb-1">
                <nav class="text-sm text-neutral-500">@yield('breadcrumbs')</nav>
                <div class="flex items-center gap-2">@yield('header-actions')</div>
            </div>

            {{-- Main card --}}
            <div class="relative mb-8">
                <div class="pointer-events-none absolute -inset-x-2 -top-4 h-24 opacity-[0.45] blur-2xl">
                    <div class="h-full w-full bg-gradient-to-r from-[#8a2334]/30 via-fuchsia-500/20 to-sky-500/20"></div>
                </div>
                <div class="relative rounded-3xl border border-neutral-200 bg-white/90 p-8 md:p-12 shadow-[0_10px_30px_rgba(2,6,23,0.06)] backdrop-blur-sm">
                    @yield('content')
                </div>
            </div>

            {{-- Secondary row --}}
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="rounded-2xl border border-neutral-200 bg-white p-6">@yield('secondary-left')</div>
                <div class="rounded-2xl border border-neutral-200 bg-white p-6">@yield('secondary-right')</div>
            </div>
        </div>
    </main>

    {{-- ===== Footer (full-width of page wrapper, no gaps) ===== --}}
    <footer class="border-t border-neutral-200 bg-[ghostwhite]">
        <div class="h-14 w-full px-4 sm:px-6 lg:px-8 flex items-center justify-between text-sm text-[#565656]">
            <small>© {{ now()->year }} Our Smart Community</small>
            <span class="hidden sm:inline">
                <a href="#" class="flex items-center gap-3">
                    <img src="{{ asset('images/sna-logo.svg') }}" alt="Logo" class="h-7 w-auto max-w-none">
                </a>
            </span>
        </div>
    </footer>
</div>

</body>
</html>
