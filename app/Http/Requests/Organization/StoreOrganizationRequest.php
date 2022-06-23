<?php

namespace App\Http\Requests\Organization;

use App\Models\Organization;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Organization::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:organizations,name'],
            'website' => ['required', 'string', 'max:255', 'url'],
            'address' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ];
    }
}
