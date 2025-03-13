@php
    $currentProduct = \App\Models\Product::findOrFail($product_id);
    $relatedProducts = \App\Models\Product::with(['images', 'cat'])
        ->where('cat_id', $currentProduct->cat_id)
        ->where('id', '!=', $product_id)
        ->where('is_visible', true)
        ->limit(5)
        ->get();
        
    $productsData = $relatedProducts->map(function($p) {
        return [
            'id' => $p->id,
            'name' => $p->name,
            'image' => config('app.asset_url')."/storage/".$p->images->first()?->url,
            'category' => $p->cat->name
        ];
    })->toArray();
@endphp
<div x-data="{
    products: {{ json_encode($productsData) }},
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
        <a href="{{ route('catFilter', ['cat_id' => $currentProduct->cat_id]) }}" class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors duration-200">
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
            <template x-for="product in products" :key="product.id">
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

                            <!-- View Details Button -->
                            <a :href="'/productOverview/' + product.id"
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
