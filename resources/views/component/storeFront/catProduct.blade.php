@php
    $cats = \App\Models\Cat::where('is_visible', true)
        ->with([
            'products' => function ($query) {
                $query->where('is_visible', true)->with('images');
            },
        ])
        ->get();
@endphp

<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        @foreach ($cats as $cat)
            @if ($cat->products->count() > 0)
                <div class="mb-16 last:mb-0">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-dark mb-4">{{ $cat->name }}
                        </h2>
                        <div class="w-24 h-1 bg-furniture mx-auto"></div>
                        @if ($cat->description)
                            <p class="mt-4 text-gray-600">{!! $cat->description !!}</p>
                        @endif
                    </div>

                    <div x-data="{
                        scroll: 0,
                        maxScroll: 0,
                        init() {
                            this.maxScroll = this.$refs.container.scrollWidth - this.$refs.container.clientWidth;
                    
                            // Re-calculate on resize
                            window.addEventListener('resize', () => {
                                this.maxScroll = this.$refs.container.scrollWidth - this.$refs.container.clientWidth;
                            });
                        }
                    }" class="relative">
                        <!-- Controls -->
                        <button x-show="scroll > 0"
                            @click="scroll = Math.max(0, scroll - 300); $refs.container.scrollTo({left: scroll, behavior: 'smooth'})"
                            class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 bg-white rounded-full p-2 shadow-lg hover:bg-gray-100">
                            <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <button x-show="scroll < maxScroll"
                            @click="scroll = Math.min(maxScroll, scroll + 300); $refs.container.scrollTo({left: scroll, behavior: 'smooth'})"
                            class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 bg-white rounded-full p-2 shadow-lg hover:bg-gray-100">
                            <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <!-- Products Container -->
                        <div x-ref="container" class="flex gap-6 overflow-x-auto scrollbar-hide scroll-smooth"
                            @scroll.throttle="scroll = $el.scrollLeft">
                            @foreach ($cat->products as $product)
                                <div class="min-w-[280px] bg-white rounded-lg shadow-md overflow-hidden group">
                                    <div class="relative pt-[100%]">
                                        @if ($product->images->isNotEmpty())
                                            <a href="{{ route('productOverview', $product->id) }}">
                                                <img src="{{ config('app.asset_url') }}/storage/{{ $product->images->first()->url }}"
                                                    alt="{{ $product->name }}"
                                                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="p-4">
                                        <h3 class="font-heading font-semibold text-gray-dark mb-2 line-clamp-2">
                                            <a href="{{ route('productOverview', $product->id) }}">
                                            {{ $product->name }}
                                            </a>
                                        </h3>
                                        <button
                                            class="w-full bg-gray-100 hover:bg-furniture text-gray-dark hover:text-white py-2 rounded transition-colors">
                                            Liên Hệ Ngay
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
