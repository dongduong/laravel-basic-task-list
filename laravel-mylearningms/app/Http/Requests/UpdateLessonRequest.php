<?php

namespace App\Http\Requests;

use App\Lesson;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lesson_edit');
    }

    public function rules()
    {
        return [
            'title'    => [
                'required',
            ],
            'position' => [
                'required',
            ],
        ];
    }
}
