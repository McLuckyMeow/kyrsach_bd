<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(50,60) as $index){
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('password'),
            'IsAdmin' => $faker->sentence(1,2),
        ]);}
    }
}
