<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Початок',
                'is_published' => false,
                'genres' => ['Бойовик', 'Фантастика']
            ],
            [
                'title' => 'Похмілля у Вегасі',
                'is_published' => false,
                'genres' => ['Комедія']
            ],
            [
                'title' => 'Хрещений батько',
                'is_published' => false,
                'genres' => ['Драма']
            ],
        ];

        foreach ($movies as $data) {
            $movie = \App\Models\Movie::create([
                'title' => $data['title'],
                'is_published' => $data['is_published'],
                'poster_url' => '/images/default-poster.jpg',
            ]);
            $genreIds = \App\Models\Genre::whereIn('name', $data['genres'])->pluck('id');
            $movie->genres()->attach($genreIds);
        }
    }
}
