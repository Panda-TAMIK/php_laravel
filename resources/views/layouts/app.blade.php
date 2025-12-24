<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Karginov - 241-3210')</title>
    <!-- Подключаем CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="{{ route('home') }}" class="logo">Laravel Project</a>
                <ul class="nav-menu">
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('gallery') }}">Галерея</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('contacts') }}">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>Курганов Павел, группа 241-3210</p>
            <p>&copy; {{ date('Y') }} Лабораторная работа по Laravel</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>