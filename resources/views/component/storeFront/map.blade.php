<!-- Bản đồ và thông tin liên hệ -->
    <div class="bg-gray-100 py-12" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Địa Chỉ Liên Hệ</h2>
                <p class="mt-4 text-lg text-gray-600">Ghé thăm showroom của {{ $settings->brand_name }}</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-start">
                <!-- Google Maps -->
                <div class="w-full h-[400px] rounded-lg overflow-hidden shadow-lg">
                    <iframe
                        src="{{ $settings->map }}"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>

                <!-- Thông tin liên hệ -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Địa Chỉ</h3>
                            <p class="text-gray-600">{{ $settings->address }}</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Liên Hệ</h3>
                            <ul class="space-y-3">
                                @if($settings->sdt)
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span>{{ $settings->sdt }}</span>
                                </li>
                                @endif
                                @if($settings->email)
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $settings->email }}</span>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Giờ Làm Việc</h3>
                            <p class="text-gray-600">Thứ 2 - Chủ nhật: 8:00 - 20:00</p>
                        </div>

                        @if($settings->facebook || $settings->zalo)
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Mạng Xã Hội</h3>
                            <div class="flex space-x-4">
                                @if($settings->facebook)
                                <a href="{{ $settings->facebook }}" target="_blank" class="text-blue-600 hover:text-blue-700">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                                    </svg>
                                </a>
                                @endif
                                @if($settings->zalo)
                                <a href="{{ $settings->zalo }}" target="_blank" class="text-blue-500 hover:text-blue-600">
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
