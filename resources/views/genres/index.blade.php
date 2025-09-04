@extends('layouts.app')

@section('content')
<h1 class="mb-4">Жанри</h1>
<div class="row">
    @foreach($genres as $genre)
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $genre->name }}</h5>
                <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-outline-primary">Фільми жанру</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
