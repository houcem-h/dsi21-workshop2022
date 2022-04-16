<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog DSI21</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <div class="container py-4">
        <h2>Posts details</h2>
        <div class="card mb-3">
            <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}<span class="badge bg-primary">{{ $post->category->name }}</span></h5>
              <h5 class="card-title">Author: {{ $post->user->name }}</h5>
              <p class="card-text">{{ $post->body }}</p>
              <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
            </div>
          </div>
    </div>
</body>
</html>
