<?php

namespace App\Http\Controllers;

use App\Helpers\MessengerHelper;
use App\Http\Requests\StoreMessengerRequest;
use App\Http\Requests\UpdateMessengerRequest;
use App\Models\Messenger;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessengerController extends Controller
{
    private $messenger;

    public function __construct()
    {
        $this->messenger = new MessengerHelper();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Devolver la vista
        $search = $request->get("search");

        $messengerData = $this->messenger->getMessenger($search);

        return Inertia::render('Messenger/Index',[
            'messengers' => $messengerData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessengerRequest $request)
    {
        try {

            // Guiardar los datos validados
            Messenger::create($request->validated());

            // retornar hacia atras
            return back();

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessengerRequest $request, Messenger $messenger)
    {
        try {

            // Datos actualizados
            $messenger->update($request->validated());

            // Retornar hacia atras
            return back();


        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messenger $messenger)
    {
        try {

            // Poner los datos en true para no mostrarlo
            $messenger->update([
                'status' => true
            ]);

            return back();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
