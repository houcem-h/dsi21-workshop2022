<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" aria-describedby="emailHelp">
          @error('title')
            <small class="text-danger">{{ $message }}</small>
          @enderror

        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" name="body" id="body" rows="3">{{ old('body') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image" aria-describedby="emailHelp">
            @error('image')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        <div class="mb-3">
            <label for="user" class="form-label">Author</label>
            <select class="form-select" name="user_id" id="user" aria-label="Default select example">
                <option selected>Select the Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category" aria-label="Default select example">
                <option selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-app-layout>
