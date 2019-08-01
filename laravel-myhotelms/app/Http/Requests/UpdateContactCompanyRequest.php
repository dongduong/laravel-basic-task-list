<?php

namespace App\Http\Requests;

use App\ContactCompany;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('contact_company_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
