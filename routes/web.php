<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\MainController;

// Главная страница
Route::get('/', [MainController::class, 'index'])->name('home');

// О нас
Route::get('/about', function () {
    return view('about');
})->name('about');

// Контакты
Route::get('/contacts', function () {
    $contacts = [
        ['type' => 'Телефон', 'value' => '+7 (495) 123-45-67'],
        ['type' => 'Email', 'value' => 'info@example.com'],
        ['type' => 'Telegram', 'value' => '@example'],
        ['type' => 'Адрес', 'value' => 'г. Москва, ул. Примерная, д. 123'],
    ];
    return view('contacts', ['contacts' => $contacts]);
})->name('contacts');

// Галерея
Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{id}', [MainController::class, 'gallery'])->name('gallery.show');
=======

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

Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 2245a15 (first commit)
