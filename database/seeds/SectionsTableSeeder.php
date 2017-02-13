<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('SECTIONS')->insert([
            'SECTIONNAME' => str_random(10),
            'SECTIONORDER' => random_int(1, 10000),
        ]);
    }
}
