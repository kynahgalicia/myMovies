<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Genres');

        for($i=0; $i<=9; $i++) {
            DB::table('genres')->insert([
                'genre'=>$faker->word,
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
