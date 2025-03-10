<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse($products as $product)
        @include('component.catFilter.productsGrid.product', ['product' => $product])
    @empty
        <div class="col-span-full text-center py-8 text-gray-500">Không tìm thấy sản phẩm nào trong danh mục này</div>
    @endforelse
</div>
