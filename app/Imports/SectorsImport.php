<?php

namespace App\Imports;

use App\Models\Sector;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class SectorsImport implements ToCollection, WithHeadingRow, SkipsOnError
{
    public $get_array;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onError(Throwable $e)
    {        
        Log::info($e);
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            
            Sector::create([
                'name' => $row['NOMBRE'] . $row['A.PATERNO'] . $row['A.MATERNO'],
                'address' => $row['DIRECCION'],
                'suburb' => $row['COLONIA'],
                'city' => $row['CIUDAD'],
                'state' => $row['ESTADO'],
                'postal_code' => $row['CP'],
                'rfc' => $row['RFC.HOM'],
                'lada_phone_one' => $row['LADA'],
                'phone_one' => $row['TEL.1'],
                'lada_phone_two' => $row['LADA_two'],
                'phone_two' => $row['TEL.2']
            ]);
            
        }
        Log::info("succes");
    }
}
