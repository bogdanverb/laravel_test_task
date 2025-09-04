
@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="row g-0">
        <div class="col-md-4">
                <img src="{{ $movie->poster_url ? $movie->poster_url : asset('images/default-poster.jpg') }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
            <div class="mt-3">
                <video width="100%" controls>
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                    Ваш браузер не підтримує відео.
                </video>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title">{{ $movie->title }}</h2>
                <p class="card-text">
                    <strong>Жанри:</strong>
                    @foreach($movie->genres as $genre)
                        <span class="badge bg-secondary">{{ $genre->name }}</span>
                    @endforeach
                </p>
                <p class="card-text">
                    <strong>Статус:</strong> {{ $movie->is_published ? 'Опубліковано' : 'Чернетка' }}
                </p>
                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Редагувати</a>
                @if(!$movie->is_published)
                    <form action="{{ route('movies.publish', $movie->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Опублікувати</button>
                    </form>
                @endif
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </form>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Назад до списку</a>
@endsection
