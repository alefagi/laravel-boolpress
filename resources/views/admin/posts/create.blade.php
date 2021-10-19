@extends('layouts.app')

@section('content')
    <div class="container">
      <header>
        <h1>Add New Post</h1>
      </header>
      <section id="form">
        <form method="post" action="{{ route('admin.posts.store') }}">
          @csrf

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>

          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" id="image" name="image">
          </div>
          
          <button type="submit" class="btn btn-success">Save</button>
        </form>
      </section>
    </div>
@endsection