<div class="fixed top-1/2 right-0 -translate-y-1/2 md:translate-y-0 md:top-auto md:bottom-10 z-50">
    {{-- Container chính --}}
    <div class="relative bg-white rounded-l-xl shadow-lg">
        {{-- Thanh dọc màu đỏ --}}
        <div class="absolute left-0 top-0 w-1.5 h-full bg-furniture rounded-l-xl"></div>

        {{-- Container các nút --}}
        <div class="flex flex-col items-center py-4 px-3 space-y-3">
            {{-- Nút Zalo --}}
            <a href="https://zalo.me/yourNumber" target="_blank"
               class="w-12 h-12 flex items-center justify-center rounded-full bg-furniture text-white shadow-md hover:scale-105 transform transition-transform">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12.49 10.272v-.45h1.347v6.322h-.77a.576.576 0 01-.577-.573v.001a3.273 3.273 0 01-1.851.573A3.215 3.215 0 017.4 12.93a3.215 3.215 0 013.238-3.214 3.27 3.27 0 011.851.557zm-.284 4.212a2.118 2.118 0 100-4.235 2.118 2.118 0 000 4.235z M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"/>
                </svg>
            </a>

            {{-- Nút Messenger --}}
            <a href="https://m.me/yourPage" target="_blank"
               class="w-12 h-12 flex items-center justify-center rounded-full bg-furniture text-white shadow-md hover:scale-105 transform transition-transform">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/>
                </svg>
            </a>

            {{-- Nút Quick Call --}}
            <a href="tel:yourNumber"
               class="flex flex-col items-center px-3 py-2 bg-gray text-white rounded-xl shadow-md hover:scale-105 transform transition-transform">
                <svg class="w-6 h-6 mb-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <span class="text-xs font-medium">Quick Call</span>
            </a>

            {{-- Nút scroll to top --}}
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-white text-furniture shadow-md hover:scale-105 transform transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                </svg>
            </button>
        </div>
    </div>
</div>
