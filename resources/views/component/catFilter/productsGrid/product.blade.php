<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Product Image -->
    <a href="{{ route('productOverview', $product->id) }}" class="relative group">
        <img src="{{config('app.asset_url')}}/storage/{{ $product->images->first()?->url ?? $settings->tmp_pic }}" alt="{{ $product->name }}"
            class="w-full h-52 object-cover transition-transform duration-300 group-hover:scale-105">
        <img src="{{config('app.asset_url')}}/storage/{{ $settings->logo }}" alt="Logo" class="absolute top-2 right-2 w-8 h-8">
    </a>

    <!-- Product Info -->
    <div class="p-4">
        <div class="flex items-start justify-between mb-2">
            <a href="{{ route('productOverview', $product->id) }}" class="text-lg font-semibold">{{ $product->name }}</a>
            <div class="flex gap-1 items-center">
                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                    {{ $product->versions->count() }} Phiên bản
                </span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-2 mt-4">
            <a href="{{ route('productOverview', ['product_id' => $product->id]) }}"
                class="flex-1 bg-gradient-to-r from-red-500 to-red-600 text-white text-center py-2.5 px-4 rounded-lg shadow-[4px_4px_10px_0px_rgba(0,0,0,0.1),-4px_-4px_10px_0px_rgba(255,255,255,0.9)] hover:shadow-[inset_4px_4px_10px_0px_rgba(0,0,0,0.1),inset_-4px_-4px_10px_0px_rgba(255,255,255,0.9)] hover:from-red-600 hover:to-red-700 transition-all duration-300 flex items-center justify-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <span>Chi tiết</span>
            </a>
            <a href="#" 
                class="flex-1 bg-gradient-to-r from-gray-500 to-gray-600 text-white text-center py-2.5 px-4 rounded-lg shadow-[4px_4px_10px_0px_rgba(0,0,0,0.1),-4px_-4px_10px_0px_rgba(255,255,255,0.9)] hover:shadow-[inset_4px_4px_10px_0px_rgba(0,0,0,0.1),inset_-4px_-4px_10px_0px_rgba(255,255,255,0.9)] hover:from-gray-600 hover:to-gray-700 transition-all duration-300 flex items-center justify-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span>Liên hệ</span>
            </a>
        </div>
    </div>
</div>
