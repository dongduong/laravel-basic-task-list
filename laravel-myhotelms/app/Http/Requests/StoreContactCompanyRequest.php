<?php

namespace App\Http\Requests;

use App\ContactCompany;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('contact_company_create');
    }

    public function rules()
    {
        return [
        ];
    }
}
