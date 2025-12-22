<?php

use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', function () {
    return view('home');
})->name('home');

// Страница "О нас"
Route::get('/about', function () {
    return view('about');
})->name('about');

// Страница "Контакты" с передачей массива данных
Route::get('/contacts', function () {
    $contacts = [
        [
            'type' => 'Телефон',
            'value' => '+7 (495) 123-45-67'
        ],
        [
            'type' => 'Email',
            'value' => 'info@mysite.ru'
        ],
        [
            'type' => 'Телеграм',
            'value' => '@mysite_support'
        ],
        [
            'type' => 'VK',
            'value' => 'vk.com/mysite'
        ],
        [
            'type' => 'Рабочий чат',
            'value' => 'contact@mysite.ru'
        ]
    ];
    
    return view('contacts', ['contacts' => $contacts]);
})->name('contacts');