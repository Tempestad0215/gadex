<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessengerRequest;
use App\Http\Requests\UpdateMessengerRequest;
use App\Models\Messenger;

class MessengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessengerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Messenger $messenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messenger $messenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessengerRequest $request, Messenger $messenger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messenger $messenger)
    {
        //
    }
}