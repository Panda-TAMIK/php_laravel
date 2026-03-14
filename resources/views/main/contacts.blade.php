@extends('layout')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/">Главная</a></li>
  <li class="breadcrumb-item active" aria-current="page">Контакты</li>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h3 mb-3">Контакты</h1>
                    <p class="text-muted mb-4">Если есть вопросы по проекту — можно связаться любым удобным способом.</p>

                    <div class="list-group">
                        <div class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Организация</span>
                            <span class="fw-semibold">{{ $contacts['name'] }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Адрес</span>
                            <span class="fw-semibold">{{ $contacts['address'] }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Телефон</span>
                            <span class="fw-semibold">{{ $contacts['phone'] }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Email</span>
                            <a class="fw-semibold" href="mailto:{{ $contacts['email'] }}">{{ $contacts['email'] }}</a>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="/" class="btn btn-outline-secondary">← На главную</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection