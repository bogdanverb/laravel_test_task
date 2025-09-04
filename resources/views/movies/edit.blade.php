
@extends('layouts.app')

@section('content')
<h1 class="mb-4">Редагувати фільм</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Назва фільму</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $movie->title) }}" required>
    </div>
    <div class="mb-3">
        <label for="poster" class="form-label">Постер</label>
        <input type="file" name="poster" id="poster" class="form-control">
        @if($movie->poster_url)
            <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>
    <div class="mb-3">
        <label for="genres" class="form-label">Жанри</label>
        <select name="genres[]" id="genres" class="form-select" multiple required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" @if($movie->genres->contains($genre->id)) selected @endif>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Зберегти</button>
    <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Відміна</a>
</form>
@endsection
