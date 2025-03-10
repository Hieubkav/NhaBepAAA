<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-dark mb-4">Danh Mục Sản Phẩm</h2>
        <div class="w-24 h-1 bg-furniture mx-auto"></div>
    </div>

    <div x-data="{
        scroll: 0,
        maxScroll: 0,
        updateMaxScroll() {
            this.maxScroll = this.$refs.container.scrollWidth - this.$refs.container.clientWidth;
        }
    }"
    x-init="updateMaxScroll(); window.addEventListener('resize', updateMaxScroll)"
    class="relative">
        <!-- Nút điều hướng trái -->
        <button
            @click="scroll = Math.max(0, scroll - 300)"
            x-show="scroll > 0"
            class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-white shadow-lg rounded-full p-2 -ml-4"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Container chứa danh mục -->
        <div
            x-ref="container"
            class="overflow-hidden relative"
        >
            <div
                class="flex gap-6 transition-transform duration-300 ease-out"
                :style="{ transform: `translateX(-${scroll}px)` }"
            >
                @foreach ($cats->where('is_visible', true) as $cat)
                    <div class="group flex-shrink-0 w-[280px]">
                        <div class="relative overflow-hidden rounded-lg aspect-square mb-4">
                            @php
                                $firstImage = $cat->products()
                                    ->where('is_visible', true)
                                    ->with('images')
                                    ->get()
                                    ->flatMap(function($product) {
                                        return $product->images;
                                    })
                                    ->first();
                            @endphp

                            <img src="{{ $firstImage ? config('app.asset_url').'/storage/'.$firstImage->url : asset('images/placeholder.jpg') }}"
                                alt="{{ $cat->name }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition-all duration-300"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-white text-xl font-heading font-semibold">{{ $cat->name }}</h3>
                            </div>
                        </div>
                        <a href="{{ route('catFilter', ['cat_id' => $cat->id]) }}" class="block text-center">
                            <span class="text-gray-dark hover:text-furniture transition-colors font-medium">Xem Thêm</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Nút điều hướng phải -->
        <button
            @click="scroll = Math.min(maxScroll, scroll + 300)"
            x-show="scroll < maxScroll"
            class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-white shadow-lg rounded-full p-2 -mr-4"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</div>
