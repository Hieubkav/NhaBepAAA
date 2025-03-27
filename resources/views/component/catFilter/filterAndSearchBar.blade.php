<!-- Filter và Search Bar -->
<div class="bg-white border border-gray-100/50 rounded-[2rem] shadow-sm p-4 md:p-6 mb-6">
    <!-- Grid Container -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-6 items-start">
        <!-- Sort Filter -->
        <div class="col-span-1 md:col-span-2">
            <label class="block text-gray-600 text-sm font-medium mb-2" for="sortBy">
                Sắp xếp theo
            </label>
            <select wire:model.live="sortBy"
                class="form-select w-full text-sm rounded-full border-gray-200 shadow-sm focus:border-red-300 focus:ring-2 focus:ring-red-100 hover:border-red-200 transition-all duration-300"
                id="sortBy">
                <option value="newest">Mới nhất</option>
                <option value="oldest">Cũ nhất</option>
                <option value="asc">Tên A-Z</option>
                <option value="desc">Tên Z-A</option>
            </select>
        </div>

        <!-- Search Bar -->
        <div class="col-span-1 md:col-span-3">
            <label class="block text-gray-600 text-sm font-medium mb-2" for="search">
                Tìm kiếm
            </label>
            <div class="relative group">
                <input wire:model.live="search"
                    type="text"
                    id="search"
                    class="form-input w-full pl-10 text-sm rounded-full border-gray-200 shadow-sm focus:border-red-300 focus:ring-2 focus:ring-red-100 group-hover:border-red-200 transition-all duration-300"
                    placeholder="Nhập tên sản phẩm..."
                    value="{{ $search }}">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-red-400 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Filter Groups -->
        <div class="col-span-1 md:col-span-7 space-y-4">
            <!-- Sections -->
            <div>
                <label class="block text-gray-600 text-sm font-medium mb-2">
                    Chọn nhóm mục
                </label>
                <div class="flex flex-wrap gap-2">
                    @foreach($sections as $section)
                        <button wire:click="toggleSection({{ $section->id }})"
                            class="group relative px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 transform hover:-translate-y-0.5
                            {{ in_array($section->id, $selectedSections) 
                                ? 'bg-red-500 text-white shadow-md scale-105' 
                                : 'bg-gray-50 text-gray-600 hover:bg-red-50 hover:text-red-500 border border-transparent hover:border-red-100' }}">
                            {{ $section->title }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Categories -->
            <div class="pt-2">
                <label class="block text-gray-600 text-sm font-medium mb-2">
                    Chọn danh mục cụ thể
                </label>
                <div class="flex flex-wrap gap-2">
                    @foreach($cats as $cat)
                        <button wire:click="toggleCategory({{ $cat->id }})"
                            class="px-3 py-1.5 rounded-full text-sm font-medium transition-all duration-300
                            {{ in_array($cat->id, $selectedCategories) 
                                ? 'bg-red-100 text-red-600 shadow-sm border border-red-200' 
                                : 'bg-gray-50 text-gray-600 hover:bg-gray-100 border border-transparent hover:border-gray-200' }}">
                            {{ $cat->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Product Count & Clear Filters -->
    <div class="mt-6 text-sm text-gray-500 border-t border-gray-100 pt-4 flex flex-col md:flex-row gap-3 justify-between items-center">
        <div>
            Hiển thị <span class="font-medium text-red-600">{{ $products->count() }}</span> sản phẩm
        </div>
        @if($search || count($selectedCategories) > 0 || count($selectedSections) > 0 || $sortBy !== 'newest')
            <button wire:click="clearFilters" 
                class="px-4 py-2 rounded-full text-red-500 hover:text-red-600 hover:bg-red-50 font-medium flex items-center gap-2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Xóa bộ lọc
            </button>
        @endif
    </div>
</div>
