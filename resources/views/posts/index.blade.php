@extends('layouts.app')

@section('content')
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
                    <a href="/posts/{{ $post->id }}" class="btn btn-outline-info">Show</a>
                    <button class="btn btn-outline-warning">Edit</button>
                    <button class="btn btn-outline-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
