<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use DB;
class bioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelasrand=[
            'XII RPL 1',
            'XII RPL 2',
            'XII RPL 3',
            'XII RPL 4'
        ];

        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 17; $i++){

            // insert data ke table bio_models
            DB::table('bio_models')->insert([
                'nama'=>$faker->name,
                'email' => $faker->unique()->safeEmail,
                'nis'=> $faker->randomNumber(9, true),
                'kelas'=>$kelasrand[rand(0, count($kelasrand) - 1)],
                'tgllhr'=>$faker->dateTimeBetween('2000-01-01','2006-12-12')
            ]);
        }

    }
}
