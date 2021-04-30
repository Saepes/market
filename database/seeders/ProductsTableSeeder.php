<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $decs = 'text';
        $decs = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        DB::table('products')->insert([
            [
                'article' => 1000000,
                'name' => 'Mi band 6',
                'description' => $decs,
                'price' => rand(15, 60),
                'img' => 'anons_xiaomi_mi_band_6___arkij_pochti_bezramochnyj_braslet_picture11_0.jpg',
                'categories_id' => 3
            ],
            [
                'article' => 1000001,
                'name' => 'Iphone 12',
                'description' => $decs,
                'price' => rand(500, 1000),
                'img' => 'iphone.jpg',
                'categories_id' => 1
            ],
            [
                'article' => 1000003,
                'name' => 'Macbook M2',
                'description' => $decs,
                'price' => rand(2000, 4500),
                'img' => 'mackbook.webp',
                'categories_id' => 2
            ],
            [
                'article' => 1000004,
                'name' => 'Xiaomi Mi 10',
                'description' => $decs,
                'price' => rand(200, 500),
                'img' => 'maxresdefault.jpg',
                'categories_id' => 1
            ],
        ]);
    }
}
