<div class="container mx-auto px-4 py-12">
    {{-- Tiêu đề --}}
    <div class="text-center mb-12 opacity-0 animate-slide-left">
        <h1 class="text-4xl md:text-5xl font-heading font-bold text-heading mb-6">Hệ Thống Showroom AAA</h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Hệ thống showroom hiện đại trải dài khắp cả nước, mang đến trải nghiệm mua sắm tuyệt vời cho khách hàng
        </p>
    </div>

    {{-- Grid Showroom --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @include('component.storeFront._showroom-card', [
            'name' => 'Hà Nội',
            'address' => '502 Xã Đàn, phường Nam Đồng, quận Đống Đa, Hà Nội',
            'time' => 'Thứ 2 – CN (8h30 – 20h00)',
            'area' => '875',
            'delay' => 0
        ])

        @include('component.storeFront._showroom-card', [
            'name' => 'Thủ Đức',
            'address' => '30-32-34 Đinh Thị Thi, Khu Đô Thị Vạn Phúc, Hiệp Bình Phước, TP.Thủ Đức, TP.HCM',
            'time' => 'Thứ 2 – CN (8h30 – 20h00)',
            'area' => '560',
            'delay' => 100
        ])

        @include('component.storeFront._showroom-card', [
            'name' => 'Tân Bình',
            'address' => '485 – 487 Phạm Văn Bạch, Phường 15, Quận Tân Bình, TP.HCM',
            'time' => 'Thứ 2 – CN (8h30 – 20h00)',
            'area' => '620',
            'delay' => 200
        ])




    </div>
</div>
