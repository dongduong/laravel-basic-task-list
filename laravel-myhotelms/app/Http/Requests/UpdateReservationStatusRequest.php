<?php

namespace App\Http\Requests;

use App\ReservationStatus;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('reservation_status_edit');
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
