@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
<div class="page-content">
    <h1 class="page-title">Добро пожаловать на наш сайт!</h1>
    
    <div style="text-align: center; margin: 2rem 0;">
        <p style="font-size: 1.2rem; color: #666;">
            Мы рады приветствовать вас на нашем сайте, созданном с использованием Laravel!
        </p>
        
        <div style="margin: 2rem 0; padding: 1.5rem; background: #f0f8ff; border-left: 4px solid #3498db;">
            <h3 style="color: #2c3e50; margin-bottom: 1rem;">О нашем проекте</h3>
            <p>Это демонстрационный проект, созданный для изучения возможностей Laravel, включая:</p>
            <ul style="list-style: disc; margin-left: 2rem; margin-top: 0.5rem;">
                <li>Маршрутизацию (Routing)</li>
                <li>Blade-шаблонизатор</li>
                <li>Передачу данных из контроллеров в представления</li>
                <li>Создание многостраничных сайтов</li>
            </ul>
        </div>
        
        <div style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem;">
            <a href="{{ route('about') }}" 
               style="padding: 0.8rem 1.5rem; background: #3498db; color: white; text-decoration: none; border-radius: 4px;">
                Узнать о нас больше
            </a>
            <a href="{{ route('contacts') }}" 
               style="padding: 0.8rem 1.5rem; background: #2ecc71; color: white; text-decoration: none; border-radius: 4px;">
                Связаться с нами
            </a>
        </div>
    </div>
</div>
@endsection