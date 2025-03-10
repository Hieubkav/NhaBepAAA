@extends('layouts.shop')

@section('content')
    <!-- Filter Bar -->
    <div x-data="{
        categories: [],
        sortBy: 'newest',
        search: '',
        productCount: 100,
        displayedCount: 10
    }" class="container mx-auto px-4 py-8">

        <!-- Filter và Search Bar -->
        @include('component.catFilter.filterAndSearchBar')

        <!-- Products Grid -->
        @include('component.catFilter.productsGrid')
    </div>
@endsection
