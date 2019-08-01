<?php

namespace App\Http\Requests;

use App\Room;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('room_edit');
    }

    public function rules()
    {
        return [
            'room_number'  => [
                'min:5',
                'max:32',
                'required',
            ],
            'floor'        => [
                'digits_between:0,10',
            ],
            'slug'         => [
                'required',
            ],
            'room_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
