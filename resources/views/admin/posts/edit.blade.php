@extends('layouts.app')

@section('content')
    <div class="container">
      <header>
        <h1>Edit Post</h1>
      </header>
      <section id="form">
        <form method="post" action="{{ route('admin.posts.update', $post->id) }}">
          @csrf
          @method('PATCH')

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
          </div>

          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
          </div>

          <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $post->image }}">
          </div>
          
          <button type="submit" class="btn btn-success">Save</button>
        </form>
      </section>
    </div>
@endsection