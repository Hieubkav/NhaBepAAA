@if($webdesign->map_status)
<div class="bg-gray-50" id="contact">
    <div class="container mx-auto px-4 py-16">
        {{-- Tiêu đề section --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $webdesign->map_title }}</h2>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">{{ $webdesign->map_des }}</p>
        </div>

        {{-- Grid container cho map và thông tin --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="grid md:grid-cols-2">
                {{-- Bản đồ --}}
                <div class="h-[600px]">
                    <iframe
                        src="{{ $webdesign->map_link }}"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full">
                    </iframe>
                </div>

                {{-- Thông tin liên hệ --}}
                <div class="p-8 lg:p-12">
                    {{-- Địa chỉ --}}
                    <div class="mb-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">Địa Chỉ</h3>
                                <p class="mt-1 text-gray-600">{{ $settings->address }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Thông tin liên lạc --}}
                    @if($settings->sdt)
                    <div class="mb-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">Điện Thoại</h3>
                                <p class="mt-1 text-gray-600">{{ $settings->sdt }}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Email --}}
                    @if($settings->email)
                    <div class="mb-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">Email</h3>
                                <p class="mt-1 text-gray-600">{{ $settings->email }}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Social Media --}}
                    @if($settings->facebook || $settings->zalo)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Kết nối với chúng tôi</h3>
                        <div class="flex space-x-4">
                            @if($settings->facebook)
                            <a href="{{ $settings->facebook }}" target="_blank" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                                </svg>
                                Facebook
                            </a>
                            @endif
                            
                            @if($settings->zalo)
                            <a href="https://zalo.me/{{ $settings->zalo }}" target="_blank"
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600">
                                Zalo
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
