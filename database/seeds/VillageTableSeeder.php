<?php

use Illuminate\Database\Seeder;

class VillageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countryID = DB::table('COUNTRY')-> orderBy('ID_COUNTRY','asc')-> get(['ID_COUNTRY']);

        DB::table('VILLAGE')->insert([
            'VILLAGENAME' => str_random(40),
            'ID_COUNTRY' => $countryID[random_int(0, count($countryID)-1)]->ID_COUNTRY,
        ]);
    }
}
