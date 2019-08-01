<?php

namespace App\Http\Requests;

use App\TaskTag;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskTagRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_tag_edit');
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
