<?php

namespace App\Livewire\Movimento;

use App\Models\Movimento;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class RegistroMovimentos extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];
    
    public function mount()
    {
        // Listen for the custom event
        $this->listeners['echo:refreshTable,refreshTable'] = '$refresh';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Movimento::query()->orderBy('data', 'desc'))
            ->columns([
                Tables\Columns\TextColumn::make('num_patrimonial'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('salas_id')
                    ->numeric(),
                Tables\Columns\TextColumn::make('data')
                    ->date(),
                Tables\Columns\TextColumn::make('horario'),
            ])
            ->defaultSort('horario', 'desc',)
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render():View
    {
        return view('livewire.movimento.registro-movimentos')
            ->layout('layouts.app', ['title' => 'Registro de Movimentos']);
    }
}
