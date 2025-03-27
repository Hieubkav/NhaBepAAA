@php
    $setting = App\Models\Setting::first();
@endphp

{{-- Video Carousel Container --}}
<div class="relative w-full aspect-video md:aspect-[21/9] overflow-hidden rounded-2xl">
    {{-- Background Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-tr from-blue-500/10 to-purple-500/10 mix-blend-overlay pointer-events-none"></div>

    {{-- Video Container --}}
    <div class="relative w-full h-full transform-gpu">
        <video
            class="absolute inset-0 w-full h-full object-cover min-h-[250px] md:min-h-[400px]"
            autoplay
            loop
            muted
            playsinline
            poster="{{config('app.asset_url')}}/storage/{{ $settings->logo }}"
        >
            <source src="{{config('app.asset_url')}}/storage/{{$setting->video}}" type="video/mp4"
                    type="video/mp4">
        </video>

        {{-- Video Overlay Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40 pointer-events-none"></div>
    </div>

   


{{-- Video Autoplay Check --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.querySelector('video');

        // Check if video can autoplay
        video.play().catch(function(error) {
            console.log("Video autoplay failed:", error);
        });

        // Optimize video playback
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    video.play();
                } else {
                    video.pause();
                }
            });
        }, { threshold: 0.5 });

        observer.observe(video);
    });

    // Lazy loading optimization
    if ('loading' in HTMLImageElement.prototype) {
        const video = document.querySelector('video');
        video.loading = 'lazy';
    }

    // Preload video for better performance
    const video = document.querySelector('video');
    video.preload = 'metadata';
</script>

<style>
    /* Tối ưu hiệu năng video */
    video {
        will-change: transform;
        transform: translateZ(0);
        backface-visibility: hidden;
        perspective: 1000px;
        -webkit-font-smoothing: subpixel-antialiased;
    }
</style>
</div>
