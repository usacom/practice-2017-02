<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('LOCATIONS')->insert([
            'LOCATIONNAME' => str_random(120),
        ]);
    }
}
