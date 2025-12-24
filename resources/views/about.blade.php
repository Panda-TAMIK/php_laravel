@extends('layouts.app')

@section('title', 'О нас')

@section('content')
<div class="page-content">
    <h1 class="page-title">О нашей компании</h1>
    
    <div style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Наша история</h3>
        <p>Мы - команда разработчиков, создающая современные веб-приложения на Laravel.</p>
    </div>
    
    <div style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem;">
        <a href="{{ route('home') }}" class="btn btn-secondary">На главную</a>
        <a href="{{ route('contacts') }}" class="btn btn-primary">Контакты</a>
    </div>
</div>
@endsection