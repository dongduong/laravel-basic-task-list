<?php

namespace App\Http\Controllers\Admin;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuestRequest;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;

class GuestsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('guest_access'), 403);

        $guests = Guest::all();

        return view('admin.guests.index', compact('guests'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('guest_create'), 403);

        return view('admin.guests.create');
    }

    public function store(StoreGuestRequest $request)
    {
        abort_unless(\Gate::allows('guest_create'), 403);

        $guest = Guest::create($request->all());

        return redirect()->route('admin.guests.index');
    }

    public function edit(Guest $guest)
    {
        abort_unless(\Gate::allows('guest_edit'), 403);

        return view('admin.guests.edit', compact('guest'));
    }

    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        abort_unless(\Gate::allows('guest_edit'), 403);

        $guest->update($request->all());

        return redirect()->route('admin.guests.index');
    }

    public function show(Guest $guest)
    {
        abort_unless(\Gate::allows('guest_show'), 403);

        return view('admin.guests.show', compact('guest'));
    }

    public function destroy(Guest $guest)
    {
        abort_unless(\Gate::allows('guest_delete'), 403);

        $guest->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuestRequest $request)
    {
        Guest::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
