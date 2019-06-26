<?php

namespace App\Http\Requests;

use App\Question;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('question_create');
    }

    public function rules()
    {
        return [
            'question' => [
                'required',
            ],
            'score'    => [
                'required',
            ],
        ];
    }
}
