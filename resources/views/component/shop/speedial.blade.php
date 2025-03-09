<div x-data="{ open: true }"
     class="fixed top-1/2 right-0 -translate-y-1/2 md:translate-y-0 md:top-auto md:bottom-10 z-50">
    {{-- Toggle button --}}
    <button @click="open = !open"
            class="absolute -left-5 md:-left-8 top-1/2 -translate-y-1/2 w-5 md:w-8 h-10 md:h-16
                   bg-white/95 backdrop-blur-md rounded-l-lg
                   shadow-[4px_0_15px_-3px_rgba(0,0,0,0.1),0_4px_6px_-4px_rgba(0,0,0,0.1)]
                   hover:shadow-[6px_0_25px_-3px_rgba(0,0,0,0.15),0_4px_6px_-4px_rgba(0,0,0,0.1)]
                   border border-gray-100/50
                   flex items-center justify-center focus:outline-none
                   transition-all duration-300 ease-in-out">
        <div class="w-1 h-full absolute right-0 bg-furniture"></div>
        <svg x-bind:class="open ? 'rotate-0' : 'rotate-180'"
             class="w-2.5 h-2.5 md:w-4 md:h-4 text-furniture transform transition-transform duration-300"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    {{-- Container chính --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-x-full"
         x-transition:enter-end="opacity-100 transform translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform translate-x-0"
         x-transition:leave-end="opacity-0 transform translate-x-full"
         class="relative bg-white/95 backdrop-blur-lg rounded-l-xl
                shadow-[0_10px_30px_-5px_rgba(0,0,0,0.15),0_4px_6px_-4px_rgba(0,0,0,0.1)]
                hover:shadow-[0_20px_40px_-5px_rgba(0,0,0,0.2),0_4px_6px_-4px_rgba(0,0,0,0.1)]
                border border-gray-100/50
                transition-all duration-500 ease-in-out">
        {{-- Thanh dọc màu đỏ --}}
        <div class="absolute left-0 top-0 w-1.5 h-full bg-furniture rounded-l-xl"></div>

        {{-- Container các nút --}}
        <div class="flex flex-col items-center py-1.5 md:py-3 px-2 md:px-3 space-y-1 md:space-y-2">
            {{-- Nút Zalo --}}
            <button @click="window.open('https://zalo.me/yourNumber', '_blank')"
                    class="social-btn w-7 h-7 md:w-10 md:h-10 p-0.5 md:p-1 flex items-center justify-center rounded-full
                           bg-furniture text-white
                           shadow-[0_4px_12px_-2px_rgba(0,0,0,0.2)] hover:shadow-[0_8px_20px_-2px_rgba(0,0,0,0.25)]
                           transform transition-all duration-300
                           hover:scale-110 hover:rotate-3 active:scale-95">
                <span class="text-lg md:text-2xl font-bold social-icon leading-none">Z</span>
            </button>

            {{-- Nút Messenger --}}
            <button @click="window.open('https://m.me/yourPage', '_blank')"
                    class="social-btn w-7 h-7 md:w-10 md:h-10 p-0.5 md:p-1 flex items-center justify-center rounded-full
                           bg-furniture text-white
                           shadow-[0_4px_12px_-2px_rgba(0,0,0,0.2)] hover:shadow-[0_8px_20px_-2px_rgba(0,0,0,0.25)]
                           transform transition-all duration-300
                           hover:scale-110 hover:rotate-3 active:scale-95">
                <svg class="social-icon w-4 h-4 md:w-6 md:h-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/>
                </svg>
            </button>

            {{-- Nút Quick Call --}}
            <a href="tel:yourNumber"
               class="flex flex-col items-center px-1.5 py-1 md:px-2.5 md:py-1.5
                      bg-gray text-white rounded-full
                      shadow-[0_4px_12px_-2px_rgba(0,0,0,0.2)] hover:shadow-[0_8px_20px_-2px_rgba(0,0,0,0.25)]
                      transform transition-all duration-300
                      hover:scale-110 hover:rotate-3 active:scale-95">
                <svg class="social-icon w-4 h-4 md:w-6 md:h-6 mb-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </a>

            {{-- Nút scroll to top --}}
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                    class="w-5 h-5 md:w-7 md:h-7 p-0.5 md:p-1 flex items-center justify-center rounded-full
                           bg-white text-furniture
                           shadow-[0_4px_12px_-2px_rgba(0,0,0,0.2)] hover:shadow-[0_8px_20px_-2px_rgba(0,0,0,0.25)]
                           transform transition-all duration-300
                           hover:scale-110 hover:rotate-3 active:scale-95">
                <svg class="social-icon w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<style>
    /* Ripple effect */
    .social-btn {
        position: relative;
        overflow: hidden;
    }

    .social-btn::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255,255,255,0.7) 0%, transparent 70%);
        transform: scale(0);
        opacity: 0;
        transition: transform 0.5s, opacity 0.5s;
        pointer-events: none;
        border-radius: 50%;
    }

    .social-btn:active::after {
        transform: scale(2);
        opacity: 1;
        transition: 0s;
    }

    /* Icon animation */
    .social-icon {
        transition: transform 0.3s ease;
        will-change: transform;
    }

    .social-btn:hover .social-icon {
        animation: float 1s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-2px) rotate(3deg); }
    }
</style>

@push('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
