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

