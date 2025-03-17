<div class="space-y-8">
    {{-- Contact Section --}}
    <div>
        <h3 class="text-xl font-heading font-semibold mb-4 text-white">Tổng Đài</h3>
        <div class="space-y-2">
            <a href="tel:{{ $settings->sdt ?? '1900xxxx' }}"
               class="block text-white hover:text-white transition-all duration-300 group
                      flex items-center hover:translate-x-1">
                <svg class="w-5 h-5 mr-2 text-gray-400 transition-transform duration-300
                           group-hover:text-white group-hover:scale-110"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span class="border-b border-transparent group-hover:border-white">
                    <span class="font-semibold">CSKH:</span> {{ $settings->sdt ?? '1900xxxx' }}
                </span>
            </a>
            <a href="mailto:{{ $settings->email }}"
               class="block text-white hover:text-white transition-all duration-300 group
                      flex items-center hover:translate-x-1">
                <svg class="w-5 h-5 mr-2 text-gray-400 transition-transform duration-300
                           group-hover:text-white group-hover:scale-110"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span class="border-b border-transparent group-hover:border-white">
                    <span class="font-semibold">Email:</span> {{ $settings->email ?? 'contact@example.com' }}
                </span>
            </a>
        </div>
    </div>
</div>
