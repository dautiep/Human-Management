<?php

namespace App\Imports;

use App\Huyen;
use App\Tinh;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DistrictImport implements ToModel, WithStartRow, WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $provinces = Tinh::where("ten_tinh", "LIKE", "%".$row[2]."%")->get();
        if(!isset($row[0]))
        {
            return null;
        }
        foreach($provinces as $province)
        {
            return new Huyen([
                'ma_huyen'   => $row[0],
                'ten_huyen'   => $row[1],
                'id_tinh'   => $province->id,
            ]);
        }
    }

    public function sheets(): array
    {
        return [
            0 => new DistrictImport(),
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
