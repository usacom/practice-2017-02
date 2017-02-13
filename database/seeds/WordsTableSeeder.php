<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $sectionID = DB::table('SECTIONS')-> orderBy('ID_SECTION','asc')-> get(['ID_SECTION']);


//        print_r($sectionID);
//        echo ;

        $faker = Faker\Factory::create();
        DB::table('WORDS')->insert([
            'WORDNAME' => str_random(30),
            'DESCRIPTION' => $faker->text,
            'WORDORDER' => random_int(1, 10000),
            'ID_SECTION' => $sectionID[random_int(0, count($sectionID)-1)]->ID_SECTION
        ]);
    }
}
