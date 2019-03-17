<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $count = 0;

        while($count < 50) {
            factory(App\Post::class)->create([
                'author_id' => mt_rand(1, 50), 
            ])->tags()->saveMany(
                factory(App\Tag::class, 5)->make()
            );

            $count++;
        }
        
    }
}
