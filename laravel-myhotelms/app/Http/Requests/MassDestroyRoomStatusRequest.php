<?php

namespace App\Http\Requests;

use App\RoomStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRoomStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('room_status_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:room_statuses,id',
        ];
    }
}
