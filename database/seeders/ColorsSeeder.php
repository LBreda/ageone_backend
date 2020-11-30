<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    use SeederHelper;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fill_table('colors', 'colors.csv');
    }
}
