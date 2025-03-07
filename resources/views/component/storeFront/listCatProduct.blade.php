<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-dark mb-4">Danh Mục Sản Phẩm</h2>
        <div class="w-24 h-1 bg-furniture mx-auto"></div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        {{-- Category 1 --}}
        <div class="group">
            <div class="relative overflow-hidden rounded-lg aspect-square mb-4">
                <img src="{{asset('images/pic/KỆ CHAI LỌ.webp')}}" alt="Tủ Bếp"
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition-all duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h3 class="text-white text-xl font-heading font-semibold">Tủ Bếp</h3>
                </div>
            </div>
            <a href="#" class="block text-center">
                <span class="text-gray-dark hover:text-furniture transition-colors font-medium">Xem Thêm</span>
            </a>
        </div>

        {{-- Category 2 --}}
        <div class="group">
            <div class="relative overflow-hidden rounded-lg aspect-square mb-4">
                <img src="{{asset('images/pic/KỆ CHAI LỌ.webp')}}" alt="Kệ Bếp"
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition-all duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h3 class="text-white text-xl font-heading font-semibold">Kệ Bếp</h3>
                </div>
            </div>
            <a href="#" class="block text-center">
                <span class="text-gray-dark hover:text-furniture transition-colors font-medium">Xem Thêm</span>
            </a>
        </div>

        {{-- Category 3 --}}
        <div class="group">
            <div class="relative overflow-hidden rounded-lg aspect-square mb-4">
                <img src="{{asset('images/pic/KỆ CHAI LỌ.webp')}}" alt="Phụ Kiện"
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition-all duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h3 class="text-white text-xl font-heading font-semibold">Phụ Kiện</h3>
                </div>
            </div>
            <a href="#" class="block text-center">
                <span class="text-gray-dark hover:text-furniture transition-colors font-medium">Xem Thêm</span>
            </a>
        </div>

        {{-- Category 4 --}}
        <div class="group">
            <div class="relative overflow-hidden rounded-lg aspect-square mb-4">
                <img src="{{asset('images/pic/KỆ CHAI LỌ.webp')}}" alt="Thiết Bị"
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition-all duration-300"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h3 class="text-white text-xl font-heading font-semibold">Thiết Bị</h3>
                </div>
            </div>
            <a href="#" class="block text-center">
                <span class="text-gray-dark hover:text-furniture transition-colors font-medium">Xem Thêm</span>
            </a>
        </div>
    </div>
</div>
