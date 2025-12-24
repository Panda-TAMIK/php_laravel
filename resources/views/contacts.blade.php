@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
<div class="page-content">
    <h1 class="page-title">Наши контакты</h1>
    
    <p style="font-size: 1.1rem; margin-bottom: 1.5rem;">
        Свяжитесь с нами для сотрудничества
    </p>
    
    <ul class="contact-list">
        @foreach($contacts as $contact)
        <li>
            <span class="contact-label">{{ $contact['type'] }}:</span>
            <span class="contact-value">{{ $contact['value'] }}</span>
        </li>
        @endforeach
    </ul>
    
    <div style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem;">
        <a href="{{ route('home') }}" class="btn btn-secondary">На главную</a>
        <a href="{{ route('about') }}" class="btn btn-primary">О нас</a>
    </div>
</div>
@endsection