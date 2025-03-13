{{-- Desktop Menu --}}
<div class="hidden md:flex items-center space-x-8">
    {{-- Trang Chủ --}}
    <a href="{{route('storeFront')}}"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('/') ? 'text-furniture' : '' }}">
        Trang Chủ
    </a>

    {{-- Sản Phẩm --}}
    <a href="{{route('catFilter')}}"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('products*') ? 'text-furniture' : '' }}">
        Sản Phẩm
    </a>

    {{-- Danh Mục Dropdown --}}
    <div class="relative">
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" 
                class="text-gray-dark hover:text-furniture font-medium transition-colors flex items-center" type="button">
            Danh Mục
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                @foreach($cats as $cat)
                    <li>
                        <a href="{{ route('catFilter', ['cat_id' => $cat->id]) }}"
                           class="block px-4 py-2 hover:bg-furniture hover:text-white transition-colors {{ request()->query('cat_id') == $cat->id ? 'bg-furniture text-white' : '' }}">
                            {{ $cat->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Catalog --}}
    <a href="{{route('catalog') }}"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('catalog') ? 'text-furniture' : '' }}">
        Catalog
    </a>

    {{-- Giới Thiệu --}}
    <a href="{{route('about') }}"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('about') ? 'text-furniture' : '' }}">
        Giới Thiệu
    </a>

    {{-- Liên Hệ --}}
    <a href="{{route('contact') }}"
       class="text-gray-dark hover:text-furniture font-medium transition-colors {{ request()->is('contact') ? 'text-furniture' : '' }}">
        Liên Hệ
    </a>
</div>
