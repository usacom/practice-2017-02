<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SectionsTableSeeder::class);
         $this->call(WordsTableSeeder::class);
         $this->call(AreaTableSeeder::class);
         $this->call(CountryTableSeeder::class);
         $this->call(VillageTableSeeder::class);
         $this->call(LocationsTableSeeder::class);
         $this->call(ContractorsTableSeeder::class);
         $this->call(CollectorTableSeeder::class);

         $this->call(TextsTableSeeder::class);
    }
}
