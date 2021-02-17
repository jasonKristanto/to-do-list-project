<?php

namespace App\Http\Requests\Todos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTodoistRequest extends FormRequest
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
            'todoistId' => ['required', 'numeric'],
            'todoistTitle' => ['required', 'regex:/^[ A-Za-z0-9._-]+$/'],
            'todoistDesc' => ['required', 'regex:/^[ A-Za-z0-9._-]+$/'],
            'todoists' => ['required', 'array'],
            'todoists.*.todos' => ['required', 'regex:/^[ A-Za-z0-9._-]+$/'],
            'todoists.*.status' => ['required', 'boolean'],
            'todoists.*.title_id' => ['sometimes', 'numeric'],
            'todoists.*.info' => ['sometimes', 'regex:/^[ A-Za-z0-9._-]+$/'],
        ];
    }
}
