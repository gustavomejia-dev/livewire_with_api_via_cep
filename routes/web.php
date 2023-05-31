<?php

use App\Http\Controllers\SidebarController;
use Illuminate\Support\Facades\Route;
use \App\Http\Livewire\SearchZipcode;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',SearchZipcode::class)->name('search-zipcode');
// Route::get('/sistema/ticket', )
