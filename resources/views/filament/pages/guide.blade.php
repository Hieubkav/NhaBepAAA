<x-filament-panels::page>
    <div class="grid gap-6 md:grid-cols-2">
        {{-- Module Danh mục --}}
        <div class="col-span-2">
            <x-filament::section>
                <x-slot name="heading">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-folder class="w-6 h-6 text-primary-500"/>
                        <span class="text-primary-600 dark:text-primary-400 font-bold text-2xl">Module Quản lý danh mục</span>
                    </div>
                </x-slot>

                <div class="prose dark:prose-invert max-w-none">
                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                            <div class="flex items-center gap-2 mb-4">
                                <x-heroicon-o-plus-circle class="w-5 h-5 text-success-500"/>
                                <h3 class="text-success-600 dark:text-success-400 m-0">1. Thêm danh mục mới</h3>
                            </div>
                            <ul class="space-y-4 m-0 p-0 list-none">
                                <li class="flex gap-3">
                                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-primary-50 dark:bg-primary-900 text-primary-500 font-semibold">1</span>
                                    <div>
                                        <p class="m-0">Click vào nút <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-success-50 dark:bg-success-900/50 text-success-600 dark:text-success-400 font-medium"><x-heroicon-o-plus-circle class="w-4 h-4"/> Tạo danh mục</span></p>
                                    </div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-primary-50 dark:bg-primary-900 text-primary-500 font-semibold">2</span>
                                    <div>
                                        <p class="m-0">Điền tên danh mục - đây là tên sẽ hiển thị trên website</p>
                                    </div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-primary-50 dark:bg-primary-900 text-primary-500 font-semibold">3</span>
                                    <div>
                                        <p class="m-0">Tải lên hình ảnh đại diện cho danh mục</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Kéo thả hoặc click để chọn file</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                            <div class="flex items-center gap-2 mb-4">
                                <x-heroicon-o-pencil class="w-5 h-5 text-warning-500"/>
                                <h3 class="text-warning-600 dark:text-warning-400 m-0">2. Chỉnh sửa & Xóa</h3>
                            </div>
                            <div class="space-y-6">
                                <div class="space-y-4">
                                    <p class="font-medium text-gray-900 dark:text-gray-100">Chỉnh sửa danh mục:</p>
                                    <ul class="space-y-2 m-0 p-0 list-none">
                                        <li class="flex items-center gap-2">
                                            <x-heroicon-o-pencil class="w-4 h-4 text-warning-500"/>
                                            <span>Click icon bút chì để sửa</span>
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <x-heroicon-o-arrow-path class="w-4 h-4 text-warning-500"/>
                                            <span>Cập nhật thông tin</span>
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <x-heroicon-o-check-circle class="w-4 h-4 text-warning-500"/>
                                            <span>Click "Lưu" để hoàn tất</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="space-y-4">
                                    <p class="font-medium text-gray-900 dark:text-gray-100">Xóa danh mục:</p>
                                    <div class="rounded-lg bg-danger-50 dark:bg-danger-900/50 p-4">
                                        <div class="flex items-center gap-2 text-danger-600 dark:text-danger-400">
                                            <x-heroicon-o-exclamation-triangle class="w-5 h-5"/>
                                            <p class="font-medium m-0">Lưu ý quan trọng</p>
                                        </div>
                                        <p class="text-sm text-danger-600 dark:text-danger-400 mt-2 mb-0">Xóa danh mục sẽ ảnh hưởng đến các sản phẩm thuộc danh mục đó!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-filament::section>
        </div>

        {{-- Module Sản phẩm --}}
        <div class="col-span-2 md:col-span-1">
            <x-filament::section>
                <x-slot name="heading">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-cube class="w-6 h-6 text-primary-500"/>
                        <span class="text-primary-600 dark:text-primary-400 font-bold text-2xl">Module Sản phẩm</span>
                    </div>
                </x-slot>

                <div class="prose dark:prose-invert max-w-none">
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                            <div class="flex items-center gap-2 mb-4">
                                <x-heroicon-o-plus-circle class="w-5 h-5 text-success-500"/>
                                <h3 class="text-success-600 dark:text-success-400 m-0">Thêm sản phẩm mới</h3>
                            </div>
                            <div class="grid gap-4">
                                <div class="flex items-center gap-2 p-3 rounded-lg bg-gray-50 dark:bg-gray-900">
                                    <span class="font-medium">Tên sản phẩm:</span>
                                    <span class="text-sm">Nhập tên hiển thị của sản phẩm</span>
                                </div>
                                <div class="flex items-center gap-2 p-3 rounded-lg bg-gray-50 dark:bg-gray-900">
                                    <span class="font-medium">Danh mục:</span>
                                    <span class="text-sm">Chọn danh mục phù hợp</span>
                                </div>
                                <div class="flex items-center gap-2 p-3 rounded-lg bg-gray-50 dark:bg-gray-900">
                                    <span class="font-medium">Hình ảnh:</span>
                                    <span class="text-sm">Tải lên nhiều hình ảnh sản phẩm</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-info-50 dark:bg-info-900/50 rounded-lg p-4">
                            <div class="flex items-center gap-2">
                                <x-heroicon-o-information-circle class="w-5 h-5 text-info-500"/>
                                <p class="font-medium text-info-600 dark:text-info-400 m-0">Mẹo quản lý hình ảnh</p>
                            </div>
                            <ul class="mt-2 space-y-2 text-info-600 dark:text-info-400">
                                <li class="flex items-center gap-2">
                                    <x-heroicon-o-arrows-pointing-out class="w-4 h-4"/>
                                    <span>Kéo thả để sắp xếp hình ảnh</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <x-heroicon-o-photo class="w-4 h-4"/>
                                    <span>Nên dùng hình ảnh chất lượng cao</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </x-filament::section>
        </div>

        {{-- Module Người dùng & Cài đặt --}}
        <div class="col-span-2 md:col-span-1">
            <div class="space-y-6">
                <x-filament::section>
                    <x-slot name="heading">
                        <div class="flex items-center gap-2">
                            <x-heroicon-o-users class="w-6 h-6 text-primary-500"/>
                            <span class="text-primary-600 dark:text-primary-400 font-bold text-2xl">Quản lý người dùng</span>
                        </div>
                    </x-slot>

                    <div class="prose dark:prose-invert max-w-none">
                        <div class="bg-warning-50 dark:bg-warning-900/50 rounded-lg p-4">
                            <div class="flex items-center gap-2">
                                <x-heroicon-o-shield-check class="w-5 h-5 text-warning-500"/>
                                <p class="font-medium text-warning-600 dark:text-warning-400 m-0">Bảo mật</p>
                            </div>
                            <ul class="mt-2 space-y-2 text-warning-600 dark:text-warning-400">
                                <li class="flex items-center gap-2">
                                    <x-heroicon-o-key class="w-4 h-4"/>
                                    <span>Mật khẩu phải đủ mạnh</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <x-heroicon-o-user-group class="w-4 h-4"/>
                                    <span>Chỉ cấp quyền cho người được ủy quyền</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </x-filament::section>

                <x-filament::section>
                    <x-slot name="heading">
                        <div class="flex items-center gap-2">
                            <x-heroicon-o-cog-6-tooth class="w-6 h-6 text-primary-500"/>
                            <span class="text-primary-600 dark:text-primary-400 font-bold text-2xl">Cài đặt hệ thống</span>
                        </div>
                    </x-slot>

                    <div class="prose dark:prose-invert max-w-none">
                        <div class="grid gap-4">
                            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-white m-0">Thông tin cơ bản</h4>
                                <ul class="mt-2 space-y-2 text-sm">
                                    <li class="flex items-center gap-2">
                                        <x-heroicon-o-building-storefront class="w-4 h-4 text-primary-500"/>
                                        <span>Tên thương hiệu & Slogan</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <x-heroicon-o-photo class="w-4 h-4 text-primary-500"/>
                                        <span>Logo thương hiệu</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                                <h4 class="text-lg font-medium text-gray-900 dark:text-white m-0">Liên hệ & Mạng xã hội</h4>
                                <ul class="mt-2 space-y-2 text-sm">
                                    <li class="flex items-center gap-2">
                                        <x-heroicon-o-envelope class="w-4 h-4 text-primary-500"/>
                                        <span>Email & Số điện thoại</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <x-heroicon-o-map-pin class="w-4 h-4 text-primary-500"/>
                                        <span>Địa chỉ & Bản đồ</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <x-heroicon-o-chat-bubble-left-right class="w-4 h-4 text-primary-500"/>
                                        <span>Zalo & Facebook</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </x-filament::section>
            </div>
        </div>
    </div>
</x-filament-panels::page>
