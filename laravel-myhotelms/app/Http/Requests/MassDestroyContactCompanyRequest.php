<?php

namespace App\Http\Requests;

use App\ContactCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyContactCompanyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contact_company_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contact_companies,id',
        ];
    }
}
