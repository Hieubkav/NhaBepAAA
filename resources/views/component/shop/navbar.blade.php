<div>
    <nav class="bg-white/95  shadow-lg fixed top-0 w-full z-[100] transition-transform duration-300 border-b border-gray-200/50"
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
                    <img src="{{ asset('images/logo.webp') }}" alt="AAA Logo" class="h-20">
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

        {{-- Mobile Menu Drawer (Left Side) --}}
        <div id="drawer-navigation"
             class="fixed top-0 left-0 z-[110] h-screen p-4 overflow-y-auto transition-transform duration-300 ease-in-out -translate-x-full bg-white w-80 shadow-2xl border-r border-gray-200"
             tabindex="-1"
             aria-labelledby="drawer-navigation-label"
             data-drawer-placement="left">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <a href="{{route('storeFront')}}" class="flex items-center space-x-3">
                            <img src="{{ asset('images/logo.webp') }}" alt="AAA Logo" class="h-12">
                        </a>
                    </div>
                    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex items-center justify-center"
                            data-drawer-close>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="sr-only">Đóng menu</span>
                    </button>
                </div>
                <div class="h-px bg-gray-200 mb-6"></div>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{route('storeFront')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('/') ? 'bg-furniture text-white hover:bg-furniture' : '' }}">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="ms-3">Trang Chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('catFilter')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('products*') ? 'bg-furniture text-white hover:bg-furniture' : '' }}">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <span class="ms-3">Sản Phẩm</span>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-categories" data-collapse-toggle="dropdown-categories">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Danh Mục</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <ul id="dropdown-categories" class="hidden py-2 space-y-2">
                            @foreach($cats as $cat)
                                <li>
                                    <a href="{{ route('catFilter', ['cat_id' => $cat->id]) }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ request()->query('cat_id') == $cat->id ? 'text-furniture' : '' }}">
                                        {{ $cat->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('catalog')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('catalog') ? 'bg-furniture text-white hover:bg-furniture' : '' }}">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span class="ms-3">Catalog</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('about')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('about') ? 'bg-furniture text-white hover:bg-furniture' : '' }}">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="ms-3">Giới Thiệu</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('contact') ? 'bg-furniture text-white hover:bg-furniture' : '' }}">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="ms-3">Liên Hệ</span>
                        </a>
                    </li>
                </ul>
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
    {{-- Spacer để tránh content bị che bởi fixed navbar --}}
    <div class="h-20 w-full"></div>
</div>
