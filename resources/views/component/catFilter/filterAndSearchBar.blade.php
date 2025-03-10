<!-- Filter và Search Bar -->
<div class="bg-white border border-gray-light/20 rounded-lg shadow-sm p-3 md:p-4 mb-6"
    x-data="{
        displayedCount: {{ $products->count() }},
        totalCount: {{ $products->count() }},
        sortBy: 'newest',
        selectedCategories: [],
        toggleCategory(catId) {
            const index = this.selectedCategories.indexOf(catId);
            if (index === -1) {
                this.selectedCategories.push(catId);
            } else {
                this.selectedCategories.splice(index, 1);
            }
        },
        isCategorySelected(catId) {
            return this.selectedCategories.includes(catId);
        }
    }">
    <!-- Grid Container -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-3 md:gap-6 items-start md:items-center">
        <!-- Sort Filter -->
        <div class="col-span-1 md:col-span-2">
            <label class="block text-furniture-DEFAULT text-xs font-medium mb-1.5 md:mb-2" for="sortBy">
                Sắp xếp theo
            </label>
            <select x-model="sortBy"
                class="form-select w-full text-sm rounded-md border-gray-light/30 shadow-xs focus:border-furniture-light focus:ring-0 hover:border-furniture-light/50 transition-colors"
                id="sortBy">
                <option value="newest">Mới nhất</option>
                <option value="oldest">Cũ nhất</option>
                <option value="asc">Tên A-Z</option>
                <option value="desc">Tên Z-A</option>
            </select>
        </div>

        <!-- Category Buttons -->
        <div class="col-span-1 md:col-span-7">
            <label class="block text-furniture-DEFAULT text-xs font-medium mb-1.5 md:mb-2">
                Chọn danh mục
            </label>
            <div class="flex flex-wrap gap-1.5 md:gap-2">
                @foreach($cats as $cat)
                    <button
                        @click="toggleCategory({{ $cat->id }})"
                        :class="{'bg-red-500 text-white': isCategorySelected({{ $cat->id }}), 'bg-gray-100 text-gray-700 hover:bg-gray-200': !isCategorySelected({{ $cat->id }})}"
                        class="px-2 md:px-3 py-1 md:py-1.5 rounded-md text-xs md:text-sm font-medium transition-colors duration-200 whitespace-nowrap">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Search Bar -->
        <div class="col-span-1 md:col-span-3">
            <label class="block text-furniture-DEFAULT text-xs font-medium mb-1.5 md:mb-2" for="search">
                Tìm kiếm
            </label>
            <div class="relative">
                <input x-model="search"
                    type="text"
                    id="search"
                    class="form-input w-full pl-7 text-sm rounded-md border-gray-light/30 shadow-xs focus:border-furniture-light focus:ring-0 hover:border-furniture-light/50 transition-colors"
                    placeholder="Nhập tên sản phẩm...">
                <span class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>

    <!-- Product Count -->
    <div class="mt-3 md:mt-4 text-xs text-gray border-t border-gray-light/20 pt-3 md:pt-4">
        Hiển thị <span class="font-medium text-furniture-DEFAULT" x-text="displayedCount"></span> trên <span class="font-medium text-furniture-DEFAULT" x-text="totalCount"></span> sản phẩm
    </div>
</div>
