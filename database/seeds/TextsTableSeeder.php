<?php

use Illuminate\Database\Seeder;

class TextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $VILLAGES = DB::table('VILLAGE')->select('ID_VILLAGE')->orderBy('ID_VILLAGE','asc')-> get();
        $villageID = $VILLAGES[random_int(0,count($VILLAGES)-1)]->ID_VILLAGE;
//        print_r($villageID);

        $CONTRACTORS = DB::table('CONTRACTORS')->select('ID_CONTRACTOR')->where('ID_VILLAGE',$villageID)->orderBy('ID_CONTRACTOR','asc')->get();
        $COLLECTOR = DB::table('COLLECTOR')->select('ID_COLLECTOR')->orderBy('ID_COLLECTOR','asc')-> get();
        $LOCATIONS = DB::table('LOCATIONS')->select('ID_LOCATION')->orderBy('ID_LOCATION','asc')-> get();

        $WORDS = DB::table('WORDS')->select('ID_WORD')->orderBy('ID_WORD','asc')-> get();
//        print_r($COLLECTOR[random_int(0,count($COLLECTOR)-1)]->ID_COLLECTOR);
//        print_r($CONTRACTORS[random_int(0,count($CONTRACTORS)-1)]->ID_CONTRACTOR);
//        print_r($LOCATIONS[random_int(0,count($LOCATIONS)-1)]->ID_LOCATION);
//        print_r($WORDS[random_int(0,count($WORDS)-1)]->ID_WORD);
//        print_r($villageID);
//
        $faker = Faker\Factory::create();
        DB::table('TEXTS')->insert([
            'TEXTNAME' => str_random(20),
            'TEXTORDER' => random_int(1, 1000),
            'CONTENT' => $faker->text,
            'RECYEAR' => random_int(1, 1000),
            'AUDIO' => str_random(110),
            'ID_COLLECTOR' => $COLLECTOR[random_int(0,count($COLLECTOR)-1)]->ID_COLLECTOR,
            'ID_CONTRACTOR' => $CONTRACTORS[random_int(0,count($CONTRACTORS)-1)]->ID_CONTRACTOR,
            'ID_LOCATION' => $LOCATIONS[random_int(0,count($LOCATIONS)-1)]->ID_LOCATION,
            'ID_WORD' => $WORDS[random_int(0,count($WORDS)-1)]->ID_WORD,
            'ID_VILLAGE' => $villageID,
        ]);
    }
}
