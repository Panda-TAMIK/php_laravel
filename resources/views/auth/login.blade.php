@extends('layout')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/">Главная</a></li>
  <li class="breadcrumb-item active" aria-current="page">Вход</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="h4 mb-3">Вход</h1>

                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    Проверьте данные и попробуйте снова.
                </div>
                @endif

                <form action="/auth/authenticate" method="POST">
                    @CSRF
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Войти</button>
                </form>

                <div class="small text-muted mt-3">
                    Нет аккаунта? <a href="/auth/signin">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection