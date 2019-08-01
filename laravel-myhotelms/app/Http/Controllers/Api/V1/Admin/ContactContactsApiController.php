<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactContactRequest;
use App\Http\Requests\UpdateContactContactRequest;

class ContactContactsApiController extends Controller
{
    public function index()
    {
        $contactContacts = ContactContact::all();

        return $contactContacts;
    }

    public function store(StoreContactContactRequest $request)
    {
        return ContactContact::create($request->all());
    }

    public function update(UpdateContactContactRequest $request, ContactContact $contactContact)
    {
        return $contactContact->update($request->all());
    }

    public function show(ContactContact $contactContact)
    {
        return $contactContact;
    }

    public function destroy(ContactContact $contactContact)
    {
        $contactContact->delete();

        return response("OK", 200);
    }
}
