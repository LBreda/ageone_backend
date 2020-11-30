<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

trait SeederHelper
{
    public function fill_table($tablename, $filename)
    {
        if (($handle = fopen(base_path("database/seeders/csv/" . $filename), "r")) !== false) {
            $heading = fgetcsv($handle, 1000);

            $csvArrayInsert = [];
            while (($cols = fgetcsv($handle, 1000)) !== false) {
                $line = [];
                foreach ($cols as $i => $value) {
                    $line[$heading[$i]] = $value ?: null;
                }
                $csvArrayInsert[] = $line;
            }

            DB::table($tablename)->insert($csvArrayInsert);
        }
    }
}
