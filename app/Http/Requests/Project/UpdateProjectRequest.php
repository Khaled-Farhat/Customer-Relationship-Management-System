<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->project);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client_id' => ['required', 'exists:clients,id'],
            'manager_id' => ['required', 'exists:users,id'],
            'status_id' => ['required', 'exists:statuses,id'],
            'title' => ['required', 'string', 'max:255', 'unique:organizations,name'],
            'deadline' => ['required', 'date'],
            'description' => ['nullable', 'string'],
        ];
    }
}
