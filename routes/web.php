<?php

use App\Http\Controllers\BedroomController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\ThanksController;
use App\Http\Livewire\Web\Departament;
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

Route::get('/', [ KeyController::class , 'index'])->name('home');
Route::post('/contact', [ KeyController::class , 'store'])->name('contac-home');
// Route::get('/bedrooms', [ BedroomController::class , 'store'])->name('bedroom');
Route::get('/comments', [ ContactController::class , 'index'])->name('comment');
Route::post('/send/comment', [ ContactController::class , 'store'])->name('comment-save');
// Route::get('/location', [ ContactController::class , 'location'])->name('location');
Route::get('/gracias',  [ ThanksController::class , 'index' ])->name('Thank_you');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
