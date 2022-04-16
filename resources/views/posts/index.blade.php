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
    <div class="container py-4">
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
                        <td>{{ $post->title }}</td>
                        <td>{{ substr($post->body, 30).'...' }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <button class="btn btn-outline-info">Show</button>
                            <button class="btn btn-outline-warning">Edit</button>
                            <button class="btn btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>
