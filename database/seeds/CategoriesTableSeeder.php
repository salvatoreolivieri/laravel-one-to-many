<?php

use Illuminate\Database\Seeder;
use App\Categories;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'HTML',
            'CSS',
            'JS',
            'SCSS',
            'JQUERY'
        ];

        foreach ($categories as $category) {
            $new_category = new Categories();
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, '-');
            $new_category->save();
        }
    }
}