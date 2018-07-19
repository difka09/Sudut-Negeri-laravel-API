<?php

use Illuminate\Database\Seeder;
use App\Article;

class AritclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        
        //create a few article in our db:
        
        for ($i = 0; $i < 50; $i++){
            Article::create([
                'title' => $faker ->sentence,
                'body' => $faker ->paragraph,
            ]);
        }
    }
}