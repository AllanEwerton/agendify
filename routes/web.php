<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProfissionalIndex;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('profissionais', ProfissionalIndex::class)
    ->middleware(['auth'])
    ->name('profissionais');

require __DIR__.'/auth.php';
