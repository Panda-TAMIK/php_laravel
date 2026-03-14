@extends('layout')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/">Главная</a></li>
  <li class="breadcrumb-item"><a href="/article">Статьи</a></li>
  <li class="breadcrumb-item active" aria-current="page">Новая статья</li>
@endsection

@section('content')
  @if($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card shadow-sm">
    <div class="card-body">
      <h1 class="h4 mb-4">Новая статья</h1>

      <form action="{{ route('article.store') }}" method="POST">
        @CSRF
        <div class="mb-3">
          <label for="date" class="form-label">Дата публикации</label>
          <input type="date" class="form-control" id="date" name="date" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Заголовок</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" minlength="3" maxlength="255" placeholder="Не менее 3 символов" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Текст статьи</label>
          <textarea class="form-control" id="text" name="text" rows="12" maxlength="255" placeholder="Введите текст статьи (до 255 символов)." required>{{ old('text') }}</textarea>
        <div class="form-text">Максимум 255 символов.</div>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('article.index') }}" class="btn btn-outline-secondary">Отмена</a>
      </form>
    </div>
  </div>
@endsection