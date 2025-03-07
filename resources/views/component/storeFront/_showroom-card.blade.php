@props(['name', 'address', 'time', 'area', 'delay' => 0])

<div class="bg-white rounded-xl shadow-lg overflow-hidden opacity-0 animate-slide-left" style="animation-delay: {{ $delay }}ms">
    <div class="relative h-48 bg-gray-200">
        <div class="absolute inset-0 flex items-center justify-center">
            <image src="{{ asset('images/pic/Giá bát đĩa nâng hạ AAA (2).webp') }}" alt="Showroom" class="w-full h-full object-cover">
        </div>
    </div>
    <div class="p-6">
        <h3 class="text-xl font-heading font-semibold text-heading mb-4">Showroom AAA {{ $name }}</h3>
        <div class="space-y-3 text-gray-600">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-medical-green mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <p>{{ $address }}</p>
            </div>
            <div class="flex items-center">
                <svg class="w-6 h-6 text-medical-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p>{{ $time }}</p>
            </div>
            <div class="flex items-center">
                <svg class="w-6 h-6 text-medical-green mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <p>Diện tích: {{ $area }}m²</p>
            </div>
        </div>
    </div>
</div>
