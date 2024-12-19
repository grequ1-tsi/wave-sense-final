<?php

namespace App\Filament\Resources\ItemPatrimonialResource\Pages;

use App\Filament\Resources\ItemPatrimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemPatrimonials extends ListRecords
{
    protected static string $resource = ItemPatrimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
