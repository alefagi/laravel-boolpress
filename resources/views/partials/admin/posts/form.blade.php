@if ($post->exists)
  <form method="post" action="{{ route('admin.posts.update', $post->id) }}">
    @method('PATCH')
    
  @else
  <form method="post" action="{{ route('admin.posts.store') }}">
    
@endif

  @csrf

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
    @error('title') 
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
    @error('content') 
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $post->image) }}">
    @error('image') 
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control" id="category_id" name="category_id">
      <option value="">No category</option>
      @foreach ($categories as $category)
          <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <fieldset class="mb-4">
    <h6>Tags</h6>
    @foreach ($tags as $tag)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]" @if (in_array($tag->id, old('tags', []))) checked @endif>
        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
      </div>
    @endforeach
  </fieldset>
  
  <button type="submit" class="btn btn-success">Save</button>
</form>