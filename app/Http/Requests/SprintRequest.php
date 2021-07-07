<?php

namespace App\Http\Requests;

use App\Http\Requests\APIFormRequest;

class SprintRequest extends APIFormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'week' => 'required|string|max:2',
        ];
    }
}
