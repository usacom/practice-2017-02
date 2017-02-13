<?php

use Illuminate\Database\Seeder;

class ContractorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villagesID = DB::table('VILLAGE')-> orderBy('ID_VILLAGE','asc')-> get(['ID_VILLAGE']);

        DB::table('CONTRACTORS')->insert([
            'CONTRACTORNAME' => str_random(40),
            'RYEAR' => random_int(1, 10000),
            'ID_VILLAGE' => $villagesID[random_int(0, count($villagesID)-1)]->ID_VILLAGE,
        ]);
    }
}
