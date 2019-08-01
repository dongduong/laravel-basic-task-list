<?php

namespace App\Http\Requests;

use App\Reservation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyReservationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reservation_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reservations,id',
        ];
    }
}
