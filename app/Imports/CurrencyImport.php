<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CurrencyImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        $data = [];
        foreach($rows as $row){
            $data[] = [
                "name" => $row["name"],
                "rate" => $row["rate"],
                "created_at" => now(),
                "updated_at" => now()
            ];
        }
        DB::table('currencies')->insert($data);
    }
}
