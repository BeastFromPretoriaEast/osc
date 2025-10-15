<!DOCTYPE html>
<html lang="en" x-data="{ mobileNav:false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'OSC-Markus')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased bg-neutral-50 text-neutral-800">

    @include('layouts.backend.includes.header')
    @include('layouts.backend.includes.aside')

{{-- ===== Page Wrapper: offsets for header + sidebar, controls page height ===== --}}
<div class="pt-16 lg:pl-[12.8rem] min-h-screen flex flex-col">
    {{-- Main content (padded) --}}
    <div class="flex-1 flex flex-col px-4 sm:px-6 lg:px-8 py-8 relative before:content-[''] before:absolute before:inset-x-0 before:top-0 before:h-3 before:bg-gradient-to-b before:from-black/5 before:to-transparent after:content-[''] after:absolute after:inset-x-0 after:bottom-0 after:h-3 after:bg-gradient-to-t after:from-black/5 after:to-transparent">
        {{-- Left shadow edge --}}
        <div class="absolute top-0 left-0 bottom-0 w-3 bg-gradient-to-r from-black/5 to-transparent pointer-events-none"></div>
        {{-- Right shadow edge --}}
        <div class="absolute top-0 right-0 bottom-0 w-3 bg-gradient-to-l from-black/5 to-transparent pointer-events-none"></div>

        {{-- Main content --}}
        <main class="relative z-10">

            @yield('content')

            {{-- Main card --}}
            <div class="relative mb-8">
                <div class="pointer-events-none absolute -inset-x-2 -top-4 h-24 opacity-[0.45] blur-2xl">
                    <div class="h-full w-full bg-gradient-to-r from-[#8a2334]/30 via-fuchsia-500/20 to-sky-500/20"></div>
                </div>
                <div class="relative rounded-3xl border border-neutral-200 bg-white/90 p-8 md:p-5 shadow-[0_10px_30px_rgba(2,6,23,0.06)] backdrop-blur-sm">

                    <h1 class="text-lg">DashBoard</h1>
                    @yield('content')
                </div>
            </div>

            {{-- Secondary row --}}
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="rounded-2xl border border-neutral-200 bg-white p-6">@yield('secondary-left')</div>
                <div class="rounded-2xl border border-neutral-200 bg-white p-6">@yield('secondary-right')</div>
            </div>
        </main>

    </div>

    @include('layouts.backend.includes.footer')
</div>

</body>
</html>


