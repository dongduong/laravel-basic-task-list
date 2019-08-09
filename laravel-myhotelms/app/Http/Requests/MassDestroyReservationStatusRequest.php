<?php

namespace App\Http\Requests;

use App\ReservationStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyReservationStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reservation_status_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reservation_statuses,id',
        ];
    }
}
