@extends('layouts.app')

@section('content')
<h2 class="mb-4">Фільми жанру: {{ $genre->name }}</h2>
<div class="row">
    @foreach($movies as $movie)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
                <p class="card-text">
                    <strong>Статус:</strong> {{ $movie->is_published ? 'Опубліковано' : 'Чернетка' }}
                </p>
                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-primary">Детальніше</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center">
    {{ $movies->links() }}
</div>
<a href="{{ route('genres.index') }}" class="btn btn-outline-secondary">Назад до жанрів</a>
@endsection
