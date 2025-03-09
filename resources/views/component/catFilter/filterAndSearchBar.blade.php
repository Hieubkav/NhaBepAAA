<!-- Filter và Search Bar -->
<div class="bg-white border border-gray-light/20 rounded-lg shadow-sm p-4 mb-6"
    x-data="{
        selectedCategories: [],
        categories: ['cat1', 'cat2', 'cat3', 'cat4'],
        isCategorySelected(cat) {
            return this.selectedCategories.includes(cat);
        }
    }">
    <div class="flex flex-col md:flex-row gap-4 items-start">
        <!-- Categories Filter -->
        <div class="w-full md:w-1/3">
            <label class="block text-furniture-DEFAULT text-xs font-medium mb-2">
                Danh mục sản phẩm
            </label>
            <div class="flex flex-wrap gap-2">
                <button
                    @click="isCategorySelected('cat1') ? selectedCategories = selectedCategories.filter(c => c !== 'cat1') : selectedCategories.push('cat1')"
                    :class="{'bg-red-500 text-white': isCategorySelected('cat1'), 'bg-gray-100 text-gray-700': !isCategorySelected('cat1')}"
                    class="px-3 py-1 rounded-full text-sm font-medium transition-colors duration-200">
                    Kệ bát đĩa
                </button>
                <button
                    @click="isCategorySelected('cat2') ? selectedCategories = selectedCategories.filter(c => c !== 'cat2') : selectedCategories.push('cat2')"
                    :class="{'bg-red-500 text-white': isCategorySelected('cat2'), 'bg-gray-100 text-gray-700': !isCategorySelected('cat2')}"
                    class="px-3 py-1 rounded-full text-sm font-medium transition-colors duration-200">
                    Kệ gia vị
                </button>
                <button
                    @click="isCategorySelected('cat3') ? selectedCategories = selectedCategories.filter(c => c !== 'cat3') : selectedCategories.push('cat3')"
                    :class="{'bg-red-500 text-white': isCategorySelected('cat3'), 'bg-gray-100 text-gray-700': !isCategorySelected('cat3')}"
                    class="px-3 py-1 rounded-full text-sm font-medium transition-colors duration-200">
                    Kệ dao thớt
                </button>
                <button
                    @click="isCategorySelected('cat4') ? selectedCategories = selectedCategories.filter(c => c !== 'cat4') : selectedCategories.push('cat4')"
                    :class="{'bg-red-500 text-white': isCategorySelected('cat4'), 'bg-gray-100 text-gray-700': !isCategorySelected('cat4')}"
                    class="px-3 py-1 rounded-full text-sm font-medium transition-colors duration-200">
                    Tủ đồ khô
                </button>
            </div>
        </div>

        <!-- Sort Filter -->
        <div class="w-full md:w-1/3">
            <label class="block text-furniture-DEFAULT text-xs font-medium mb-2" for="sortBy">
                Sắp xếp theo
            </label>
            <select x-model="sortBy"
                class="form-select w-full rounded-md border-gray-light/30 shadow-xs focus:border-furniture-light focus:ring-0 hover:border-furniture-light/50 transition-colors"
                id="sortBy">
                <option value="newest">Mới nhất</option>
                <option value="oldest">Cũ nhất</option>
                <option value="asc">Tên A-Z</option>
                <option value="desc">Tên Z-A</option>
            </select>
        </div>

        <!-- Search Bar -->
        <div class="w-full md:w-1/3">
            <label class="block text-furniture-DEFAULT text-xs font-medium mb-2" for="search">
                Tìm kiếm sản phẩm
            </label>
            <div class="relative">
                <input x-model="search"
                    type="text"
                    id="search"
                    class="form-input w-full pl-8 rounded-md border-gray-light/30 shadow-xs focus:border-furniture-light focus:ring-0 hover:border-furniture-light/50 transition-colors"
                    placeholder="Nhập tên sản phẩm...">
                <span class="absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>

    <!-- Product Count -->
    <div class="mt-4 text-xs text-gray border-t border-gray-light/20 pt-4">
        Hiển thị <span class="font-medium text-furniture-DEFAULT" x-text="displayedCount"></span> trên <span class="font-medium text-furniture-DEFAULT" x-text="productCount"></span> sản phẩm
    </div>
</div>
