<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $decs = 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.';
        DB::table('categories')->insert([
            [
            'name' => 'Мобильные телефоны',
            'alias' => 'Mobile',
            'decs' => $decs,
            'preview_img' => '85b8d5466fb804e57b06f9e6b524e1f745843f58.jpg',
            ],
            [
                'name' => 'Ноутбуки',
                'alias' => 'Laptops',
                'decs' => $decs,
                'preview_img' => 'gO5UtZzQ.jpg',
            ],
            [
                'name' => 'Умные часы',
                'alias' => 'Smart_watch',
                'decs' => $decs,
                'preview_img' => '01._xiaomi-mi-watch.jpg',
            ]
        ]);
    }
}
