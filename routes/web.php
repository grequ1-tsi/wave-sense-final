<?php
use App\Livewire\Movimento\RegistroMovimentos;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('movimento/registro-movimentos', RegistroMovimentos::class)
    ->middleware(['auth', 'verified'])
    ->name('Movimentos');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
