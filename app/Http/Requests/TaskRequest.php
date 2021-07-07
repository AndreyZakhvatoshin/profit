<?php

namespace App\Http\Requests;

use App\Http\Requests\APIFormRequest;

class TaskRequest extends APIFormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Укажите заголовок задачи',
            'description.required' => 'Укажите описание задачи',
        ];
    }
}
