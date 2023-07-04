<?php

use App\Http\Controllers\Tickets\LoginController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Tickets\HomeController;
use App\Http\Livewire\ListandoTickets;
use App\Http\Livewire\SearchTicket;
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

// Route::get('/',SearchZipcode::class)->name('search-zipcode');

Route::middleware('autenticacao')->prefix('/sistema')->group(function(){
    Route::get('/show/ticket', ListandoTickets::class)->name('showTickets');
    Route::get('/tickets',[TicketController::class, 'index'])->name('ticket');
    Route::get('/sair', [LoginController::class,'deslogar'])->name('SairSistema');
    Route::post('/create/ticket', [TicketController::class, 'store'])->name('createTicket');
});
// Route::get('/sistema/show/ticket', ListandoTickets::class)->name('showTickets');
// Route::get('/sistema/tickets',[TicketController::class, 'index'])->name('ticket');
// Route::post('/sistema/create/ticket', [TicketController::class, 'store'])->name('createTicket');
Route::get('/', [HomeController::class, 'index'])->name('search-zipcode');
Route::post('/login', [LoginController::class,'autenticar'])->name('loginSistema');
Route::get('/sair', [LoginController::class,'deslogar'])->name('SairSistema');
Route::get('/login{erro?}', [LoginController::class, 'index'])->name('loginSistema');
// Route::get('/sistema/show/ticket', [TicketController::class,'list'])->name('showTickets');
Route::get('sistema/edit/ticket/{id?}', [TicketController::class, 'edit'])->name('editTicket');
Route::post('sistema/update/ticket', [TicketController::class, 'update'])->name('updateTicket');
