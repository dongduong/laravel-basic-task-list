<?php

namespace App\Http\Requests;

use App\Test;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTestRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('test_edit');
    }

    public function rules()
    {
        return [
            'questions.*' => [
                'integer',
            ],
            'questions'   => [
                'array',
            ],
        ];
    }
}
