@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4 shadow-sm">
                <img src="{{ URL::asset($article->full_image) }}" class="card-img-top" alt="{{ $article->name }}">
                <div class="card-body">
                    <div class="text-muted small mb-2">
                        {{ $article->date }}
                    </div>
                    <h2 class="card-title h4 mb-3">
                        {{ $article->name }}
                    </h2>
                    <p class="card-text">
                        {{ $article->desc }}
                    </p>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary mt-3">
                        ← На главную
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Кратко</h5>
                    <p class="card-text text-muted">
                        {{ $article->shortDesc }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection