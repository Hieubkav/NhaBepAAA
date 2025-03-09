<nav class="bg-white shadow-lg relative" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            {{-- Logo --}}
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.webp') }}" alt="AAA Logo" class="h-12">
                <span class="font-heading font-bold text-2xl text-furniture">AAA</span>
            </a>

            {{-- Main Navigation Menu --}}
            @include('partials.navbar.menu')


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
                        @click="mobileMenuOpen = !mobileMenuOpen">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         :class="{ 'hidden': mobileMenuOpen }">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         :class="{ 'hidden': !mobileMenuOpen }">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Drawer (Left Side) --}}
    <div class="fixed top-0 left-0 w-80 h-full bg-white shadow-lg transform transition-transform duration-300 ease-in-out z-50 overflow-y-auto"
         :class="{ 'translate-x-0': mobileMenuOpen, '-translate-x-full': !mobileMenuOpen }">
        <div class="flex justify-end p-4">
            <button class="text-gray-dark hover:text-furniture transition-colors" @click="mobileMenuOpen = false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        @include('partials.navbar.menu', ['mobile' => true])
    </div>

    {{-- Overlay untuk click outside --}}
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40" x-show="mobileMenuOpen" @click="mobileMenuOpen = false"
         x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

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
         class="fixed inset-0 bg-gray-dark bg-opacity-50 z-50 hidden"
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
