@extends('layouts.app')

@section('content')
<h1 class="mb-4">Додати фільм</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf
    <div class="mb-3">
    <label for="title" class="form-label">Назва фільму</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
    <label for="poster" class="form-label">Постер</label>
        <input type="file" name="poster" id="poster" class="form-control">
    </div>
    <div class="mb-3">
    <label for="genres" class="form-label">Жанри</label>
        <select name="genres[]" id="genres" class="form-select" multiple required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Зберегти</button>
    <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Відміна</a>
</form>
@endsection
