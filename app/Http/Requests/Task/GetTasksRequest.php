<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class GetTasksRequest extends FormRequest
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
            //
        ];
    }

    // Get the validated filters
    public function filters()
    {
        $filters = [];
        $availableFilters = ['status'];
        foreach ($availableFilters as $filter) {
            if (!is_null($this->query($filter))) {
                $filters[$filter] = $this->query($filter);
            }
        }

        $filtersRules = [
            'status' => ['sometimes', 'string', 'exists:statuses,name'],
        ];

        $validatedFilters = Validator::make($filters, $filtersRules)->validate();

        return $validatedFilters;
    }
}
