<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemPatrimonialResource\Pages;
use App\Filament\Resources\ItemPatrimonialResource\RelationManagers;
use App\Models\ItemPatrimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemPatrimonialResource extends Resource
{
    protected static ?string $model = ItemPatrimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('num_patrimonial')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('marca')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('serial')
                    ->maxLength(255),
                Forms\Components\TextInput::make('setores_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('salas_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('num_patrimonial')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('setores_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salas_id')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItemPatrimonials::route('/'),
            'create' => Pages\CreateItemPatrimonial::route('/create'),
            'edit' => Pages\EditItemPatrimonial::route('/{record}/edit'),
        ];
    }
}
