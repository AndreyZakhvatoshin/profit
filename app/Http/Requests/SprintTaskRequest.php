<?php

namespace App\Http\Requests;

use App\Http\Requests\APIFormRequest;

class SprintTaskRequest extends APIFormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sprint_id' => 'required|integer',
            'task_id' => 'required|integer',
        ];
    }
}
