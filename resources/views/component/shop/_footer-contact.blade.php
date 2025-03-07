<div class="space-y-8">
    {{-- Contact Section --}}
    <div>
        <h3 class="text-xl font-heading font-semibold mb-4">Tổng Đài</h3>
        <div class="space-y-2">
            <a href="tel:1900xxxx" class="block hover:text-furniture-light transition-colors group flex items-center">
                <svg class="w-5 h-5 mr-2 text-furniture-light group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>
                    <span class="font-semibold">CSKH:</span> 1900 xxxx
                </span>
            </a>
            <a href="tel:0xxxxx" class="block hover:text-furniture-light transition-colors group flex items-center">
                <svg class="w-5 h-5 mr-2 text-furniture-light group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>
                    <span class="font-semibold">Tư vấn:</span> 0xxx.xxx.xxx
                </span>
            </a>
        </div>
    </div>

    {{-- Payment Methods Section --}}
    <div>
        <h3 class="text-xl font-heading font-semibold mb-4">Thanh Toán</h3>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-gray-800 rounded-lg p-2 flex items-center justify-center hover:shadow-xl hover:shadow-gray-900/20 transition-shadow">
                <img src="{{ asset('images/payment/visa.png') }}" alt="Visa" class="h-8">
            </div>
            <div class="bg-gray-800 rounded-lg p-2 flex items-center justify-center hover:shadow-xl hover:shadow-gray-900/20 transition-shadow">
                <img src="{{ asset('images/payment/mastercard.png') }}" alt="MasterCard" class="h-8">
            </div>
            <div class="bg-gray-800 rounded-lg p-2 flex items-center justify-center hover:shadow-xl hover:shadow-gray-900/20 transition-shadow">
                <img src="{{ asset('images/payment/vnpay.png') }}" alt="VNPay" class="h-8">
            </div>
        </div>
    </div>
</div>
