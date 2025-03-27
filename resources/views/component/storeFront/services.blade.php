@if($webdesign->service_status)
<div class="container mx-auto px-4 py-16 bg-gray-50">
    {{-- Tiêu đề --}}
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-dark mb-4">{{ $webdesign->service_title }}</h2>
        <p class="text-gray max-w-3xl mx-auto">
            {{ $webdesign->service_des }}
        </p>
        <div class="w-24 h-1 bg-furniture mx-auto mt-6"></div>
    </div>

    {{-- Grid dịch vụ --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        {{-- Dịch vụ 1 --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow">
            <div class="w-12 h-12 bg-furniture/10 text-furniture rounded-full flex items-center justify-center mb-4">
                @if($webdesign->service_sub_logo_1)
                    <img src="{{ asset('storage/' . $webdesign->service_sub_logo_1) }}" alt="Service 1" class="w-6 h-6 object-contain">
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                @endif
            </div>
            <h3 class="text-xl font-heading font-semibold text-gray-dark mb-4">{{ $webdesign->service_sub_title_1 }}</h3>
            <div class="text-gray">{{ $webdesign->service_sub_des_1 }}</div>
        </div>

        {{-- Dịch vụ 2 --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow">
            <div class="w-12 h-12 bg-furniture/10 text-furniture rounded-full flex items-center justify-center mb-4">
                @if($webdesign->service_sub_logo_2)
                    <img src="{{ asset('storage/' . $webdesign->service_sub_logo_2) }}" alt="Service 2" class="w-6 h-6 object-contain">
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                @endif
            </div>
            <h3 class="text-xl font-heading font-semibold text-gray-dark mb-4">{{ $webdesign->service_sub_title_2 }}</h3>
            <div class="text-gray">{{ $webdesign->service_sub_des_2 }}</div>
        </div>

        {{-- Dịch vụ 3 --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow">
            <div class="w-12 h-12 bg-furniture/10 text-furniture rounded-full flex items-center justify-center mb-4">
                @if($webdesign->service_sub_logo_3)
                    <img src="{{ asset('storage/' . $webdesign->service_sub_logo_3) }}" alt="Service 3" class="w-6 h-6 object-contain">
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                @endif
            </div>
            <h3 class="text-xl font-heading font-semibold text-gray-dark mb-4">{{ $webdesign->service_sub_title_3 }}</h3>
            <div class="text-gray">{{ $webdesign->service_sub_des_3 }}</div>
        </div>

        {{-- Dịch vụ 4 --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow">
            <div class="w-12 h-12 bg-furniture/10 text-furniture rounded-full flex items-center justify-center mb-4">
                @if($webdesign->service_sub_logo_4)
                    <img src="{{ asset('storage/' . $webdesign->service_sub_logo_4) }}" alt="Service 4" class="w-6 h-6 object-contain">
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                @endif
            </div>
            <h3 class="text-xl font-heading font-semibold text-gray-dark mb-4">{{ $webdesign->service_sub_title_4 }}</h3>
            <div class="text-gray">{{ $webdesign->service_sub_des_4 }}</div>
        </div>
    </div>

    {{-- Nút liên hệ --}}
    {{-- <div class="text-center mt-12">
        <a href="#contact" class="inline-flex items-center px-6 py-3 bg-furniture hover:bg-furniture-dark text-white font-medium rounded-lg transition-colors">
            Liên Hệ Ngay
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div> --}}
</div>
@endif