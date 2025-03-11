<div>
    <!-- Loading Spinner -->
    <div wire:loading class="flex justify-center items-center py-8">
        <svg class="animate-spin h-8 w-8 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span class="ml-2 text-gray-600">Đang tải...</span>
    </div>

    <!-- Products Grid -->
    <div wire:loading.remove class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($products as $product)
            @include('component.catFilter.productsGrid.product', ['product' => $product])
        @empty
            <div class="col-span-full text-center py-8 text-gray-500">Không tìm thấy sản phẩm nào trong danh mục này</div>
        @endforelse
    </div>
</div>
