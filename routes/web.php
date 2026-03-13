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

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

// Main pages
Route::get('/', [MainController::class, 'index']);
Route::get('/full_image/{img}', [MainController::class, 'show']);

// Articles
Route::resource('article', ArticleController::class)->except(['show']);
Route::get('/article/{article}', [ArticleController::class, 'show'])
    ->name('article.show')
    ->middleware('stat');

// Auth
Route::get('/auth/signin', [AuthController::class, 'signin']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::get('/about', function(){
    return view('main.about');
});
<<<<<<< HEAD
>>>>>>> 2245a15 (first commit)
=======

Route::controller(CommentController::class)
    ->prefix('comment')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')->name('comment.index');
        Route::post('/', 'store')->name('comment.store');
        Route::get('/edit/{comment}', 'edit')->name('comment.edit');
        Route::post('/update/{comment}', 'update')->name('comment.update');
        Route::get('/delete/{comment}', 'delete')->name('comment.delete');
        Route::get('/accept/{comment}', 'accept')->name('comment.accept');
        Route::get('/reject/{comment}', 'reject')->name('comment.reject');
    });

Route::get('/contacts', function(){
    $array = [
        'name' => 'MosPolytech',
        'address' => 'Bolshaya Semenovskaya',
        'email' => 'q@mospoly.ru',
        'phone' => '+7 (910) 950 13-28',
    ];

    return view('main/contacts', ['contacts' => $array]);
});
>>>>>>> 019e4b8 (finish laravel)
