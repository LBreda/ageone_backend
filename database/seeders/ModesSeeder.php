<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModesSeeder extends Seeder
{
    use SeederHelper;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fill_table('modes', 'modes.csv');
    }
}
