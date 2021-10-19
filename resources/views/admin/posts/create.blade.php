@extends('layouts.app')

@section('content')
    <div class="container">
      @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif
      <header class="d-flex justify-content-between align-items-center">
        <h1>Add New Post</h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
      </header>
      <section id="form">
        @include('partials.admin.posts.form')
      </section>
    </div>
@endsection