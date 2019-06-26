<?php

namespace App\Http\Requests;

use App\QuestionsOption;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionsOptionRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('questions_option_create');
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
