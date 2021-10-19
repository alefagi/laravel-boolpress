@extends('layouts.app')
@section('content')
  <div class="container">
    @if(session('alert-message'))
    <div class="alert alert-{{ session('alert-type') }}">
      {{ session('alert-message') }}
    </div>
    @endif
    <header class="mb-5 d-flex justify-content-between align-items-center">
      <h1>My Posts</h1>
      <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Add Post</a>
    </header>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Created At</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($posts as $post)
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->getFormattedDate('created_at') }}</td>
            <td class="d-flex align-items-start @if($loop->first) border-top-0 @endif">
              <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">View</a>
              <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning ml-2">Edit</a>
              <form action="{{ route('admin.posts.destroy', $post->id)}}" method="post" class="ml-2 delete-button">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center">There are no posts to display</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <footer class="d-flex">
      {{ $posts->links() }}
    </footer>
  </div>

  @section('scripts')
  <script>
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(form => {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        const confirm = window.confirm('Are you sure you want to delete this post?');
        if(confirm) this.submit();
      })
    });
  </script>
    
  @endsection
@endsection