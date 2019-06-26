<?php

namespace App\Http\Requests;

use App\QuestionsOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyQuestionsOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('questions_option_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:questions_options,id',
        ];
    }
}
