<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Services\FavoritesService;
use Exception;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function get(FavoritesService $favoriteServices)
    {
        try {
            return $favoriteServices->get();
        } catch (Exception $e) {
            return response('Erro ao processar', 500);
        }
    }

    public function create(Request $request, FavoritesService $favoriteServices)
    {
        try {
            $favoriteServices->create($request->all('book'));
            return response('Favorito adicionado com sucesso', 201);
        } catch (Exception $e) {
            return response('Erro ao processar', 500);
        }
    }

    public function delete(Favorite $favorite, FavoritesService $favoriteServices)
    {
        try {
            $favoriteServices->delete($favorite);
            return $favoriteServices->get();
        } catch (Exception $e) {
            return response('Erro ao processar', 500);
        }
    }
}
