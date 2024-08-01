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
                'name' => 'White Long Dress With Train',
                'price' => 228000,
                'stock' => 100,
                'description' => '<p>Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco. Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 4,
                'picture' => 'img/products/demo/02.jpg',
                'name' => 'Black Classic Suit',
                'price' => 185000,
                'stock' => 100,
                'description' => '<p>Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco. Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 1,
                'picture' => 'img/products/demo/03.jpg',
                'name' => 'Black Classic SuitBeautiful Glasses For Newlyweds',
                'price' => 168000,
                'stock' => 100,
                'description' => '<p>Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco. Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 1,
                'picture' => 'img/products/demo/04.jpg',
                'name' => 'Candles For The Ceremony',
                'price' => 69000,
                'stock' => 100,
                'description' => '<p>Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco. Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 2,
                'picture' => 'img/products/demo/05.jpg',
                'name' => 'White Long Dress With Train',
                'price' => 279000,
                'stock' => 100,
                'description' => '<p>Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco. Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_product_id' => 4,
                'picture' => 'img/products/demo/06.jpg',
                'name' => 'White Long Dress With TrainNavy Classic Suit',
                'price' => 131000,
                'stock' => 100,
                'description' => '<p>Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco. Cupidatat sint non voluptate culpa reprehenderit magna aliqua mollit ea consequat officia amet eiusmod in. Ea ullamco irure magna aliqua excepteur ullamco culpa commodo nostrud enim dolore. Anim anim ut exercitation officia occaecat ipsum proident. Voluptate veniam eu adipisicing veniam. Ipsum laborum laboris sunt ea non ea qui nisi laboris. Deserunt duis velit ex qui. Dolor in ad culpa incididunt dolor aute. Incididunt mollit laboris deserunt irure ad id voluptate fugiat mollit ullamco.<br></p>',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Product::insert($products);
    }
}
