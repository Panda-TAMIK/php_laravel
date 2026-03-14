@extends('layout')
@section('content')
@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/">Главная</a></li>
  <li class="breadcrumb-item active" aria-current="page">Модерация комментариев</li>
@endsection

<div class="d-flex align-items-center justify-content-between mb-3">
  <h1 class="h4 mb-0">Модерация комментариев</h1>
  <span class="text-muted small">Всего на странице: {{ $comments->count() }}</span>
</div>

@forelse($comments as $comment)
  <div class="card mb-3 shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between gap-3 flex-wrap">
        <div>
          <div class="small text-muted">Автор</div>
          <div class="fw-semibold">{{ \App\Models\User::findOrFail($comment->user_id)->name }}</div>
        </div>
        <div>
          <div class="small text-muted">Дата</div>
          <div class="fw-semibold">{{ $comment->created_at->format('d.m.Y H:i') }}</div>
        </div>
        <div class="flex-grow-1">
          <div class="small text-muted">Статья</div>
          <div class="fw-semibold">
            <a href="/article/{{ \App\Models\Article::findOrFail($comment->article_id)->id }}">
              {{ \App\Models\Article::findOrFail($comment->article_id)->title }}
            </a>
          </div>
        </div>
        <div>
          @if($comment->accept)
            <span class="badge text-bg-success">Принят</span>
          @else
            <span class="badge text-bg-warning">На модерации</span>
          @endif
        </div>
      </div>

      <hr class="my-3">
      <p class="mb-3">{{ $comment->text }}</p>

      <div class="d-flex gap-2">
        @if(!$comment->accept)
          <a href="/comment/accept/{{ $comment->id }}" class="btn btn-sm btn-success">Принять</a>
        @else
          <a href="/comment/reject/{{ $comment->id }}" class="btn btn-sm btn-outline-warning">Вернуть на модерацию</a>
        @endif
      </div>
    </div>
  </div>
@empty
  <div class="alert alert-info" role="alert">
    Пока нет комментариев для модерации.
  </div>
@endforelse

<div class="mt-4">
  {{ $comments->links() }}
</div>
@endsection