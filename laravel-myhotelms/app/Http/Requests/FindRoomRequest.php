<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindRoomRequest extends FormRequest
{
    public function rules()
    {
        return [
            'checkin_date'          => [
                'required',
                'date_format:Y-m-d',
            ],
            'checkout_date'         => [
                'required',
                'date_format:Y-m-d',
            ],
        ];
    }
}
