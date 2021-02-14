<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::truncate();
        $faker = Faker\Factory::create();
        for($i=0;$i<3;$i++) {
            News::create([
                "title" => $faker->sentence(3),
                "body" => $faker->paragraph(3)
            ]);
        }
    }
}
