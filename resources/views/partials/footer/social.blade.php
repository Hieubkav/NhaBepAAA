<div class="space-y-4">
    <h3 class="text-xl font-heading font-semibold mb-4 text-gray-light">Fanpage</h3>

    {{-- Facebook Page Plugin --}}
    <div class="bg-furniture/10 backdrop-blur-sm rounded-lg p-4 w-full max-w-[300px]
                transform transition-all duration-300
                hover:scale-[1.02] hover:shadow-xl hover:shadow-furniture/20">
        <div class="bg-furniture/5 rounded-lg flex items-center justify-center overflow-hidden">
            <div class="fb-page"
                 data-href="https://www.facebook.com/AAA"
                 data-tabs=""
                 data-width="280"
                 data-height="180"
                 data-small-header="true"
                 data-adapt-container-width="true"
                 data-hide-cover="false"
                 data-show-facepile="true">
            </div>
        </div>
    </div>

    {{-- Social Media Links --}}
    <div class="flex space-x-4">
        <a href="#" class="social-btn bg-furniture/10 text-furniture hover:text-white transition-all duration-300
                          p-2 rounded-full hover:bg-furniture hover:shadow-lg hover:shadow-furniture/20
                          transform hover:scale-110 hover:rotate-3 active:scale-95 group">
            <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110"
                 fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
            <span class="sr-only">Facebook</span>
        </a>
        <a href="#" class="social-btn bg-furniture/10 text-furniture hover:text-white transition-all duration-300
                          p-2 rounded-full hover:bg-furniture hover:shadow-lg hover:shadow-furniture/20
                          transform hover:scale-110 hover:rotate-3 active:scale-95 group">
            <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110"
                 fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
            </svg>
            <span class="sr-only">Twitter</span>
        </a>
        <a href="#" class="social-btn bg-furniture/10 text-furniture hover:text-white transition-all duration-300
                          p-2 rounded-full hover:bg-furniture hover:shadow-lg hover:shadow-furniture/20
                          transform hover:scale-110 hover:rotate-3 active:scale-95 group">
            <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110"
                 fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
            <span class="sr-only">LinkedIn</span>
        </a>
    </div>
</div>

<style>
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
</style>

@push('scripts')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0" nonce="random_nonce"></script>
@endpush
