{{-- ===== Fixed Sidebar (Desktop) ===== --}}
<aside class="hidden lg:block fixed left-0 top-16 bottom-0 w-[12.8rem] border-r border-neutral-200 bg-white z-30 overflow-y-auto">
    <div class="p-3">
        @php
            $nav = [
                ['label'=>'Dashboard','icon'=>'M3 6h18M3 12h18M3 18h18'],
                ['label'=>'Sites','icon'=>'M4 6h16v12H4z'],
                ['label'=>'Products & Services','icon'=>'M4 6h16v12H4z'],
                ['label'=>'Bundles','icon'=>'M4 6h16v12H4z'],
                ['label'=>'Tenants','icon'=>'M4 6h16v12H4z'],
                ['label'=>'Subscriptions','icon'=>'M3 7h18M3 12h18M3 17h18'],
                ['label'=>'Support','icon'=>'M18 10c0 3.866-3.582 7-8 7H5l-2 2V5a2 2 0 012-2h10a3 3 0 013 3'],
                ['label'=>'Templates','icon'=>'M18 10c0 3.866-3.582 7-8 7H5l-2 2V5a2 2 0 012-2h10a3 3 0 013 3'],
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

        {{--
        <div class="mt-4 rounded-2xl border border-neutral-200 bg-white p-4">
            <div class="text-xs uppercase tracking-wide text-neutral-500 mb-2">Shortcuts</div>
            <a href="#" class="block rounded-lg px-3 py-2 text-sm hover:bg-neutral-100">Open Tickets</a>
            <a href="#" class="block rounded-lg px-3 py-2 text-sm hover:bg-neutral-100">Monthly Report</a>
        </div>
        --}}
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
