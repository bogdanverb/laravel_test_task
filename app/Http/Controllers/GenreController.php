<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class GenreController extends Controller
{
    // Вивід списку жанрів
    public function index()
    {
        $genres = \App\Models\Genre::all();
        return view('genres.index', ['genres' => $genres]);
    }

    // Детальна сторінка жанру
    public function show(string $id)
    {
        $genre = \App\Models\Genre::findOrFail($id);
        $movies = $genre->movies()->with('genres')->paginate(10);
        return view('genres.show', ['genre' => $genre, 'movies' => $movies]);
    }
}
