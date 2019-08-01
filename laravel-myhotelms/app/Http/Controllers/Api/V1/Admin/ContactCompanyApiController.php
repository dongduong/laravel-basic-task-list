<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ContactCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactCompanyRequest;
use App\Http\Requests\UpdateContactCompanyRequest;

class ContactCompanyApiController extends Controller
{
    public function index()
    {
        $contactCompanies = ContactCompany::all();

        return $contactCompanies;
    }

    public function store(StoreContactCompanyRequest $request)
    {
        return ContactCompany::create($request->all());
    }

    public function update(UpdateContactCompanyRequest $request, ContactCompany $contactCompany)
    {
        return $contactCompany->update($request->all());
    }

    public function show(ContactCompany $contactCompany)
    {
        return $contactCompany;
    }

    public function destroy(ContactCompany $contactCompany)
    {
        $contactCompany->delete();

        return response("OK", 200);
    }
}
