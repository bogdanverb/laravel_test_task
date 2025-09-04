<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
    return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255', // Назва фільму обов'язкова
            'poster' => 'nullable|image|max:2048', // Можна додати постер (зображення)
            'genres' => 'required|array', // Жанри обов'язкові
            'genres.*' => 'exists:genres,id', // Кожен жанр має існувати
        ];
    }
}
