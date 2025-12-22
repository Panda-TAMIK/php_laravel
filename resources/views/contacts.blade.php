@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
<div class="page-content">
    <h1 class="page-title">Наши контакты</h1>
    
    <div style="margin-bottom: 2rem;">
        <p style="font-size: 1.1rem; margin-bottom: 1.5rem;">
            Мы всегда рады ответить на ваши вопросы и рассмотреть предложения о сотрудничестве.
        </p>
        
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Способы связи</h3>
        <ul class="contact-list">
            @foreach($contacts as $contact)
            <li>
                <span class="contact-label">{{ $contact['type'] }}:</span> 
                <span>{{ $contact['value'] }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    
    <div style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Режим работы</h3>
        <div style="background: #f8f9fa; padding: 1rem; border-radius: 6px;">
            <p><strong>Понедельник - Пятница:</strong> 9:00 - 18:00</p>
            <p><strong>Суббота:</strong> 10:00 - 16:00</p>
            <p><strong>Воскресенье:</strong> выходной</p>
        </div>
    </div>
    
    <div style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Наш офис</h3>
        <div style="background: #fff; border: 1px solid #ddd; padding: 1rem; border-radius: 6px;">
            <p><strong>Адрес:</strong> г. Москва, ул. Примерная, д. 123, офис 456</p>
            <p><strong>Ближайшее метро:</strong> Примерная (5 минут пешком)</p>
        </div>
    </div>
    
    <div style="text-align: center; margin-top: 2rem;">
        <a href="{{ route('home') }}" 
           style="padding: 0.8rem 1.5rem; background: #95a5a6; color: white; text-decoration: none; border-radius: 4px; margin-right: 1rem;">
            На главную
        </a>
        <a href="{{ route('about') }}" 
           style="padding: 0.8rem 1.5rem; background: #3498db; color: white; text-decoration: none; border-radius: 4px;">
            О нашей компании
        </a>
    </div>
</div>
@endsection