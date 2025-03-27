<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="canonical" href="https://www.prohardware.com.vn">
    <meta name="description" content="Nhà Bếp AAA - Cung cấp phụ kiện nhà bếp cao cấp, thiết kế thông minh, với chất lượng vượt trội, mang đến giải pháp tối ưu cho không gian bếp của bạn.">
    <meta name="keywords" content="Nhà Bếp AAA, phụ kiện nhà bếp, bếp từ, bồn rửa chén, máy hút mùi, máy rửa bát, thiết kế thông minh, không gian bếp hiện đại">
    <meta name="robots" content="all">
    <meta property="og:title" content="Nhà Bếp AAA - Phụ Kiện Cao Cấp, Thiết Kế Thông Minh">
    <meta property="og:description" content="Nhà Bếp AAA mang đến những sản phẩm nhà bếp hiện đại, như bếp từ, máy hút mùi, bồn rửa, và máy rửa bát, được thiết kế tối ưu để làm nổi bật không gian sống của bạn.">
    <meta property="og:url" content="https://www.prohardware.com.vn">
    <meta property="og:image" content="{{ asset('images/logo.webp') }}">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Nhà Bếp AAA - Phụ Kiện Nhà Bếp Cao Cấp",
      "description": "Nhà Bếp AAA cung cấp phụ kiện nhà bếp chất lượng cao với thiết kế thông minh và hiện đại, tạo nên trải nghiệm nấu nướng đẳng cấp cho khách hàng.",
      "url": "https://www.prohardware.com.vn"
    }
    </script>
    <meta name="revisit-after" content="1 day" />
    <meta name="HandheldFriendly" content="true">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="author" content="Trần Mạnh Hiếu">


    {{--   Thẻ tạo icon--}}
    <link rel="icon" href="{{config('app.asset_url')}}/storage/{{ $settings->logo }}">

    <title>{{ $settings->brand_name }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')

</head>

<body class="antialiased overflow-x-hidden">

@include('component.shop.navbar')
<main class="bg-gray-100 overflow-x-hidden">
    @yield('content')
</main>
@include('component.shop.footer')
@include('component.shop.speedial')
{{--@include('component.shop.modal')--}}

@livewire('notifications')

@filamentScripts
@vite('resources/js/app.js')
</body>
</html>
