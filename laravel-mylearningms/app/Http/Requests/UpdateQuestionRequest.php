<?php

namespace App\Http\Requests;

use App\Question;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('question_edit');
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
