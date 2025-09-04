<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Вивід списку фільмів
    public function index()
    {
        $movies = \App\Models\Movie::with('genres')->paginate(10);
        return view('movies.index', compact('movies'));
    }

    // Форма додавання фільму
    public function create()
    {
        $genres = \App\Models\Genre::all();
        return view('movies.create', compact('genres'));
    }

    // Збереження нового фільму
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|max:2048',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        // Якщо є постер — зберігаємо, якщо ні — ставимо дефолт
        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $posterUrl = '/storage/' . $path;
        } else {
            $posterUrl = '/images/default-poster.jpg';
        }

        $movie = \App\Models\Movie::create([
            'title' => $validated['title'],
            'poster_url' => $posterUrl,
            'is_published' => false,
        ]);
        $movie->genres()->attach($validated['genres']);

        return redirect()->route('movies.index')->with('success', 'Фільм успішно створено!');
    }

    // Детальна сторінка фільму
    public function show(string $id)
    {
        $movie = \App\Models\Movie::with('genres')->findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    // Форма редагування фільму
    public function edit(string $id)
    {
        $movie = \App\Models\Movie::findOrFail($id);
        $genres = \App\Models\Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    // Оновлення фільму
    public function update(Request $request, string $id)
    {
        $movie = \App\Models\Movie::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'poster' => 'nullable|image|max:2048',
            'genres' => 'sometimes|required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        // Якщо є новий постер — оновлюємо
        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $movie->poster_url = '/storage/' . $path;
        }
        if (isset($validated['title'])) {
            $movie->title = $validated['title'];
        }
        $movie->save();
        if (isset($validated['genres'])) {
            $movie->genres()->sync($validated['genres']);
        }
        return redirect()->route('movies.index')->with('success', 'Фільм оновлено!');
    }

    // Видалення фільму
    public function destroy(string $id)
    {
        $movie = \App\Models\Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Фільм видалено!');
    }

    // Публікація фільму
    public function publish($id)
    {
        $movie = \App\Models\Movie::findOrFail($id);
        $movie->is_published = true;
        $movie->save();
        return redirect()->route('movies.index')->with('success', 'Фільм опубліковано!');
    }
}
