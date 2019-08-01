<?php

namespace App\Http\Requests;

use App\RoomStatus;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('room_status_edit');
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
