<div>
    <nav class="bg-white/95 shadow-lg fixed top-0 w-full z-[100] transition-transform duration-300 border-b border-gray-200/50"
        id="navbar">
        <script>
            // Xử lý ẩn hiện navbar khi scroll
            let lastScrollTop = 0;
            window.addEventListener('scroll', function() {
                let navbar = document.getElementById('navbar');
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scroll xuống và không ở top
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    // Scroll lên hoặc ở top
                    navbar.style.transform = 'translateY(0)';
                }
                lastScrollTop = scrollTop;
            });
        </script>

        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                {{-- Logo --}}
                <a href="{{route('storeFront')}}" class="flex items-center space-x-3">
                    <img src="{{config('app.asset_url')}}/storage/{{ $settings->logo }}" alt="AAA Logo" class="h-20">
                </a>

                {{-- Main Navigation Menu --}}
                <x-main-menu  />

                {{-- Actions --}}
                <div class="flex items-center space-x-6">
                    {{-- Search --}}
                    <button class="text-gray-dark hover:text-furniture transition-colors" @click="$dispatch('toggle-search')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>

                    {{-- Mobile Menu Button --}}
                    <button class="md:hidden text-gray-dark hover:text-furniture transition-colors"
                            data-drawer-target="drawer-navigation"
                            data-drawer-show="drawer-navigation"
                            aria-controls="drawer-navigation"
                            data-drawer-backdrop="false"
                            type="button">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Search Overlay --}}
        <div x-data="{ open: false }"
             x-show="open"
             @toggle-search.window="open = !open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-dark bg-opacity-50 z-[70] hidden"
             :class="{ 'hidden': !open }">
            <div class="container mx-auto px-4 py-20">
                <div class="bg-white rounded-lg shadow-xl p-6 max-w-2xl mx-auto">
                    <div class="flex items-center">
                        <input type="text"
                               placeholder="Tìm kiếm sản phẩm..."
                               class="flex-1 border-0 focus:ring-0 text-lg"
                               x-ref="searchInput"
                               @keydown.escape="open = false">
                        <button @click="open = false" class="text-gray hover:text-furniture transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- Drawer Menu Component --}}
    <x-drawer-menu  />

    {{-- Spacer để tránh content bị che bởi fixed navbar --}}
    <div class="h-20 w-full"></div>
</div>
