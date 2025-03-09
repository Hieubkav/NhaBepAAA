<div x-data="{
    products: [
        {
            name: 'Kệ dao thớt đa năng',
            image: '{{ asset('images/pic/KỆ DAO THỚT.webp') }}',
            price: '350.000đ',
            category: 'Kệ dao thớt'
        },
        {
            name: 'Kệ chai lọ cao cấp',
            image: '{{ asset('images/pic/KỆ CHAI LỌ.webp') }}',
            price: '420.000đ',
            category: 'Kệ chai lọ'
        },
        {
            name: 'Kệ dĩa cố định chữ V',
            image: '{{ asset('images/pic/KỆ DĨA CỐ ĐỊNH CHỮ V.webp') }}',
            price: '380.000đ',
            category: 'Kệ dĩa'
        },
        {
            name: 'Kệ liên hoàn góc I',
            image: '{{ asset('images/pic/KỆ LIÊN HOÀN GÓC I.webp') }}',
            price: '550.000đ',
            category: 'Kệ liên hoàn'
        },
        {
            name: 'Mâm xoay lá trắng',
            image: '{{ asset('images/pic/MÂM XOAY LÁ TRẮNG.webp') }}',
            price: '480.000đ',
            category: 'Mâm xoay'
        }
    ],
    scrollContainer: null,
    init() {
        this.scrollContainer = this.$refs.scrollContainer;
    },
    scroll(direction) {
        const scrollAmount = this.scrollContainer.offsetWidth * 0.8;
        const newPosition = this.scrollContainer.scrollLeft + (direction === 'next' ? scrollAmount : -scrollAmount);
        this.scrollContainer.scrollTo({
            left: newPosition,
            behavior: 'smooth'
        });
    }
}" class="relative">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Sản phẩm liên quan</h2>
        <a href="/products" class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors duration-200">
            Xem tất cả
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <!-- Products Slider -->
    <div class="relative">
        <!-- Navigation Buttons -->
        <button @click="scroll('prev')"
            class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 bg-white rounded-full p-2 shadow-lg hover:bg-gray-50 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button @click="scroll('next')"
            class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 bg-white rounded-full p-2 shadow-lg hover:bg-gray-50 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Products Row -->
        <div x-ref="scrollContainer"
            class="flex space-x-6 overflow-x-hidden scroll-smooth">
            <template x-for="product in products" :key="product.name">
                <div class="flex-none w-[280px] group">
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                        <!-- Product Image -->
                        <div class="aspect-[4/3] overflow-hidden rounded-t-xl bg-gray-100">
                            <img :src="product.image" :alt="product.name"
                                class="h-full w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                        </div>

                        <!-- Product Info -->
                        <div class="p-4">
                            <p class="text-sm font-medium text-blue-600" x-text="product.category"></p>
                            <h3 class="mt-1 text-lg font-semibold text-gray-900 truncate" x-text="product.name"></h3>
                            <p class="mt-1 text-lg font-bold text-blue-600" x-text="product.price"></p>

                            <!-- View Details Button -->
                            <a :href="'/products/' + product.name"
                                class="mt-4 block w-full rounded-lg bg-gray-100 px-4 py-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 transition-colors duration-200">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
