<?php

namespace App\Http\Requests;

use App\QuestionsOption;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionsOptionRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('questions_option_edit');
    }

    public function rules()
    {
        return [
            'option_text' => [
                'required',
            ],
        ];
    }
}
