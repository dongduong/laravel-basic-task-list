<?php

namespace App\Http\Requests;

use App\Room;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRoomRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('room_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rooms,id',
        ];
    }
}
