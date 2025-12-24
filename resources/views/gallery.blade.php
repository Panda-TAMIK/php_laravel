@extends('layouts.app')

@section('title', 'Галерея')

@section('content')
<div class="page-content">
    <h1 class="page-title">Галерея изображений</h1>
    
    @if($article)
        <div style="text-align: center; max-width: 800px; margin: 0 auto 2rem;">
            <img src="{{ asset($article['full_image'] ?? '') }}" 
                 alt="{{ $article['title'] ?? $article['name'] ?? '' }}" 
                 class="gallery-img">
            
            <h2 style="margin: 1rem 0;">{{ $article['title'] ?? $article['name'] ?? '' }}</h2>
            <p style="color: #666; font-size: 1.1rem;">{{ $article['description'] ?? $article['shortDesc'] ?? '' }}</p>
            
            <div style="background: #f8f9fa; padding: 1rem; border-radius: 6px; text-align: left; margin-top: 1rem;">
                <p><strong>Дата публикации:</strong> {{ $article['date'] ?? 'Нет даты' }}</p>
                <p><strong>Просмотры:</strong> {{ $article['views'] ?? 0 }}</p>
                <p><strong>Полное описание:</strong> {{ $article['content'] ?? $article['desc'] ?? '' }}</p>
            </div>
        </div>
    @else
        <div style="text-align: center; padding: 2rem;">
            <p style="font-size: 1.2rem;">Изображение не найдено</p>
        </div>
    @endif
    
    @if(count($articles) > 0)
        <h2 class="page-title">Все изображения</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1.5rem;">
            @foreach($articles as $art)
            <div class="gallery-item">
                <a href="{{ route('gallery.show', $art['id'] ?? $loop->iteration) }}">
                    <img src="{{ asset($art['preview_image'] ?? '') }}" 
                         alt="{{ $art['title'] ?? $art['name'] ?? '' }}" 
                         class="article-card-img">
                </a>
                <div class="article-card-body">
                    <h3 style="font-size: 1rem;">{{ $art['title'] ?? $art['name'] ?? '' }}</h3>
                    <p style="font-size: 0.9rem; color: #666; margin: 0.5rem 0;">
                        {{ $art['date'] ?? '' }}
                    </p>
                    <a href="{{ route('gallery.show', $art['id'] ?? $loop->iteration) }}" 
                       class="btn {{ $article && ($art['id'] ?? $loop->iteration) == ($article['id'] ?? 0) ? 'btn-primary' : 'btn-secondary' }}"
                       style="margin-top: 0.5rem; display: block; text-align: center;">
                        {{ $article && ($art['id'] ?? $loop->iteration) == ($article['id'] ?? 0) ? 'Смотрите сейчас' : 'Посмотреть' }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
    
    <div style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem;">
        <a href="{{ route('home') }}" class="btn btn-secondary">На главную</a>
        <a href="{{ route('about') }}" class="btn btn-primary">О нас</a>
    </div>
</div>
@endsection