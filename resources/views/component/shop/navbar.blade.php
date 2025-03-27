<div x-data="{ searchOpen: false }">
    <nav class="bg-gradient-to-b from-gray-100/95 via-gray-50/90 to-red-50/85 backdrop-blur shadow-lg fixed top-0 w-full z-[100] transition-transform duration-300 border-b border-red-100/20"
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
                <a href="{{route('storeFront')}}" class="flex items-center space-x-3 transition-transform duration-300 hover:scale-[0.98]">
                    <img src="{{config('app.asset_url')}}/storage/{{ $settings->logo }}" alt="AAA Logo" class="h-20">
                </a>

                {{-- Main Navigation Menu --}}
                <x-main-menu  />

                {{-- Actions --}}
                <div class="flex items-center space-x-6">
                    {{-- Search --}}
                    <button class="text-gray-600 hover:text-gray-900 transition-colors" @click="searchOpen = true">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Search Overlay --}}
        <div x-show="searchOpen"
             x-cloak
             @keydown.escape.window="searchOpen = false"
             class="fixed inset-0 z-[70]"
             :class="{ 'hidden': !searchOpen }">
            {{-- Backdrop --}}
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"
                 x-show="searchOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="searchOpen = false">
            </div>
            
            {{-- Modal --}}
            <div class="relative min-h-screen flex items-start justify-center p-4">
                <div class="bg-white/95 backdrop-blur w-full max-w-2xl rounded-xl shadow-2xl p-6 mt-32 relative transform transition-all duration-300"
                     x-show="searchOpen"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    
                    <livewire:search-products />
                    
                    <button @click="searchOpen = false" 
                            class="absolute -top-12 right-0 text-white/80 hover:text-white transition-colors p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    {{-- Drawer Menu Component --}}
    <x-drawer-menu  />

    {{-- Spacer để tránh content bị che bởi fixed navbar --}}
    <div class="h-20 w-full"></div>
</div>
