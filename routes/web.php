<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',function(){
    return redirect()->route('user.login');
});

Route::controller(UserAuthController::class)->group(function(){

    // registration , login, logout
    Route::get('/register','user_register')->name('user.register');
    Route::post('/register_process','register_process')->name('user.register_process');
    Route::get('/login','user_login')->name('user.login');
    Route::post('/login_process','login_process')->name('user.login_process');
    Route::get('/logout','logout')->name('user.logout');

});

Route::controller(TicketsController::class)->group(function(){
    
    //tickets => add,view
    Route::get('/tickets','tickets')->name('tickets');
    Route::get('/ticket_add','ticket_add')->name('ticket.add');
    Route::post('/ticket_addprocess','ticket_addProcess')->name('ticket.addprocess');

    //responses
    Route::get('/ticket_respond/{id}/{ticket_id}','ticket_respond')->name('ticket.respond');
    Route::post('/ticket_respondprocess','ticket_respondprocess')->name('ticket.respondprocess');
    
});
