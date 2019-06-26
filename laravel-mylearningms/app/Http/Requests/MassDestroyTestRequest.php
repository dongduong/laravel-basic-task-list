<?php

namespace App\Http\Requests;

use App\Test;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('test_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tests,id',
        ];
    }
}
