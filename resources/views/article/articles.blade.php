@extends('layout')

@section('content')

@if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

<div class="row g-4">
    @foreach($articles as $article)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <div class="mb-2 text-muted small">
                        {{ \Carbon\Carbon::parse($article->publish_date)->format('d.m.Y') }}
                    </div>

                    <h5 class="card-title">
                        <a href="{{ route('article.show', ['article' => $article->id]) }}">
                            {{ $article->title }}
                        </a>
                    </h5>

                    <p class="card-text text-muted flex-grow-1">
                        {{ $article->text }}
                    </p>

                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <span class="small text-secondary">
                            {{ \App\Models\User::findOrFail($article->users_id)->name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $articles->links() }}
</div>
@endsection