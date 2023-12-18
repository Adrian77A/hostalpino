<?php

namespace Database\Seeders;

use App\Imports\SectorsImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class SectorSeeder extends Seeder
{
    /**
     * php artisan db:seed --class=SectorSeeder
     *  Seeder para agregar los datos del proyecto sistema de información
     * @return void
     */
    public function run(): void
    {
        try {
            $path_db = database_path();
            $rute_file = "{$path_db}/imports/Firts/primera_firts.xlsx"; 
            
            Excel::import(new SectorsImport, $rute_file);

        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
