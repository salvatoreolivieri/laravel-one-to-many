<?php

use App\Post;
use App\Categories;
use Illuminate\Database\Seeder;

class UpdatePostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        //Ad ogni ciclo estraggo random un id dalla tab categories:
        foreach ($posts as $post){
            $categories_id = Categories::inRandomOrder()->first()->id;
            $post->categories_id = $categories_id;
            $post->update();
        }
    }
}
