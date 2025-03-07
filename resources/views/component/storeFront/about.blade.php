<div class="container mx-auto px-4 py-16">
    {{-- Phần giới thiệu --}}
    <div class="mb-16 text-center opacity-0 animate-slide-left">
        <h1 class="text-4xl md:text-5xl font-heading font-bold text-gray-dark mb-6">PHỤ KIỆN NHÀ BẾP AAA</h1>
        <p class="text-lg md:text-xl text-gray max-w-4xl mx-auto leading-relaxed">
            AAA tự hào là thương hiệu hàng đầu trong lĩnh vực phụ kiện nhà bếp cao cấp, mang đến những giải pháp thông minh giúp không gian bếp của bạn trở nên tiện nghi và hiện đại.
        </p>
    </div>

    {{-- Phần Tầm nhìn --}}
    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
        <div class="opacity-0 animate-slide-left">
            <h2 class="text-3xl font-heading font-semibold text-gray-dark mb-6">Tầm Nhìn & Sứ Mệnh</h2>
            <p class="text-gray mb-4 leading-relaxed">
                AAA không ngừng đổi mới và sáng tạo, mang đến những giải pháp tối ưu cho không gian bếp hiện đại. Chúng tôi hiểu rằng căn bếp không chỉ là nơi nấu nướng, mà còn là trái tim của mỗi gia đình.
            </p>
            <a href="#" class="inline-flex items-center text-furniture hover:text-furniture-dark transition-colors">
                <span class="font-medium">Tìm hiểu thêm</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        <div class="opacity-0 animate-slide-right">
            <img src="{{ asset('images/pic/Giá bát đĩa nâng hạ AAA.webp') }}" alt="Tầm nhìn AAA" class="rounded-lg shadow-xl w-full">
        </div>
    </div>

    {{-- Phần Key Features --}}
    <div class="grid md:grid-cols-3 gap-8 mb-16">
        <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow">
            <div class="w-16 h-16 bg-furniture/10 text-furniture rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h3 class="text-xl font-heading font-semibold text-gray-dark mb-3">Chất Lượng Cao Cấp</h3>
            <p class="text-gray">Sản phẩm được sản xuất từ các vật liệu cao cấp, đảm bảo độ bền và tính thẩm mỹ.</p>
        </div>
        <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow">
            <div class="w-16 h-16 bg-furniture/10 text-furniture rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <h3 class="text-xl font-heading font-semibold text-gray-dark mb-3">Thiết Kế Thông Minh</h3>
            <p class="text-gray">Tối ưu hóa không gian sử dụng với các giải pháp thiết kế sáng tạo và tiện lợi.</p>
        </div>
        <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow">
            <div class="w-16 h-16 bg-furniture/10 text-furniture rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-heading font-semibold text-gray-dark mb-3">Giá Trị Tối Ưu</h3>
            <p class="text-gray">Mang đến giá trị tốt nhất cho khách hàng với chính sách giá cả hợp lý.</p>
        </div>
    </div>
</div>
