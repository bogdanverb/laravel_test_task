<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieApiController extends Controller
{
    // GET /api/movies
    public function index()
    {
        $movies = \App\Models\Movie::with('genres')->paginate(10);
        return response()->json($movies);
    }

    // GET /api/movies/{id}
    public function show($id)
    {
        $movie = \App\Models\Movie::with('genres')->findOrFail($id);
        return response()->json($movie);
    }
}
