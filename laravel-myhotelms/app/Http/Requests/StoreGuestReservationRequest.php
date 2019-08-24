<?php

namespace App\Http\Requests;

use App\Reservation;
use Illuminate\Foundation\Http\FormRequest;

class StoreGuestReservationRequest extends FormRequest
{
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
            'room_id'                => [
                'required',
                'integer',
            ],
            'checkin_date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'checkout_date'         => [
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
