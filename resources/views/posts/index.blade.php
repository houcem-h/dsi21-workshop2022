<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    @if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <a href="{{route('posts.create')}}" type="button" class="btn btn-primary">New post</a>
    <h2>Posts list</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ Str::substr($post->title, 0, 30).'...' }}</td>
                    <td>{{ Str::substr($post->body, 0, 30).'...' }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning">Edit</a>
                        <a href="#" class="btn btn-outline-danger"
                        onclick="event.preventDefault();
                        document.querySelector('#delete-post-form-{{ $post->id }}').submit();"
                        >Delete</a>
                        <form id="delete-post-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
