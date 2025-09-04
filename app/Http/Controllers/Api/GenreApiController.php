<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreApiController extends Controller
{
    // GET /api/genres
    public function index()
    {
        $genres = \App\Models\Genre::all();
        return response()->json($genres);
    }

    // GET /api/genres/{id}
    public function show($id)
    {
        $genre = \App\Models\Genre::findOrFail($id);
        $movies = $genre->movies()->with('genres')->paginate(10);
        return response()->json($movies);
    }
}
