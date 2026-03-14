@extends('layout')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/">Главная</a></li>
  <li class="breadcrumb-item active" aria-current="page">О проекте</li>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h3 mb-3">О проекте</h1>
                    <p class="text-muted mb-3">
                        ArticleHub — учебный проект на Laravel. Здесь можно читать статьи, оставлять комментарии
                        и получать уведомления о новых комментариях после модерации.
                    </p>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="fw-semibold">Статьи</div>
                                <div class="small text-muted">CRUD + просмотр</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="fw-semibold">Комментарии</div>
                                <div class="small text-muted">модерация и уведомления</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="fw-semibold">Права</div>
                                <div class="small text-muted">роль moderator</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <a href="/article" class="btn btn-primary">Перейти к статьям</a>
                        <a href="/contacts" class="btn btn-outline-secondary">Контакты</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection