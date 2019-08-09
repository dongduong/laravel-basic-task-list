<?php

namespace App\Http\Requests;

use App\ReservationStatus;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('reservation_status_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
