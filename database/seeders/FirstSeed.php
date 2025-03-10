<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Product;
use App\Models\User;
use App\Models\Setting;
use App\Models\Version;
use App\Models\Image;
use Illuminate\Database\Seeder;

class FirstSeed extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Tạo tài khoản quản trị
        User::create([
            'name' => 'Admin',
            'email' => 'tranmanhhieu10@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        // Tạo thông tin cơ bản của website
        Setting::create([
            'brand_name' => 'Nhà Bếp AAA',
            'solgan' => 'Giải Pháp Thông Minh Cho Căn Bếp Của Bạn',
            'email' => 'contact@nhabelpaaa.com',
            'sdt' => '0123.456.789',
            'address' => '123 Đường ABC, Quận XYZ, TP.HCM',
            'facebook' => 'https://facebook.com/nhabepaaa',
            'zalo' => '0123456789',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3...', // Google Maps Embed URL
        ]);

        // Tạo danh mục sản phẩm
        $keTM = Cat::create([
            'name' => 'Kệ thông minh',
            'description' => 'Các loại kệ thông minh cho nhà bếp',
            'is_visible' => true,
        ]);

        $phuKien = Cat::create([
            'name' => 'Phụ kiện bếp',
            'description' => 'Các phụ kiện tiện ích cho nhà bếp',
            'is_visible' => true,
        ]);

        // Tạo sản phẩm và phiên bản
        $products = [
            [
                'name' => 'Kệ bát đĩa nâng hạ AAA',
                'description' => 'Kệ bát đĩa thông minh với cơ chế nâng hạ giúp việc lấy đồ dễ dàng, phù hợp mọi không gian bếp.',
                'cat_id' => $keTM->id,
                'versions' => [
                    [
                        'title' => 'Kệ bát đĩa nâng hạ AAA - Màu Trắng',
                        'thumbnail' => 'images/pic/KỆ NÂNG HẠ AAA - HAI KHAY HỨNG NƯỚC _ MÀU TRẮNG.webp'
                    ],
                    [
                        'title' => 'Kệ bát đĩa nâng hạ AAA - Màu Xám',
                        'thumbnail' => 'images/pic/KỆ NÂNG HẠ AAA - GREY.webp'
                    ],
                    [
                        'title' => 'Kệ bát đĩa nâng hạ AAA - Màu Bạc',
                        'thumbnail' => 'images/pic/KỆ NÂNG HẠ AAA - SLIVER.webp'
                    ]
                ],
                'images' => [
                    'images/pic/Giá bát đĩa nâng hạ AAA.webp',
                    'images/pic/Giá bát đĩa nâng hạ AAA (2).webp',
                    'images/pic/Giá bát đĩa nâng hạ AAA - Khay đũa.webp',
                    'images/pic/Giá bát đĩa nâng hạ AAA - Khay đũa (2).webp'
                ]
            ],
            [
                'name' => 'Kệ dao thớt AAA',
                'description' => 'Kệ dao thớt thông minh giúp sắp xếp và bảo quản dao thớt gọn gàng, khoa học.',
                'cat_id' => $keTM->id,
                'versions' => [
                    [
                        'title' => 'Kệ dao thớt AAA - Cơ bản',
                        'thumbnail' => 'images/pic/KỆ DAO THỚT.webp'
                    ],
                    [
                        'title' => 'Kệ dao thớt AAA - Nâng cao',
                        'thumbnail' => 'images/pic/KỆ DAO THỚT (2).webp'
                    ]
                ],
                'images' => [
                    'images/pic/KỆ DAO THỚT.webp',
                    'images/pic/KỆ DAO THỚT (2).webp',
                    'images/pic/KỆ DAO THỚT (3).webp',
                    'images/pic/KỆ DAO THỚT (4).webp',
                    'images/pic/BẢNG VẼ KỆ DAO THỚT.webp'
                ]
            ],
            [
                'name' => 'Kệ chai lọ AAA',
                'description' => 'Kệ đựng chai lọ, gia vị nhà bếp với thiết kế thông minh, tiết kiệm không gian.',
                'cat_id' => $keTM->id,
                'versions' => [
                    [
                        'title' => 'Kệ chai lọ AAA - Tiêu chuẩn',
                        'thumbnail' => 'images/pic/KỆ CHAI LỌ.webp'
                    ],
                    [
                        'title' => 'Kệ chai lọ AAA - Mở rộng',
                        'thumbnail' => 'images/pic/KỆ CHAI LỌ (2).webp'
                    ]
                ],
                'images' => [
                    'images/pic/KỆ CHAI LỌ.webp',
                    'images/pic/KỆ CHAI LỌ (2).webp',
                    'images/pic/BẢNG VẼ KỆ CHAI LỌ.webp',
                    'images/pic/LINH KIỆN KỆ CHAI LỌ.webp'
                ]
            ],
            [
                'name' => 'Kệ dĩa cố định',
                'description' => 'Kệ cố định dĩa với hai kiểu dáng chữ V và Ovan, phù hợp với nhiều không gian bếp khác nhau.',
                'cat_id' => $keTM->id,
                'versions' => [
                    [
                        'title' => 'Kệ dĩa cố định - Kiểu chữ V',
                        'thumbnail' => 'images/pic/KỆ DĨA CỐ ĐỊNH CHỮ V.webp'
                    ],
                    [
                        'title' => 'Kệ dĩa cố định - Kiểu Ovan',
                        'thumbnail' => 'images/pic/KỆ DĨA CỐ ĐỊNH OVAN.webp'
                    ]
                ],
                'images' => [
                    'images/pic/KỆ DĨA CỐ ĐỊNH CHỮ V.webp',
                    'images/pic/KỆ DĨA CỐ ĐỊNH CHỮ V (2).webp',
                    'images/pic/KỆ DĨA CỐ ĐỊNH CHỮ V (3).webp',
                    'images/pic/KỆ DĨA CỐ ĐỊNH CHỮ V (4).webp',
                    'images/pic/KỆ DĨA CỐ ĐỊNH OVAN.webp',
                    'images/pic/KỆ DĨA CỐ ĐỊNH OVAN (2).webp'
                ]
            ],
            [
                'name' => 'Kệ liên hoàn',
                'description' => 'Kệ đa năng kết hợp nhiều chức năng, tối ưu không gian góc bếp.',
                'cat_id' => $keTM->id,
                'versions' => [
                    [
                        'title' => 'Kệ liên hoàn góc I',
                        'thumbnail' => 'images/pic/KỆ LIÊN HOÀN GÓC I.webp'
                    ],
                    [
                        'title' => 'Kệ liên hoàn góc II',
                        'thumbnail' => 'images/pic/KỆ LIÊN HOÀN GÓC II.webp'
                    ]
                ],
                'images' => [
                    'images/pic/KỆ LIÊN HOÀN GÓC I.webp',
                    'images/pic/KỆ LIÊN HOÀN GÓC II.webp',
                    'images/pic/BẢNG VẼ COMBO XONG BÁT.webp'
                ]
            ]
        ];

        foreach ($products as $productData) {
            $product = Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'cat_id' => $productData['cat_id'],
                'is_visible' => true
            ]);

            // Tạo các phiên bản cho sản phẩm
            foreach ($productData['versions'] as $versionData) {
                Version::create([
                    'title' => $versionData['title'],
                    'thumbnail' => $versionData['thumbnail'],
                    'product_id' => $product->id
                ]);
            }

            // Tạo hình ảnh cho sản phẩm
            foreach ($productData['images'] as $imageUrl) {
                Image::create([
                    'url' => $imageUrl,
                    'product_id' => $product->id
                ]);
            }
        }
    }
}
