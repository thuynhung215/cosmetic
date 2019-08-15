<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Nhung',
            'email' => 'admin@gmail.com',
            'role'=>1,
            'password' => bcrypt('12345678'),
        ]);
        for($i=0; $i < 10 ; $i++){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'role'=>2,
                'password' => bcrypt('12345678'),
            ]);
        }
    }
}
