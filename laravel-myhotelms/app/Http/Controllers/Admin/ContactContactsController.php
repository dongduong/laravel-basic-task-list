<?php

namespace App\Http\Controllers\Admin;

use App\ContactCompany;
use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactContactRequest;
use App\Http\Requests\StoreContactContactRequest;
use App\Http\Requests\UpdateContactContactRequest;

class ContactContactsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('contact_contact_access'), 403);

        $contactContacts = ContactContact::all();

        return view('admin.contactContacts.index', compact('contactContacts'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('contact_contact_create'), 403);

        $companies = ContactCompany::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contactContacts.create', compact('companies'));
    }

    public function store(StoreContactContactRequest $request)
    {
        abort_unless(\Gate::allows('contact_contact_create'), 403);

        $contactContact = ContactContact::create($request->all());

        return redirect()->route('admin.contact-contacts.index');
    }

    public function edit(ContactContact $contactContact)
    {
        abort_unless(\Gate::allows('contact_contact_edit'), 403);

        $companies = ContactCompany::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contactContact->load('company');

        return view('admin.contactContacts.edit', compact('companies', 'contactContact'));
    }

    public function update(UpdateContactContactRequest $request, ContactContact $contactContact)
    {
        abort_unless(\Gate::allows('contact_contact_edit'), 403);

        $contactContact->update($request->all());

        return redirect()->route('admin.contact-contacts.index');
    }

    public function show(ContactContact $contactContact)
    {
        abort_unless(\Gate::allows('contact_contact_show'), 403);

        $contactContact->load('company');

        return view('admin.contactContacts.show', compact('contactContact'));
    }

    public function destroy(ContactContact $contactContact)
    {
        abort_unless(\Gate::allows('contact_contact_delete'), 403);

        $contactContact->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactContactRequest $request)
    {
        ContactContact::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
