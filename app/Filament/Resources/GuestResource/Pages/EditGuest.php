<?php

namespace App\Filament\Resources\GuestResource\Pages;

use App\Filament\Resources\GuestResource;
use App\Models\Bedroom;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuest extends EditRecord
{
    protected static string $resource = GuestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->before(function () {
                $createdRecord = $this->record;
                Bedroom::where('id', $createdRecord->bedroom_id)->update(["status" => "Disponible"]);
            }),
        ];

    }
}
