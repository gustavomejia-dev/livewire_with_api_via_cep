<?php

use App\Http\Controllers\SidebarController;
use App\Http\Controllers\TicketController;
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
Route::get('/sistema/tickets',[TicketController::class, 'index'])->name('ticket');
Route::post('/sistema/create/ticket', [TicketController::class, 'store'])->name('createTicket');
Route::get('/sistema/show/ticket', [TicketController::class,'list'])->name('showTickets');
