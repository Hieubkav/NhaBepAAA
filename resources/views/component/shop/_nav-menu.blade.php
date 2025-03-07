{{-- Desktop Menu --}}
<div class="hidden md:flex items-center space-x-8">
    {{-- Trang Chủ --}}
    <a href="/"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('/') ? 'text-furniture' : '' }}">
        Trang Chủ
    </a>

    {{-- Sản Phẩm --}}
    <a href="/products"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('products*') ? 'text-furniture' : '' }}">
        Sản Phẩm
    </a>

    {{-- Danh Mục Dropdown --}}
    <div class="relative" x-data="{ isOpen: false }" @click.away="isOpen = false">
        <button class="text-gray-dark hover:text-furniture font-medium transition-colors flex items-center" @click="isOpen = !isOpen">
            Danh Mục
            <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50"
             x-show="isOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95">
            <a href="#" class="block px-4 py-2 text-gray-dark hover:bg-furniture hover:text-white transition-colors">Tủ Bếp</a>
            <a href="#" class="block px-4 py-2 text-gray-dark hover:bg-furniture hover:text-white transition-colors">Kệ Bếp</a>

            {{-- Phụ Kiện với Submenu --}}
            <div class="relative" @click.stop>
                <a href="#" class="block px-4 py-2 text-gray-dark hover:bg-furniture hover:text-white transition-colors">
                    Phụ Kiện
                </a>
            </div>
        </div>
    </div>

    {{-- Giới Thiệu --}}
    <a href="/about"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('about') ? 'text-furniture' : '' }}">
        Giới Thiệu
    </a>

    {{-- Liên Hệ --}}
    <a href="/contact"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('contact') ? 'text-furniture' : '' }}">
        Liên Hệ
    </a>
</div>

{{-- Mobile Menu --}}
<div class="md:hidden" x-show="mobileMenuOpen" x-transition>
    <div class="p-4 space-y-2">
        <div class="mb-6">
            <a href="/" class="flex items-center space-x-3 mb-8">
                <img src="{{ asset('images/logo.webp') }}" alt="AAA Logo" class="h-12">
                <span class="font-heading font-bold text-2xl text-furniture">AAA</span>
            </a>
            <div class="h-px bg-gray-200"></div>
        </div>

        <a href="/"
           class="block px-3 py-2 text-gray-dark hover:bg-furniture hover:text-white rounded-md transition-colors {{ request()->is('/') ? 'bg-furniture text-white' : '' }}">
            Trang Chủ
        </a>
        <a href="/products"
           class="block px-3 py-2 text-gray-dark hover:bg-furniture hover:text-white rounded-md transition-colors {{ request()->is('products*') ? 'bg-furniture text-white' : '' }}">
            Sản Phẩm
        </a>

        {{-- Mobile Danh Mục với Menu Cấp 2 --}}
        <div x-data="{ openCategory: false, openAccessories: false }">
            <button @click="openCategory = !openCategory"
                    class="flex items-center w-full px-3 py-2 text-gray-dark hover:bg-furniture hover:text-white rounded-md transition-colors">
                <span>Danh Mục</span>
                <svg class="w-4 h-4 ml-1 transition-transform" :class="{ 'rotate-180': openCategory }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div class="pl-6 space-y-1" x-show="openCategory" x-transition>
                <a href="#" class="block px-3 py-2 text-gray hover:text-furniture transition-colors">Tủ Bếp</a>
                <a href="#" class="block px-3 py-2 text-gray hover:text-furniture transition-colors">Kệ Bếp</a>
                <div class="space-y-1">
                    <a href="#" class="block px-3 py-2 text-gray hover:text-furniture transition-colors">Phụ Kiện</a>
                    <div class="pl-6">
                        <a href="#" class="block px-3 py-2 text-gray hover:text-furniture transition-colors">Bồn Rửa Chén</a>
                        <a href="#" class="block px-3 py-2 text-gray hover:text-furniture transition-colors">Máy Hút Mùi</a>
                        <a href="#" class="block px-3 py-2 text-gray hover:text-furniture transition-colors">Bếp Điện Từ</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="/about"
           class="block px-3 py-2 text-gray-dark hover:bg-furniture hover:text-white rounded-md transition-colors {{ request()->is('about') ? 'bg-furniture text-white' : '' }}">
            Giới Thiệu
        </a>
        <a href="/contact"
           class="block px-3 py-2 text-gray-dark hover:bg-furniture hover:text-white rounded-md transition-colors {{ request()->is('contact') ? 'bg-furniture text-white' : '' }}">
            Liên Hệ
        </a>
    </div>
</div>
