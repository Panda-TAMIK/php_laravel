@extends('layout')

@section('content')
    @if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{session('message')}}
    </div>
@endif

<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title text-center ">{{$article->title}}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{$article->publish_date}}</h6>
        <p class="card-text">{{$article->text}}</p>
        @can('create')
        <div class="btn-toolbar mt-3" role="toolbar">
            <a href="/article/{{$article->id}}/edit" class="btn btn-primary me-3">Edit article</a>
            <form action="/article/{{$article->id}}" method="post">
                @METHOD("DELETE")
                @CSRF
                <button type="submit" class="btn btn-warning me-3">Delete article</button>
            </form>
        </div>
        @endcan
    </div>
</div>

@auth
<h2 class="mt-4">New Comment</h2>
<ul class="list-group mb-3">
    @foreach($errors->all() as $error)
        <li class="list-group-item list-item-danger">{{$error}}</li>
    @endforeach
  </ul>
<form action="{{ route('comment.store') }}" method="POST">
  @CSRF
  <div class="mb-3">
    <label for="text" class="form-label">Enter comment</label>
    <textarea name="text" id="text" class="form-control" rows="3"></textarea>
  </div>
  <input type="hidden" name="article_id" value="{{$article->id}}">
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@else
  <div class="alert alert-info mt-4" role="alert">
    To add a comment, please <a href="/auth/login" class="alert-link">log in</a> or <a href="/auth/signin" class="alert-link">register</a>.
  </div>
@endauth

<h3 class="mt-5 mb-3">Comments</h3>
@forelse($comments as $comment)
<div class="card mb-3">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <span class="fw-semibold">{{ $comment->user->name ?? 'Unknown user' }}</span>
        <span class="text-muted small">{{ $comment->created_at->format('d.m.Y H:i') }}</span>
    </div>
    @if(!$comment->accept)
        <span class="badge text-bg-warning mb-2">On moderation</span>
    @endif
    <p class="card-text mb-0">{{ $comment->text }}</p>
    @can('comment', $comment)
      <div class="btn-toolbar mt-3" role="toolbar">
        <a href="/comment/edit/{{$comment->id}}" class="btn btn-sm btn-primary me-2">Edit</a>
        <a href="/comment/delete/{{$comment->id}}" class="btn btn-sm btn-outline-danger">Delete</a>
      </div>
    @endcan
  </div>
</div>
@empty
  <p class="text-muted">No comments yet.</p>
@endforelse
@endsection