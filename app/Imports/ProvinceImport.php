<?php

namespace App\Imports;

use App\Tinh;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProvinceImport implements ToModel, WithMultipleSheets, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        if(!isset($row[0])){
            return null;
        }
        return new Tinh([
            'ma_tinh'   => $row[0],
            'ten_tinh'   => $row[1],
        ]);
    }

    public function sheets(): array
    {
        return [
            0 => new ProvinceImport(),
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
