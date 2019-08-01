<?php

namespace App\Http\Requests;

use App\ContactContact;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactContactRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('contact_contact_create');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
