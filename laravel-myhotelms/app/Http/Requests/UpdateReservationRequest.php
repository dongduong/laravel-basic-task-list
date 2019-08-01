<?php

namespace App\Http\Requests;

use App\Reservation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('reservation_edit');
    }

    public function rules()
    {
        return [
            'guest_id'               => [
                'required',
                'integer',
            ],
            'room_id'                => [
                'required',
                'integer',
            ],
            'check_in_date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'check_out_date'         => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'adults'                 => [
                'digits_between:0,10',
            ],
            'children'               => [
                'digits_between:0,10',
            ],
            'additional_information' => [
                'max:1000',
            ],
        ];
    }
}
