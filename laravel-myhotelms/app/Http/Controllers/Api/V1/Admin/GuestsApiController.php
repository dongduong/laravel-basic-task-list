<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;

class GuestsApiController extends Controller
{
    public function index()
    {
        $guests = Guest::all();

        return $guests;
    }

    public function store(StoreGuestRequest $request)
    {
        return Guest::create($request->all());
    }

    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        return $guest->update($request->all());
    }

    public function show(Guest $guest)
    {
        return $guest;
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();

        return response("OK", 200);
    }
}
