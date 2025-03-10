@extends('layouts.shop')

@section('content')
    <livewire:cat-filter :cats="$cats" :products="$products" :current_cat_id="$current_cat_id" />
@endsection
