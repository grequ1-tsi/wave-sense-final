<?php

namespace App\Filament\Resources\ItemPatrimonialResource\Pages;

use App\Filament\Resources\ItemPatrimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemPatrimonial extends EditRecord
{
    protected static string $resource = ItemPatrimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
