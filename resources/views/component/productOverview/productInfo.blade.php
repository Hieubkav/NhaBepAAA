@php
    $product = \App\Models\Product::with(['versions', 'images'])->findOrFail($product_id);
    $versions = $product->versions->map(function($version) {
        return [
            'name' => $version->title,
            'image' => config('app.asset_url')."/storage/".$version->thumbnail,
            'isAvailable' => true
        ];
    });
@endphp

<div x-data="{
    versions: {{ json_encode($versions) }},
    selectedVersion: null,
    init() {
        if (this.versions.length > 0) {
            this.selectVersion(this.versions[0]);
        }
    },
    selectVersion(version) {
        this.selectedVersion = version;
        // Dispatch event để productImageGallery cập nhật ảnh
        window.dispatchEvent(new CustomEvent('version-changed', {
            detail: {
                image: version.image
            }
        }));
    }
}" class="space-y-8">
    <!-- Product Title -->
    <div class="p-6 rounded-xl bg-gradient-to-br from-gray-50 to-gray-100 shadow-[inset_-2px_-2px_5px_rgba(255,255,255,0.7),inset_2px_2px_5px_rgba(0,0,0,0.1)]">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
        <div class="flex flex-wrap gap-3">
            {{-- <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white shadow-[5px_5px_15px_rgba(0,0,0,0.1),-5px_-5px_15px_rgba(255,255,255,0.8)] text-red-700 transition-all duration-300 hover:shadow-[inset_5px_5px_10px_rgba(0,0,0,0.05),inset_-5px_-5px_10px_rgba(255,255,255,0.8)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                {{ $product->versions->count() }} Phiên bản
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white shadow-[5px_5px_15px_rgba(0,0,0,0.1),-5px_-5px_15px_rgba(255,255,255,0.8)] text-red-700 transition-all duration-300 hover:shadow-[inset_5px_5px_10px_rgba(0,0,0,0.05),inset_-5px_-5px_10px_rgba(255,255,255,0.8)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $product->images->count() }} Hình ảnh
            </span> --}}
            <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white shadow-[5px_5px_15px_rgba(0,0,0,0.1),-5px_-5px_15px_rgba(255,255,255,0.8)] text-red-700 transition-all duration-300 hover:shadow-[inset_5px_5px_10px_rgba(0,0,0,0.05),inset_-5px_-5px_10px_rgba(255,255,255,0.8)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Còn hàng
            </span>
        </div>
    </div>

    <!-- Product Versions -->
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-xl shadow-[inset_-2px_-2px_5px_rgba(255,255,255,0.7),inset_2px_2px_5px_rgba(0,0,0,0.1)]">
        <h2 class="text-lg font-semibold mb-4 text-gray-800">Chọn phiên bản</h2>
        <div class="flex flex-col space-y-2">
            <template x-for="version in versions" :key="version.name">
                <button @click="selectVersion(version)"
                    class="relative flex items-center p-2 rounded-lg transition-all duration-300 bg-white shadow-[5px_5px_15px_rgba(0,0,0,0.1),-5px_-5px_15px_rgba(255,255,255,0.8)] hover:shadow-[inset_5px_5px_10px_rgba(0,0,0,0.05),inset_-5px_-5px_10px_rgba(255,255,255,0.8)]"
                    :class="selectedVersion === version ? 'shadow-[inset_5px_5px_10px_rgba(0,0,0,0.05),inset_-5px_-5px_10px_rgba(255,255,255,0.8)] scale-[0.99] bg-gradient-to-r from-red-50 to-white' : ''">

                    <!-- Version Image -->
                    <div class="w-16 h-12 overflow-hidden rounded-lg flex-shrink-0">
                        <img :src="version.image" :alt="version.name"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>

                    <!-- Version Info -->
                    <div class="ml-3 flex-grow text-left">
                        <p class="font-medium text-gray-800" x-text="version.name"></p>
                        <div class="flex items-center">
                            <span x-show="version.isAvailable"
                                class="text-xs px-2 py-0.5 rounded-full bg-red-50 text-red-700">
                                Còn hàng
                            </span>
                        </div>
                    </div>

                    <!-- Selected Indicator -->
                    <div x-show="selectedVersion === version"
                        class="ml-2 bg-gradient-to-br from-red-500 to-red-600 text-white p-1.5 rounded-full shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </button>
            </template>
        </div>
    </div>

    <!-- Contact Button -->
    <div class="mt-8">
        <a href="https://zalo.me/{{ config('app.phone_number') }}" target="_blank" 
            class="group relative inline-flex w-full items-center justify-center overflow-hidden rounded-xl bg-gradient-to-r from-red-600 to-red-500 px-8 py-4 text-white shadow-lg transition-all duration-300 hover:shadow-[inset_2px_2px_5px_rgba(0,0,0,0.2)] hover:scale-[0.98]">
            <span class="text-base font-semibold transition-all duration-300 group-hover:mr-4">
                Liên hệ Zalo tư vấn ngay
            </span>
        </a>        
    </div>
</div>
