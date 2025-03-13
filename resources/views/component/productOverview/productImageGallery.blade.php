@php
    $product = \App\Models\Product::with('images')->findOrFail($product_id);
@endphp
<div x-data="{
    mainImage: '{{$product->images->first() ? config('app.asset_url')."/storage/".$product->images->first()->url : "" }}',
    thumbnails: {{ json_encode($product->images->map(fn($image) => config('app.asset_url')."/storage/".$image->url)->toArray()) }},
    showModal: false,
    currentIndex: 0,
    changeImage(image, index) {
        this.mainImage = image;
        this.currentIndex = index;
    },
    previousImage() {
        this.currentIndex = (this.currentIndex - 1 + this.thumbnails.length) % this.thumbnails.length;
        this.mainImage = this.thumbnails[this.currentIndex];
    },
    nextImage() {
        this.currentIndex = (this.currentIndex + 1) % this.thumbnails.length;
        this.mainImage = this.thumbnails[this.currentIndex];
    },
    handleSwipe: {
        ['@touchstart'](e) { this.touchstartX = e.changedTouches[0].screenX },
        ['@touchend'](e) {
            const touchendX = e.changedTouches[0].screenX;
            const diff = touchendX - this.touchstartX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) this.previousImage();
                else this.nextImage();
            }
        }
    },
    closeModal(e) {
        if (e.target.classList.contains('modal-backdrop')) {
            this.showModal = false;
        }
    },
    init() {
        window.addEventListener('version-changed', (e) => {
            this.mainImage = e.detail.image;
        });
    }
}" class="space-y-6">
    <!-- Main Image with Modal -->
    <div class="relative group">
        <img :src="mainImage" :alt="'{{ $product->name }}'"
            class="w-full h-[300px] sm:h-[400px] md:h-[500px] object-cover rounded-xl shadow-lg cursor-zoom-in transition duration-300 ease-in-out hover:shadow-xl"
            @click="showModal = true">

        <!-- Zoom Icon -->
        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm p-2.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
            </svg>
        </div>
    </div>

    <!-- Thumbnails -->
    <div x-show="thumbnails.length > 1">
        <div class="grid grid-cols-4 sm:grid-cols-4 gap-3 sm:gap-4 px-2">
            <template x-for="(thumb, index) in thumbnails" :key="index">
                <button @click="changeImage(thumb, index)"
                    class="relative overflow-hidden rounded-lg aspect-square group"
                    :class="{'ring-2 ring-primary-500 ring-offset-2': mainImage === thumb}">
                    <img :src="thumb" :alt="'{{ $product->name }} - ' + (index + 1)"
                        class="w-full h-full object-cover transform transition-all duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                </button>
            </template>
        </div>
    </div>

    <!-- Image Modal -->
    <div x-show="showModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center modal-backdrop bg-black/90 backdrop-blur-sm"
        @click="closeModal">

        <div class="relative w-full max-w-6xl mx-auto p-4 h-[80vh] flex items-center justify-center" x-bind="handleSwipe" @click.stop>
            <!-- Close Button -->
            <button @click="showModal = false"
                class="absolute top-4 right-4 z-10 bg-white/90 backdrop-blur-sm p-3 rounded-full shadow-lg hover:bg-white/100 transition-all duration-300 transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Navigation Buttons -->
            <button @click="previousImage" x-show="thumbnails.length > 1"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 backdrop-blur-sm p-3 rounded-full shadow-lg hover:bg-white/100 transition-all duration-300 transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button @click="nextImage" x-show="thumbnails.length > 1"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 backdrop-blur-sm p-3 rounded-full shadow-lg hover:bg-white/100 transition-all duration-300 transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Modal Image -->
            <img :src="mainImage" :alt="'{{ $product->name }}'"
                class="max-h-[80vh] w-auto object-contain mx-auto rounded-lg shadow-2xl">

            <!-- Thumbnails in Modal -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2" x-show="thumbnails.length > 1">
                <div class="flex space-x-2 bg-white/90 backdrop-blur-sm p-2 rounded-full">
                    <template x-for="(thumb, index) in thumbnails" :key="index">
                        <button @click="changeImage(thumb, index)"
                            class="w-3 h-3 rounded-full transition-all duration-300"
                            :class="currentIndex === index ? 'bg-primary-500 scale-125' : 'bg-gray-400 hover:bg-gray-600'">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
