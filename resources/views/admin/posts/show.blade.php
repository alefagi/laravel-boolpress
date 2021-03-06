@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    @if ($post->cover)
      <img class="img-fluid mb-2" src="{{ asset('storage/' . $post->cover) }}">
    @endif
    <address>Author: @if($post->user) {{ $post->user->name }} @else Anonymous @endif</address>
    <address>{{ $post->getFormattedDate('created_at') }}</address>
    <address>Category: @if($post->category) {{ $post->category->name }} @else No category @endif</address>
    <div class="d-flex justify-content-end">
      <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning ml-2">Edit</a>

      <form action="{{ route('admin.posts.destroy', $post->id)}}" method="post" class="ml-2 delete-button">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>

      <a href="{{ route('admin.posts.index') }}" class="ml-2 btn btn-secondary">Back to posts lists</a>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection