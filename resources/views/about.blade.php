@extends('layouts.app')

@section('title', 'О нас')

@section('content')
<div class="page-content">
    <h1 class="page-title">О нашей компании</h1>
    
    <div style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Наша история</h3>
        <p>Мы - команда энтузиастов, которая начала свой путь в 2020 году. Наша цель - создавать качественные веб-приложения с использованием современных технологий.</p>
        
        <p>Специализируемся на разработке сайтов и веб-приложений на Laravel - мощном PHP-фреймворке, который позволяет создавать надежные и масштабируемые решения.</p>
    </div>
    
    <div style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Наши ценности</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
            <div style="padding: 1rem; background: #fff8e1; border-radius: 6px;">
                <h4 style="color: #e67e22;">Качество</h4>
                <p>Мы уделяем внимание каждой детали, чтобы результат превосходил ожидания.</p>
            </div>
            <div style="padding: 1rem; background: #e8f5e9; border-radius: 6px;">
                <h4 style="color: #27ae60;">Инновации</h4>
                <p>Постоянно изучаем новые технологии и внедряем их в наши проекты.</p>
            </div>
            <div style="padding: 1rem; background: #e3f2fd; border-radius: 6px;">
                <h4 style="color: #2980b9;">Поддержка</h4>
                <p>Всегда готовы помочь нашим клиентам и пользователям.</p>
            </div>
        </div>
    </div>
    
    <div style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Наша команда</h3>
        <p>Наша команда состоит из опытных разработчиков, дизайнеров и тестировщиков, которые работают вместе над созданием выдающихся продуктов. Мы верим, что успех проекта зависит от слаженной работы каждого участника команды.</p>
    </div>
    
    <div style="text-align: center; margin-top: 2rem;">
        <a href="{{ route('contacts') }}" 
           style="padding: 0.8rem 1.5rem; background: #3498db; color: white; text-decoration: none; border-radius: 4px;">
            Связаться с нами
        </a>
    </div>
</div>
@endsection