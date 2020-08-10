<?php

namespace App\Imports;

use App\Tinh;
use App\Huyen;
use App\Xa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CommuneImport implements ToModel, WithStartRow, WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $provinces = Tinh::where("ten_tinh", "LIKE", "%".$row[3]."%")->get();
        $districts = Huyen::where("ten_huyen", "LIKE", "%".$row[2]."%")->get();
        if(!isset($row[0]))
        {
            return null;
        }
        foreach($provinces as $province)
        {
            foreach($districts as $district)
            {
                return new Xa([
                    'ma_xa'   => $row[0],
                    'ten_xa'   => $row[1],
                    'id_huyen'   => $district->id,
                    'id_tinh'   => $province->id,
                ]);
            }
        }
    }
    public function sheets(): array
    {
        return [
            0 => new CommuneImport(),
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
