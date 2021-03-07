<?php

namespace App\Services;

class BooksService
{
    private $googleApiService;
    private $favoritesService;

    function __construct(GoogleApiService $googleApiService, FavoritesService $favoritesService)
    {
        $this->googleApiService = $googleApiService;
        $this->favoritesService = $favoritesService;
    }

    public function search(string $search)
    {
        $books = $this->googleApiService->search($search);
        $books = collect($books['items']);
        $books = $books->map(function ($book) {

            $id = $book['id'];

            $image = '';

            if (isset($book['volumeInfo']['imageLinks'])) {
                $image = $book['volumeInfo']['imageLinks']['thumbnail'];
            }

            return [
                "id" => $id,
                "title"  => $book['volumeInfo']['title'],
                "image" => $image,
                "description" => $book['volumeInfo']['description'] ?? '',
                "previewLink" => $book['volumeInfo']['previewLink'],
            ];
        });

        return $books;
    }
}
