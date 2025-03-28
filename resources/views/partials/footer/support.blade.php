<div class="space-y-4">
    <h3 class="text-xl font-heading font-semibold mb-4 text-white">{{ $webdesign->footer_title }}</h3>
    <ul class="space-y-2 text-white">
        @if($webdesign->footer_content1)
        <li>
            <a href="{{ $webdesign->footer_link1 }}" class="hover:text-white transition-all duration-300 group
                               flex items-center hover:translate-x-1">
                <svg class="w-4 h-4 mr-2 transition-transform duration-300
                            group-hover:text-white group-hover:scale-110 text-gray-400"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="border-b border-transparent group-hover:border-white">{{ $webdesign->footer_content1 }}</span>
            </a>
        </li>
        @endif

        @if($webdesign->footer_content2)
        <li>
            <a href="{{ $webdesign->footer_link2 }}" class="hover:text-white transition-all duration-300 group
                               flex items-center hover:translate-x-1">
                <svg class="w-4 h-4 mr-2 transition-transform duration-300
                            group-hover:text-white group-hover:scale-110 text-gray-400"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="border-b border-transparent group-hover:border-white">{{ $webdesign->footer_content2 }}</span>
            </a>
        </li>
        @endif

        @if($webdesign->footer_content3)
        <li>
            <a href="{{ $webdesign->footer_link3 }}" class="hover:text-white transition-all duration-300 group
                               flex items-center hover:translate-x-1">
                <svg class="w-4 h-4 mr-2 transition-transform duration-300
                            group-hover:text-white group-hover:scale-110 text-gray-400"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="border-b border-transparent group-hover:border-white">{{ $webdesign->footer_content3 }}</span>
            </a>
        </li>
        @endif

        @if($webdesign->footer_content4)
        <li>
            <a href="{{ $webdesign->footer_link4 }}" class="hover:text-white transition-all duration-300 group
                               flex items-center hover:translate-x-1">
                <svg class="w-4 h-4 mr-2 transition-transform duration-300
                            group-hover:text-white group-hover:scale-110 text-gray-400"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="border-b border-transparent group-hover:border-white">{{ $webdesign->footer_content4 }}</span>
            </a>
        </li>
        @endif
    </ul>
</div>
