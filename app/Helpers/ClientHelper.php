<?php

namespace App\Helpers;

use App\Models\Client;
use Illuminate\Contracts\Pagination\Paginator;

Class ClientHelper {

    // Obtener todo los datos del del usuario por la busqueda
    public function getClient(?String $search = ""): Paginator
    {
        // Buscar los datos por su campo
        $clients = Client::where('status',false)
            ->when($search, function ($query) use ($search) {
                $query->where('name','like','%'.$search.'%')
                ->orWhere('last_name','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('phone','like','%'.$search.'%');
            })
            ->latest()
            ->simplePaginate();

        // Devolver los datos a la vista
        return $clients;
    }
}
