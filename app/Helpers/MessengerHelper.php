<?php

namespace App\Helpers;

use App\Models\Messenger;
use Illuminate\Contracts\Pagination\Paginator;

Class MessengerHelper {

    public function getMessenger(?String $search = ""): Paginator
    {
        // Buscar los datos por su campo
        $clients = Messenger::where('status',false)
            ->when($search, function ($query) use ($search) {
                $query->where('name','like','%'.$search.'%')
                ->orWhere('last_name','like','%'.$search.'%')
                ->orWhere('phone','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('company','like','%'.$search.'%')
                ->orWhere('company_phone','like','%'.$search.'%');
            })
            ->latest()
            ->simplePaginate();

        // Devolver los datos a la vista
        return $clients;
    }
}
