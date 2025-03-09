<div x-data="{
    versions: [
        {
            name: 'Kệ dao thớt cơ bản',
            image: '{{ asset('images/pic/KỆ DAO THỚT.webp') }}',
            price: '350.000đ',
            isAvailable: true
        },
        {
            name: 'Kệ dao thớt cao cấp',
            image: '{{ asset('images/pic/KỆ DAO THỚT (2).webp') }}',
            price: '450.000đ',
            isAvailable: true
        }
    ],
    selectedVersion: null,
    init() {
        this.selectedVersion = this.versions[0];
        this.$dispatch('version-selected', { image: this.selectedVersion.image });
    },
    selectVersion(version) {
        this.selectedVersion = version;
        this.$dispatch('version-selected', { image: version.image });
    }
}" class="space-y-8">
    <!-- Product Title -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Kệ dao thớt đa năng AAA</h1>
        <div class="flex items-center space-x-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                2 Phiên bản
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
                        <div class="mt-1 flex justify-between items-center">
                            <span class="text-blue-600 font-semibold" x-text="version.price"></span>
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
        <a href="#contact" class="bg-furniture group relative inline-flex w-full items-center justify-center overflow-hidden rounded-lg bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-4 text-white shadow-md transition duration-300 ease-out hover:scale-[1.02]">
            <span class="text-base font-semibold transition-all duration-300 group-hover:mr-4">
                Liên hệ tư vấn ngay
            </span>
        </a>
    </div>
</div>
