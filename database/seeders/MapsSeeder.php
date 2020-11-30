<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MapsSeeder extends Seeder
{
    use SeederHelper;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fill_table('maps', 'maps.csv');
    }
}
