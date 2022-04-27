<?php

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('ticket:index')->middleware('auth');

Route::get('/tickets/create', [App\Http\Controllers\TicketController::class, 'create'])->name('ticket:create');
Route::post('/tickets/create', [App\Http\Controllers\TicketController::class, 'store'])->name('ticket:store');

Route::get('/tickets/{ticket}', [App\Http\Controllers\TicketController::class, 'show'])->name('ticket:show');

Route::get('/tickets/{ticket}/edit', [App\Http\Controllers\TicketController::class, 'edit'])->name('ticket:edit');
Route::post('/tickets/{ticket}/edit', [App\Http\Controllers\TicketController::class, 'update'])->name('ticket:update');

Route::get('/tickets/{ticket}/delete', [App\Http\Controllers\TicketController::class, 'destroy'])->name('ticket:destroy');
Route::get('/tickets/{ticket}/force-delete', [App\Http\Controllers\TicketController::class, 'forceDestroy'])->name('ticket:force-destroy');