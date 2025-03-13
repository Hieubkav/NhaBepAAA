@php
    $product = \App\Models\Product::findOrFail($product_id);
@endphp
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-bold text-gray-900 mb-6">Mô tả chi tiết sản phẩm</h2>
    <div class="prose max-w-none">
        {!! $product->description !!}
    </div>
</div>
