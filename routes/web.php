<?php

use Illuminate\Support\Facades\Route;
use LaravelEgypt\DataLens\Livewire\DatalensIndex;

Route::get('/', DatalensIndex::class)->name('datalens.index');
