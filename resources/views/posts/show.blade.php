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

<h2>Posts details</h2>
<div class="card mb-3">
    <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="{{ $post->title }}">
    <div class="card-body">
      <h5 class="card-title">{{ $post->title }}<span class="badge bg-primary">{{ $post->category->name }}</span></h5>
      <h5 class="card-title">Author: {{ $post->user->name }}</h5>
      <p class="card-text">{{ $post->body }}</p>
      <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
    </div>
  </div>
</x-app-layout>
