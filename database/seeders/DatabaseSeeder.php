<?php

namespace Database\Seeders;

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
        $this->call(ExpansionsSeeder::class);
        $this->call(CivilizationsSeeder::class);
        $this->call(PlayersSeeder::class);
        $this->call(ColorsSeeder::class);
    }
}
