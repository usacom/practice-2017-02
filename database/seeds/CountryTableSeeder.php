<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areaID = DB::table('AREA')-> orderBy('ID_AREA','asc')-> get(['ID_AREA']);
        DB::table('COUNTRY')->insert([
            'COUNTRYNAME' => str_random(40),
            'ID_AREA' => $areaID[random_int(0, count($areaID)-1)]->ID_AREA,
        ]);

    }
}
