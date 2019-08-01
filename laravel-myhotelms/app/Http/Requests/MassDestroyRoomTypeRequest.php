<?php

namespace App\Http\Requests;

use App\RoomType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRoomTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('room_type_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:room_types,id',
        ];
    }
}
