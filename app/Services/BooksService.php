<?php

namespace App\Services;

class BooksService
{
    private $googleApiService;

    function __construct(GoogleApiService $googleApiService)
    {
        $this->googleApiService = $googleApiService;
    }

    public function search(string $search)
    {
        $books = $this->googleApiService->search($search);
        $books = collect($books['items']);
        $books = $books->map(function ($book) {
            return [
                "id" => $book['id'],
                "title"  => $book['volumeInfo']['title'],
                "description" => $book['volumeInfo']['description'] ?? '',
                "previewLink" => $book['volumeInfo']['previewLink'],
            ];
        });

        return $books;
    }
}
