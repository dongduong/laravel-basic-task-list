<?php

namespace App\Http\Requests;

use App\RoomStatus;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoomStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('room_status_create');
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
