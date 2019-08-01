<?php

namespace App\Http\Requests;

use App\TaskTag;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskTagRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_tag_create');
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
