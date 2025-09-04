@extends('layouts.app')

@section('content')
<h1 class="mb-4">Фільми</h1>
<div class="row">
    @foreach($movies as $movie)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <img src="{{ $movie->poster_url ? $movie->poster_url : '/images/default-poster.jpg' }}" class="card-img-top" alt="{{ $movie->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
                <p class="card-text">
                    <strong>Жанри:</strong>
                    @foreach($movie->genres as $genre)
                        <span class="badge bg-secondary">{{ $genre->name }}</span>
                    @endforeach
                </p>
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
@endsection
