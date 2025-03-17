<div class="w-full">
    <div class="flex flex-col">
        <div class="relative">
            <input type="text"
                   wire:model.live="search"
                   placeholder="Tìm kiếm sản phẩm..."
                   class="w-full border-0 border-b-2 border-gray-200 focus:border-furniture focus:ring-0 text-lg md:text-base px-4 py-3 rounded-t-lg"
                   @keydown.escape="searchOpen = false"
                   autofocus>
            
            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            
            @if (count($results) > 0)
                <div class="absolute top-full left-0 right-0 bg-white rounded-b-lg shadow-lg z-50 max-h-[60vh] overflow-y-auto">
                    <ul class="py-2">
                        @foreach($results as $product)
                            <li>
                                <a href="{{ route('productOverview', $product->id) }}"
                                   @click="searchOpen = false" 
                                   class="block px-4 py-3 hover:bg-gray-50 transition-colors duration-200">
                                    <div class="flex items-center">
                                        @if($product->images->isNotEmpty())
                                            <img src="{{ config('app.asset_url') }}/storage/{{ $product->images->first()->url }}" 
                                                 alt="{{ $product->name }}"
                                                 class="w-16 h-16 object-cover rounded-lg shadow-sm">
                                        @endif
                                        <div class="ml-3">
                                            <div class="font-medium text-base">{{ $product->name }}</div>
                                            <div class="text-sm text-gray-500 mt-0.5">{{ $product->cat->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="px-4 py-3 bg-gray-50 border-t">
                        <a href="{{ route('catFilter', ['search' => $search]) }}" 
                           @click="searchOpen = false"
                           class="block w-full text-center bg-furniture hover:bg-furniture-dark text-white px-4 py-2 rounded-md transition duration-200">
                            Xem tất cả kết quả
                            <span class="text-sm">({{ count($results) }} kết quả)</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>