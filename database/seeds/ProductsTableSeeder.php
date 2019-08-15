<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('products')->truncate();
        $category_id = DB::table('categories')->pluck('id');

        $insert_data = [];
        for ($i = 0; $i < 100; $i++) {
            array_push($insert_data, [
                'category_id' => $faker->randomElement($category_id),
                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'price' => $faker->numberBetween($min = 10, $max = 400),
                'description' => $faker->sentence($nbWords = 5, $variableNbWords = true),
                'img' => 'https://picsum.photos/id/' . $i . '/700/400',
            ]);
        }
        DB::table('products')->insert($insert_data);
    }
}
