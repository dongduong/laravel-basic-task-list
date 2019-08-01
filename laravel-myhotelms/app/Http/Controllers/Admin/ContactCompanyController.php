<?php

namespace App\Http\Controllers\Admin;

use App\ContactCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactCompanyRequest;
use App\Http\Requests\StoreContactCompanyRequest;
use App\Http\Requests\UpdateContactCompanyRequest;

class ContactCompanyController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('contact_company_access'), 403);

        $contactCompanies = ContactCompany::all();

        return view('admin.contactCompanies.index', compact('contactCompanies'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('contact_company_create'), 403);

        return view('admin.contactCompanies.create');
    }

    public function store(StoreContactCompanyRequest $request)
    {
        abort_unless(\Gate::allows('contact_company_create'), 403);

        $contactCompany = ContactCompany::create($request->all());

        return redirect()->route('admin.contact-companies.index');
    }

    public function edit(ContactCompany $contactCompany)
    {
        abort_unless(\Gate::allows('contact_company_edit'), 403);

        return view('admin.contactCompanies.edit', compact('contactCompany'));
    }

    public function update(UpdateContactCompanyRequest $request, ContactCompany $contactCompany)
    {
        abort_unless(\Gate::allows('contact_company_edit'), 403);

        $contactCompany->update($request->all());

        return redirect()->route('admin.contact-companies.index');
    }

    public function show(ContactCompany $contactCompany)
    {
        abort_unless(\Gate::allows('contact_company_show'), 403);

        return view('admin.contactCompanies.show', compact('contactCompany'));
    }

    public function destroy(ContactCompany $contactCompany)
    {
        abort_unless(\Gate::allows('contact_company_delete'), 403);

        $contactCompany->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactCompanyRequest $request)
    {
        ContactCompany::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
