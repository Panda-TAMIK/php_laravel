@extends('layout')

@section('content')
    <div class="row g-4">
        @foreach($articles as $article)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    @if(!empty($article->preview_image))
                        <a href="/full_image/{{ $article->full_image }}">
                            <img
                                src="{{ URL::asset($article->preview_image) }}"
                                class="card-img-top"
                                alt="{{ $article->name }}"
                            >
                        </a>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <div class="mb-2 text-muted small">
                            {{ \Carbon\Carbon::parse($article->date)->format('d.m.Y') }}
                        </div>

                        <h5 class="card-title">
                            <a href="/full_image/{{ $article->full_image }}" class="stretched-link text-decoration-none text-dark">
                                {{ $article->name }}
                            </a>
                        </h5>

                        <p class="card-text text-muted mb-2">
                            {{ $article->shortDesc }}
                        </p>

                        <p class="card-text flex-grow-1 text-truncate" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $article->desc }}
                        </p>

                        <div class="mt-3">
                            <a href="/full_image/{{ $article->full_image }}" class="btn btn-sm btn-outline-primary">
                                Открыть статью
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection