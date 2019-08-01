<?php

namespace App\Http\Requests;

use App\RoomType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('room_type_edit');
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
