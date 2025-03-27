@extends('layouts.shop')

@section('content')
    @include('component.storeFront.carousel')
    @include('component.storeFront.listCatProduct')
    @include('component.storeFront.catProduct')
    @include('component.storeFront.vision', ['webdesign' => \App\Models\WebDesign::first()])
    @include('component.storeFront.services', ['webdesign' => \App\Models\WebDesign::first()])
    @include('component.storeFront.map')
@endsection
