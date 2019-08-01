<?php

namespace App\Http\Requests;

use App\ContactContact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyContactContactRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contact_contact_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contact_contacts,id',
        ];
    }
}
