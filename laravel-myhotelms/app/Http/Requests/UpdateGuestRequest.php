<?php

namespace App\Http\Requests;

use App\Guest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGuestRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('guest_edit');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'max:100',
                'required',
            ],
            'last_name'  => [
                'max:100',
                'required',
            ],
            'address'    => [
                'max:1000',
                'required',
            ],
            'email'      => [
                'max:100',
            ],
            'phone'      => [
                'max:100',
            ],
            'city'       => [
                'max:100',
            ],
            'country'    => [
                'max:100',
            ],
        ];
    }
}
