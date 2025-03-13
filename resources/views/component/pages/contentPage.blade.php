<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @if($page)
                {{-- Thumbnail --}}
                @if($page->thumbnail)
                    <div class="w-full h-[300px] md:h-[400px] relative">
                        <img src="{{ asset('storage/' . $page->thumbnail) }}" 
                            alt="{{ $page->title }}"
                            class="w-full h-full object-cover">
                    </div>
                @endif

                {{-- Content --}}
                <div class="p-6 md:p-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $page->title }}</h1>
                    <div class="prose max-w-none">
                        {!! $page->content !!}
                    </div>

                    {{-- PDF Viewer --}}
                    @if($page->pdf)
                        <div class="mt-8">
                            @include('partials.pdf-viewer', ['pdf' => $page->pdf])
                        </div>
                    @endif
                </div>
            @else
                <div class="p-6 text-gray-500 text-center">
                    <p>Nội dung đang được cập nhật...</p>
                </div>
            @endif
        </div>
    </div>
</div>

@if($page && $page->pdf)
    @push('styles')
    <style>
        /* PDF viewer container styling */
        #pdf-canvas {
            max-width: 100%;
            width: 100%;
            height: auto !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 0 auto;
        }
        
        .bg-gray-100 {
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            width: 100%;
            overflow-x: hidden;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .bg-gray-100 {
                padding: 0.5rem;
                min-height: 300px;
                margin: 0 -1rem;
            }

            #pdf-canvas {
                border-radius: 4px;
                max-width: calc(100vw - 2rem);
                width: 100%;
            }

            /* Tối ưu hiệu suất khi cuộn trên mobile */
            #pdf-canvas {
                -webkit-overflow-scrolling: touch;
                scroll-behavior: smooth;
                -webkit-transform: translateZ(0);
                transform: translateZ(0);
            }
        }

        /* Loading state */
        #pdf-canvas.loading {
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }

        /* Thêm animation khi PDF đang tải */
        @keyframes pulse {
            0% { opacity: 0.5; }
            50% { opacity: 0.8; }
            100% { opacity: 0.5; }
        }

        #pdf-canvas.loading {
            animation: pulse 1.5s infinite;
        }
    </style>
    @endpush
@endif