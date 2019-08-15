<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('categories')->truncate();
        for($i=0; $i < 3 ; $i++){
            \App\Models\Category::create([
                'name' => $faker->name
            ]);
        }
    }
}
