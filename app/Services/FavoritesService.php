<?php

namespace App\Services;

use App\Models\Favorite;
use Exception;
use Illuminate\Support\Arr;

class FavoritesService
{

    public function get()
    {
        return Favorite::all();
    }


    public function create($book)
    {
        try {
            Favorite::create($book);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }

    public function delete(Favorite $favorite)
    {
        try {
            $favorite->delete();
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }
}
