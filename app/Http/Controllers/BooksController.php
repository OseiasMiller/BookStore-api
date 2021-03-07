<?php

namespace App\Http\Controllers;

use App\Services\BooksService;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function search(string $search, BooksService $bookService)
    {
        $books = $bookService->search($search);
        return response()->json($books);
    }
}
