<?php

namespace App\Http\Requests;

use App\RoomType;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoomTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('room_type_create');
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
