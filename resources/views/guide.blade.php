<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hướng dẫn sử dụng - Nhà Bếp AAA</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Hướng dẫn sử dụng phần mềm quản lý Nhà Bếp AAA</h1>

        <!-- Giới thiệu -->
        <section class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Giới thiệu chung</h2>
            <p class="text-gray-600 mb-4">Phần mềm quản lý Nhà Bếp AAA được thiết kế để giúp bạn quản lý hiệu quả danh mục sản phẩm, thông tin sản phẩm và các phiên bản sản phẩm một cách dễ dàng và chuyên nghiệp.</p>
        </section>

        <!-- Quản lý Danh mục -->
        <section class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">1. Quản lý Danh mục</h2>

            <div class="space-y-4">
                <h3 class="text-xl font-medium text-gray-700">1.1. Xem danh sách danh mục</h3>
                <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                    <li>Truy cập menu "Danh mục" từ thanh điều hướng bên trái</li>
                    <li>Bảng hiển thị các thông tin: Tên danh mục, Số lượng sản phẩm, Trạng thái hiển thị, Ngày tạo</li>
                    <li>Có thể sắp xếp theo các cột bằng cách click vào tiêu đề cột</li>
                    <li>Tìm kiếm danh mục bằng cách nhập từ khóa vào ô tìm kiếm</li>
                </ul>

                <h3 class="text-xl font-medium text-gray-700 mt-6">1.2. Thêm danh mục mới</h3>
                <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                    <li>Click nút "Tạo danh mục" ở góc phải</li>
                    <li>Điền các thông tin bắt buộc:
                        <ul class="list-circle list-inside ml-6 mt-2">
                            <li>Tên danh mục</li>
                            <li>Mô tả (tùy chọn)</li>
                            <li>Trạng thái hiển thị</li>
                        </ul>
                    </li>
                    <li>Click "Tạo" để lưu danh mục mới</li>
                </ul>

                <h3 class="text-xl font-medium text-gray-700 mt-6">1.3. Quản lý sản phẩm trong danh mục</h3>
                <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                    <li>Click vào nút "Chỉnh sửa" của danh mục</li>
                    <li>Tab "Sản phẩm" hiển thị các sản phẩm trong danh mục</li>
                    <li>Có thể thêm sản phẩm vào danh mục bằng 2 cách:
                        <ul class="list-circle list-inside ml-6 mt-2">
                            <li>"Thêm sản phẩm": Tạo sản phẩm mới</li>
                            <li>"Liên kết sản phẩm": Thêm sản phẩm có sẵn vào danh mục</li>
                        </ul>
                    </li>
                    <li>Có thể gỡ sản phẩm khỏi danh mục hoặc xóa sản phẩm</li>
                </ul>
            </div>
        </section>

        <!-- Quản lý Sản phẩm -->
        <section class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">2. Quản lý Sản phẩm</h2>

            <div class="space-y-4">
                <h3 class="text-xl font-medium text-gray-700">2.1. Xem danh sách sản phẩm</h3>
                <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                    <li>Truy cập menu "Sản phẩm" từ thanh điều hướng</li>
                    <li>Bảng hiển thị: Tên sản phẩm, Danh mục, Số phiên bản, Trạng thái, Ngày tạo</li>
                    <li>Có thể lọc sản phẩm theo:
                        <ul class="list-circle list-inside ml-6 mt-2">
                            <li>Danh mục</li>
                            <li>Trạng thái hiển thị</li>
                        </ul>
                    </li>
                </ul>

                <h3 class="text-xl font-medium text-gray-700 mt-6">2.2. Thêm sản phẩm mới</h3>
                <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                    <li>Click "Tạo sản phẩm"</li>
                    <li>Điền thông tin sản phẩm:
                        <ul class="list-circle list-inside ml-6 mt-2">
                            <li>Tên sản phẩm (bắt buộc)</li>
                            <li>Mô tả chi tiết (bắt buộc)</li>
                            <li>Chọn danh mục</li>
                            <li>Trạng thái hiển thị</li>
                        </ul>
                    </li>
                    <li>Có thể tạo danh mục mới ngay trong form bằng nút "+" bên cạnh ô chọn danh mục</li>
                </ul>

                <h3 class="text-xl font-medium text-gray-700 mt-6">2.3. Quản lý phiên bản sản phẩm</h3>
                <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                    <li>Trong trang chi tiết sản phẩm, tab "Phiên bản" cho phép:
                        <ul class="list-circle list-inside ml-6 mt-2">
                            <li>Thêm phiên bản mới với tên và hình ảnh</li>
                            <li>Chỉnh sửa thông tin phiên bản</li>
                            <li>Xóa phiên bản</li>
                        </ul>
                    </li>
                </ul>

                <h3 class="text-xl font-medium text-gray-700 mt-6">2.4. Quản lý hình ảnh sản phẩm</h3>
                <ul class="list-disc list-inside text-gray-600 ml-4 space-y-2">
                    <li>Tab "Hình ảnh" cho phép:
                        <ul class="list-circle list-inside ml-6 mt-2">
                            <li>Thêm nhiều hình ảnh cho sản phẩm</li>
                            <li>Sắp xếp thứ tự hiển thị</li>
                            <li>Xóa hình ảnh không cần thiết</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Lưu ý quan trọng -->
        <section class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">3. Lưu ý quan trọng</h2>

            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                <div class="flex">
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Những điểm cần lưu ý:</h3>
                        <ul class="mt-2 text-sm text-yellow-700 list-disc list-inside space-y-1">
                            <li>Luôn kiểm tra kỹ thông tin trước khi tạo mới hoặc cập nhật</li>
                            <li>Nên đặt tên sản phẩm và danh mục rõ ràng, dễ hiểu</li>
                            <li>Hình ảnh nên có kích thước phù hợp và chất lượng tốt</li>
                            <li>Thường xuyên kiểm tra và cập nhật trạng thái hiển thị của sản phẩm</li>
                            <li>Sao lưu dữ liệu định kỳ để đảm bảo an toàn</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <footer class="text-center text-gray-500 text-sm">
            <p>Nếu cần hỗ trợ thêm, vui lòng liên hệ đội ngũ kỹ thuật</p>
        </footer>
    </div>
</body>
</html>
