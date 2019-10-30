<?php

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
        DB::table('categories')->insert([
                                                    [
                                                        'title' => 'Природа',
                                                        'slug' => 'priroda',
                                                    ],
                                                    [
                                                        'title' => 'Игры',
                                                        'slug' => 'igri',
                                                    ],
                                                    [
                                                        'title' => 'HiTech',
                                                        'slug' => 'hitech',
                                                    ],
                                                    [
                                                        'title' => 'Рисунки',
                                                        'slug' => 'risunki',
                                                    ]
                                               ]);
    }
}
