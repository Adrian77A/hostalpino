<?php

namespace App\Filament\Resources\GuestResource\Pages;

use App\Filament\Resources\GuestResource;
use App\Models\Bedroom;
use App\Models\Guest;
use Carbon\Carbon;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;

class CreateGuest extends CreateRecord
{
    protected static string $resource = GuestResource::class;

    protected function afterCreate(): void
    {
        
        $createdRecord = $this->record;
        Bedroom::where('id', $createdRecord->bedroom_id)->update(["status" => "Ocupada"]);

        $current_date = Carbon::now()->format('Y-m-d');
        $next_mothn = Carbon::parse($current_date)->addMonth(1);
        Guest::where('id', $createdRecord->id)->update(["date_log_start" => $current_date, "date_log_finish" => $next_mothn ]);
    }

}
