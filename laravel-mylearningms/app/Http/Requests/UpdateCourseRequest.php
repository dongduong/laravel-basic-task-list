<?php

namespace App\Http\Requests;

use App\Course;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('course_edit');
    }

    public function rules()
    {
        return [
            'teachers.*' => [
                'integer',
            ],
            'teachers'   => [
                'array',
            ],
            'title'      => [
                'required',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}