<?php

namespace App\Http\Requests;

use App\Lesson;
use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lesson_create');
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
