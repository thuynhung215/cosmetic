<?php

use Illuminate\Database\Seeder;

class WishlistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $list_user_id = \App\User::pluck('id');
        $list_product_id = \App\User::pluck('id');
        foreach ($list_user_id as $user_id) {
            for ($i = 0; $i < 20; $i++) {
                \App\Wishlist::create([
                    'user_id' => $user_id,
                    'pro_id' => $faker->randomElement($list_product_id),
                ]);
            }
        }
    }
}
