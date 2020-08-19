<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<=10; $i++){
            DB::table('movies')->insert([
                'name' => $faker->name,
                'description' => $faker->sentence,
            ]);
        }
    }
}
