<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Movies');

        for($i=0; $i<=9; $i++) {
            DB::table('movies')->insert([
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'title'=>$faker->sentence,
                'year'=>$faker->year($max='now'),
                'plot'=>implode($faker->paragraphs(2)),
            ]);
        }
    }
}
