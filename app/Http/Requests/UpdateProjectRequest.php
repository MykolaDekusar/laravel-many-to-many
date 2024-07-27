<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:50', Rule::unique('projects')->ignore($this->project)],
            'description' => 'string|min:10|nullable',
            'image' => 'string|max:255|nullable',
            'type_id' => 'nullable|exists:types,id',
            'techs' => 'nullable|exists:technologies,id'
        ];
    }
}
