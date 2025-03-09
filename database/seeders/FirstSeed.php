<?php

    namespace Database\Seeders;

    use App\Models\Product;
    use App\Models\User;
    use App\Models\Setting;
    use App\Models\Version;
    use App\Models\Image;
    use Illuminate\Database\Seeder;

    class FirstSeed extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
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

            // Tạo các sản phẩm chính
            $products = [
                [
                    'name' => 'Kệ bát đĩa nâng hạ AAA',
                    'description' => 'Kệ bát đĩa thông minh với cơ chế nâng hạ giúp việc lấy đồ dễ dàng, phù hợp mọi không gian bếp.',
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
                    ]
                ],
                [
                    'name' => 'Kệ dao thớt AAA',
                    'description' => 'Kệ dao thớt thông minh giúp sắp xếp và bảo quản dao thớt gọn gàng, khoa học.',
                    'versions' => [
                        [
                            'title' => 'Kệ dao thớt AAA - Cơ bản',
                            'thumbnail' => 'images/pic/KỆ DAO THỚT.webp'
                        ],
                        [
                            'title' => 'Kệ dao thớt AAA - Nâng cao',
                            'thumbnail' => 'images/pic/KỆ DAO THỚT (2).webp'
                        ]
                    ]
                ],
                [
                    'name' => 'Kệ chai lọ AAA',
                    'description' => 'Kệ đựng chai lọ, gia vị nhà bếp với thiết kế thông minh, tiết kiệm không gian.',
                    'versions' => [
                        [
                            'title' => 'Kệ chai lọ AAA - Tiêu chuẩn',
                            'thumbnail' => 'images/pic/KỆ CHAI LỌ.webp'
                        ],
                        [
                            'title' => 'Kệ chai lọ AAA - Mở rộng',
                            'thumbnail' => 'images/pic/KỆ CHAI LỌ (2).webp'
                        ]
                    ]
                ],
                [
                    'name' => 'Thùng gạo thông minh AAA',
                    'description' => 'Thùng đựng gạo với thiết kế hiện đại, bảo quản gạo tốt và tiện lợi khi sử dụng.',
                    'versions' => [
                        [
                            'title' => 'Thùng gạo AAA - 10kg',
                            'thumbnail' => 'images/pic/THÙNG GẠO AAA.webp'
                        ],
                        [
                            'title' => 'Thùng gạo AAA - 20kg',
                            'thumbnail' => 'images/pic/THÙNG GẠO AAA (2).webp'
                        ]
                    ]
                ],
                [
                    'name' => 'Mâm xoay đa năng AAA',
                    'description' => 'Mâm xoay thông minh giúp tối ưu không gian và dễ dàng lấy đồ trong tủ bếp.',
                    'versions' => [
                        [
                            'title' => 'Mâm xoay AAA - Màu Trắng',
                            'thumbnail' => 'images/pic/MÂM XOAY LÁ TRẮNG.webp'
                        ],
                        [
                            'title' => 'Mâm xoay AAA - Màu Xám',
                            'thumbnail' => 'images/pic/MÂM XOAY LÁ XÁM.webp'
                        ]
                    ]
                ]
            ];

            // Tạo sản phẩm và phiên bản
            foreach ($products as $productData) {
                $product = Product::create([
                    'name' => $productData['name'],
                    'description' => $productData['description']
                ]);

                // Tạo các phiên bản cho sản phẩm
                foreach ($productData['versions'] as $versionData) {
                    $version = Version::create([
                        'title' => $versionData['title'],
                        'thumbnail' => $versionData['thumbnail'],
                        'product_id' => $product->id
                    ]);

                    // Tạo hình ảnh cho phiên bản
                    Image::create([
                        'url' => $versionData['thumbnail'],
                        'product_id' => $product->id
                    ]);

                }
            }
        }
    }
