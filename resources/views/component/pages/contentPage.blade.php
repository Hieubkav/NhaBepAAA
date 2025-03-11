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
                </div>
            @else
                <div class="p-6 text-gray-500 text-center">
                    <p>Nội dung đang được cập nhật...</p>
                </div>
            @endif
        </div>
    </div>
</div>