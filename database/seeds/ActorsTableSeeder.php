<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Actors');

        for($i=0; $i<=9; $i++) {
            DB::table('actors')->insert([
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'name'=>$faker->name,
                'birthday'=>$faker->date,
                'notes'=>$faker->sentence,
            ]);
        }
    }
}
