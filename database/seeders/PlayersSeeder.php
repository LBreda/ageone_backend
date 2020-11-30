<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlayersSeeder extends Seeder
{
    use SeederHelper;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fill_table('players', 'players.csv');
    }
}
