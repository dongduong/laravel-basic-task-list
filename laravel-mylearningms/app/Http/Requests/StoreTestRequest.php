<?php

namespace App\Http\Requests;

use App\Test;
use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('test_create');
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
