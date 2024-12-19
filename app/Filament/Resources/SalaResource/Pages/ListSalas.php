<?php

namespace App\Filament\Resources\SalaResource\Pages;

use App\Filament\Resources\SalaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalas extends ListRecords
{
    protected static string $resource = SalaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
