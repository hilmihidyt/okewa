<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatLinkController;
use App\Http\Controllers\Admin\ChatLinkController as AdminChatLinkController;

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
Route::get('optimized', function () {
    \Artisan::call('optimize');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function(){
    return view('about');
})->name('about');

Route::post('whatsapp-link-generator',[ChatLinkController::class, 'generateWaLink'])->name('generate-whatsapp-link');

Auth::routes(['register' => false]);

Route::get('chat-link/{id}/analytic',[AdminChatLinkController::class, 'analytic'])->name('chat-link.analytic')->middleware('auth');
Route::resource('chat-link', AdminChatLinkController::class)->except(['create', 'edit', 'show','update'])->middleware('auth');