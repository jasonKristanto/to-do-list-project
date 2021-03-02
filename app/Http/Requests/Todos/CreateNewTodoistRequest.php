<?php

namespace App\Http\Requests\Todos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateNewTodoistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'todoistTitle' => ['required', 'regex:/^[ A-Za-z0-9._-]+$/'],
            'todoistDesc' => ['required', 'regex:/^[ A-Za-z0-9._-]+$/'],
            'todoists' => ['sometimes', 'required', 'array'],
            'todoists.*.todos' => ['sometimes', 'required', 'regex:/^[ A-Za-z0-9._-]+$/'],
            'todoists.*.status' => ['sometimes', 'required', 'boolean'],
        ];
    }
}
