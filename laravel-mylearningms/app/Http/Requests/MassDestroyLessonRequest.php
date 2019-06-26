<?php

namespace App\Http\Requests;

use App\Lesson;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyLessonRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lesson_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lessons,id',
        ];
    }
}
