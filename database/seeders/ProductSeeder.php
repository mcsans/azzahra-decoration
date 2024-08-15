<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $products = [
            [
                'category_product_id' => 2,
                'picture' => 'img/products/demo/01.jpg',
                'name' => 'Gaun Panjang Putih dengan Ekor',
                'price' => 228000,
                'stock' => 100,
                'description' => '<p>Gaun panjang putih dengan ekor ini adalah pilihan sempurna untuk acara perayaan Anda. Dengan desain yang elegan dan bahan berkualitas tinggi, gaun ini akan membuat Anda tampil anggun dan menawan. Ideal untuk acara formal atau pesta pernikahan, gaun ini memberikan kesan glamor dan mewah pada setiap kesempatan.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 4,
                'picture' => 'img/products/demo/02.jpg',
                'name' => 'Jas Klasik Hitam',
                'price' => 185000,
                'stock' => 100,
                'description' => '<p>Jas klasik hitam ini dirancang dengan potongan yang elegan dan bahan yang nyaman, cocok untuk berbagai acara formal. Dengan warna hitam yang timeless dan desain yang sophisticated, jas ini akan memberikan penampilan yang rapi dan profesional. Ideal untuk pertemuan bisnis atau acara resmi.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 1,
                'picture' => 'img/products/demo/03.jpg',
                'name' => 'Jas Klasik HitamKacamata Indah untuk Pengantin Baru',
                'price' => 168000,
                'stock' => 100,
                'description' => '<p>Jas klasik hitam dan kacamata indah ini adalah kombinasi sempurna untuk pengantin baru. Jas dengan desain klasik yang elegan dan kacamata yang stylish akan menambahkan sentuhan khusus pada hari bahagia Anda. Dengan kualitas bahan terbaik, set ini akan memastikan penampilan Anda tetap memukau.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 1,
                'picture' => 'img/products/demo/04.jpg',
                'name' => 'Lilin untuk Upacara',
                'price' => 69000,
                'stock' => 100,
                'description' => '<p>Lilin ini adalah tambahan yang sempurna untuk setiap upacara. Dengan cahaya lembut dan desain yang elegan, lilin ini akan menciptakan suasana yang romantis dan tenang pada hari istimewa Anda. Cocok untuk pernikahan, pesta, atau acara formal lainnya.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 2,
                'picture' => 'img/products/demo/05.jpg',
                'name' => 'Gaun Panjang Putih dengan Ekor',
                'price' => 279000,
                'stock' => 100,
                'description' => '<p>Gaun panjang putih ini menawarkan desain yang anggun dengan ekor yang menawan. Terbuat dari bahan berkualitas, gaun ini memberikan kenyamanan sekaligus keindahan yang menakjubkan. Ideal untuk acara formal seperti pernikahan atau gala, gaun ini akan membuat Anda menjadi pusat perhatian.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 4,
                'picture' => 'img/products/demo/06.jpg',
                'name' => 'Gaun Panjang Putih dengan EkorJas Klasik Biru Tua',
                'price' => 131000,
                'stock' => 100,
                'description' => '<p>Gaun panjang putih dengan ekor dan jas klasik biru tua ini adalah kombinasi elegan untuk berbagai acara. Gaun putih memberikan kesan anggun, sementara jas biru tua menambahkan sentuhan klasik yang sophisticated. Dengan desain yang serbaguna, set ini cocok untuk berbagai acara formal.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Product::insert($products);
    }
}
