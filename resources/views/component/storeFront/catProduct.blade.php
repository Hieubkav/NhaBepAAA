<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-dark mb-4">Sản Phẩm Nổi Bật</h2>
            <div class="w-24 h-1 bg-furniture mx-auto"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {{-- Product Card 1 --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                <div class="relative pt-[100%]">
                    <img src="{{asset('images/pic/TỦ ĐỒ KHÔ NANO (2).webp')}}" alt="Product 1"
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 left-3">
                        <span class="bg-furniture text-white text-sm px-3 py-1 rounded-full">-20%</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-heading font-semibold text-gray-dark mb-2">Tủ Bếp Thông Minh A100</h3>
                    <div class="flex items-baseline mb-2">
                        <span class="text-furniture font-bold text-lg">4.500.000đ</span>
                        <span class="text-gray line-through text-sm ml-2">5.000.000đ</span>
                    </div>
                    <button class="w-full bg-gray-100 hover:bg-furniture text-gray-dark hover:text-white py-2 rounded transition-colors">
                        Chi Tiết
                    </button>
                </div>
            </div>

            {{-- Product Card 2 --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                <div class="relative pt-[100%]">
                    <img src="{{asset('images/pic/TỦ ĐỒ KHÔ NANO (2).webp')}}" alt="Product 2"
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 left-3">
                        <span class="bg-furniture text-white text-sm px-3 py-1 rounded-full">Mới</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-heading font-semibold text-gray-dark mb-2">Kệ Gia Vị Đa Năng B200</h3>
                    <div class="flex items-baseline mb-2">
                        <span class="text-furniture font-bold text-lg">2.800.000đ</span>
                    </div>
                    <button class="w-full bg-gray-100 hover:bg-furniture text-gray-dark hover:text-white py-2 rounded transition-colors">
                        Chi Tiết
                    </button>
                </div>
            </div>

            {{-- Product Card 3 --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                <div class="relative pt-[100%]">
                    <img src="{{asset('images/pic/TỦ ĐỒ KHÔ NANO (2).webp')}}" alt="Product 3"
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-4">
                    <h3 class="font-heading font-semibold text-gray-dark mb-2">Giá Đựng Bát Đĩa C300</h3>
                    <div class="flex items-baseline mb-2">
                        <span class="text-furniture font-bold text-lg">3.200.000đ</span>
                    </div>
                    <button class="w-full bg-gray-100 hover:bg-furniture text-gray-dark hover:text-white py-2 rounded transition-colors">
                        Chi Tiết
                    </button>
                </div>
            </div>

            {{-- Product Card 4 --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                <div class="relative pt-[100%]">
                    <img src="{{asset('images/pic/TỦ ĐỒ KHÔ NANO (2).webp')}}" alt="Product 4"
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 left-3">
                        <span class="bg-furniture text-white text-sm px-3 py-1 rounded-full">Hot</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-heading font-semibold text-gray-dark mb-2">Kệ Để Dao Thớt D400</h3>
                    <div class="flex items-baseline mb-2">
                        <span class="text-furniture font-bold text-lg">1.800.000đ</span>
                    </div>
                    <button class="w-full bg-gray-100 hover:bg-furniture text-gray-dark hover:text-white py-2 rounded transition-colors">
                        Chi Tiết
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="#" class="inline-flex items-center px-6 py-3 border-2 border-furniture text-furniture hover:bg-furniture hover:text-white font-medium rounded-lg transition-colors">
                Xem Tất Cả
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</div>
