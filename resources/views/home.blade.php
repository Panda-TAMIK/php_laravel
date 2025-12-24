@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
<div class="page-content">
    <h1 class="page-title">Добро пожаловать!</h1>
    
    <div style="text-align: center; margin-bottom: 2rem;">
        <p style="font-size: 1.1rem; color: #666;">
            Демонстрационный проект на Laravel
        </p>
    </div>
    
    @if(count($articles) > 0)
        <h2 class="page-title">Последние статьи</h2>
        
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Изображение</th>
                        <th>Название</th>
                        <th>Краткое описание</th>
                        <th>Дата</th>
                        <th>Просмотры</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article['id'] ?? $loop->iteration }}</td>
                        <td>
                            @if(isset($article['preview_image']))
                            <a href="{{ route('gallery.show', $article['id'] ?? $loop->iteration) }}">
                                <img src="{{ asset($article['preview_image']) }}" 
                                     alt="{{ $article['title'] ?? $article['name'] ?? '' }}" 
                                     class="preview-img">
                            </a>
                            @endif
                        </td>
                        <td style="font-weight: bold;">{{ $article['title'] ?? $article['name'] ?? '' }}</td>
                        <td>
                            @php
                                $desc = $article['description'] ?? $article['shortDesc'] ?? '';
                                echo strlen($desc) > 50 ? substr($desc, 0, 50) . '...' : $desc;
                            @endphp
                        </td>
                        <td>{{ $article['date'] ?? 'Нет даты' }}</td>
                        <td style="text-align: center;">{{ $article['views'] ?? 0 }}</td>
                        <td>
                            <a href="{{ route('gallery.show', $article['id'] ?? $loop->iteration) }}" class="btn btn-primary">
                                Смотреть
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
            @foreach($articles as $article)
            <div class="article-card">
                <a href="{{ route('gallery.show', $article['id'] ?? $loop->iteration) }}">
                    <img src="{{ asset($article['preview_image'] ?? '') }}"
                         alt="{{ $article['title'] ?? $article['name'] ?? '' }}"
                         class="article-card-img">
                </a>
                <div class="article-card-body">
                    <h3>{{ $article['title'] ?? $article['name'] ?? '' }}</h3>
                    <p style="color: #666; margin: 0.5rem 0;">
                        @php
                            $desc = $article['description'] ?? $article['shortDesc'] ?? '';
                            echo strlen($desc) > 100 ? substr($desc, 0, 100) . '...' : $desc;
                        @endphp
                    </p>
                    <div style="display: flex; justify-content: space-between; margin-top: 1rem; font-size: 0.9rem;">
                        <span style="color: #7f8c8d;">{{ $article['date'] ?? '' }}</span>
                        <span style="color: #7f8c8d;">{{ $article['views'] ?? 0 }} просмотров</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div style="text-align: center; padding: 3rem; background: #f8f9fa; border-radius: 8px;">
            <h3>Статьи не найдены</h3>
            <p>Создайте файл <code>public/articles.json</code> с данными</p>
        </div>
    @endif
    
    <div style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem;">
        <a href="{{ route('about') }}" class="btn btn-primary">О нас</a>
        <a href="{{ route('contacts') }}" class="btn btn-success">Контакты</a>
        <a href="{{ route('gallery') }}" class="btn btn-secondary">Галерея</a>
    </div>
</div>
@endsection