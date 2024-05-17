<?php

namespace App\Http\Controllers;

use App\Helpers\ClientHelper;
use App\Http\Requests\StoreclientRequest;
use App\Http\Requests\UpdateclientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{

    public $client;

    public function __construct()
    {
        $this->client = new ClientHelper();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Otener todos los clientes para buscar
        $search = $request->get("search","");

        // Llamar el metodo con los datos
        $clients = $this->client->getClient($search);


        return Inertia::render('Client/Index',[
            'clients' => $clients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreclientRequest $request)
    {
        try {
             //Guardar los datos validado
            Client::create($request->validated());

            // Retornar hacia atras
            return back();



        } catch (\Throwable $th) {
            throw $th;
        }

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclientRequest $request, client $client)
    {
        // Actualizar los datos
        try {

            // Actualizar todo los datos
            $client->update($request->validated());

            // Retornar hacia atras
            return back();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        try {

            // Actualizar el status
            $client->status = true;

            // Guardar los datos
            $client->save();

            // Devolver hacia atras
            return back();


        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
