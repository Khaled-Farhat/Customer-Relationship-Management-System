<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('media')->where(function($query) {
                    return $query
                                ->where('model_type', $this->document->model_type)
                                ->where('model_id', $this->document->model_id)
                                ->where('name', $this->name);
                })->ignore($this->route('document')),
            ],
        ];
    }
}
