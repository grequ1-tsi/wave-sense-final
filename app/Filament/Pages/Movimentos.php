<?php

namespace App\Filament\Pages;

use App\Models\Movimento;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class Movimentos extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $model = Movimento::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.movimento';

    public function table(Table $table): Table
    {
        return $table
        ->query(Movimento::query())
        ->columns([
            TextColumn::make('num_patrimonial'),
            TextColumn::make('status'),
            TextColumn::make('sala'),
            TextColumn::make('data'),
            TextColumn::make('horario'),
        ])
        ->filters([
            $table->filter('status'),
        ])
        ->actions([])
        ->bulkActions([]);    
    }
}
