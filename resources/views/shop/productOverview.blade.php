@extends('layouts.shop')

@section('content')
<div class="container mx-auto px-4 py-8 space-y-12">
    <!-- Product Gallery and Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Left Column - Gallery -->
        <div class="col-span-1 lg:col-span-1">
            @include('component.productOverview.productImageGallery')
        </div>

        <div class="col-span-1 lg:col-span-1">
            @include('component.productOverview.productInfo')
        </div>
    </div>

    <!-- Product Description -->
    @include('component.productOverview.productDescription')

    <!-- Related Products -->
    <div>
        @include('component.productOverview.relatedProducts')
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush
