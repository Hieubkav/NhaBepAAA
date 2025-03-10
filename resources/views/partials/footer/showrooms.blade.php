<div class="space-y-4">
    <h3 class="text-xl font-heading font-semibold mb-4 text-white">{{ $settings->brand_name ?? 'AAA' }}</h3>
    <div class="space-y-4">
        <div>
            <p class="font-semibold text-white/90">Showroom Hà Nội</p>
            <p class="text-white text-sm">{{ $settings->address ?? '502 Xã Đàn, Nam Đồng, Đống Đa' }}</p>
            <a href="{{ $settings->map }}" target="_blank"
               class="text-furniture-light text-sm hover:text-white flex items-center mt-1
                     transition-all duration-300 hover:translate-x-1 group">
                <svg class="w-4 h-4 mr-1 transition-transform duration-300 group-hover:scale-110"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                </svg>
                <span class="border-b border-transparent group-hover:border-white">Mở bản đồ</span>
            </a>
        </div>
    </div>
</div>
