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
    <div>
        <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
        <div class="flex items-center space-x-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                {{ $product->versions->count() }} Phiên bản
            </span>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $product->images->count() }} Hình ảnh
            </span>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Còn hàng
            </span>
        </div>
    </div>

    <!-- Product Versions -->
    <div>
        <h2 class="text-lg font-semibold mb-4">Chọn phiên bản</h2>
        <div class="grid grid-cols-2 gap-4">
            <template x-for="version in versions" :key="version.name">
                <button @click="selectVersion(version)"
                    class="relative group overflow-hidden rounded-lg border-2 transition-all duration-300"
                    :class="selectedVersion === version ? 'border-blue-500 ring-2 ring-blue-300 ring-offset-2' : 'border-gray-200 hover:border-gray-300'">

                    <!-- Version Image -->
                    <div class="aspect-video overflow-hidden bg-gray-100">
                        <img :src="version.image" :alt="version.name"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>

                    <!-- Version Info -->
                    <div class="p-3 bg-white">
                        <p class="font-medium text-gray-900" x-text="version.name"></p>
                        <div class="mt-1 flex items-center">
                            <span x-text="version.name"></span>
                            <span x-show="version.isAvailable"
                                class="text-xs px-2 py-1 rounded-full bg-green-50 text-green-600">
                                Còn hàng
                            </span>
                        </div>
                    </div>

                    <!-- Selected Indicator -->
                    <div x-show="selectedVersion === version"
                        class="absolute top-2 right-2 bg-blue-500 text-white p-1.5 rounded-full shadow-lg">
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
        <a href="https://zalo.me/{{ config('app.phone_number') }}" target="_blank" class="bg-furniture group relative inline-flex w-full items-center justify-center overflow-hidden rounded-lg bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-4 text-white shadow-md transition duration-300 ease-out hover:scale-[1.02]">
            <span class="text-base font-semibold transition-all duration-300 group-hover:mr-4">
                Liên hệ Zalo tư vấn ngay
            </span>
        </a>        
    </div>
</div>
