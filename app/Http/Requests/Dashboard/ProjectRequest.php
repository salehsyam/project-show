<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'location' => ['required', 'string'],
            'area' => ['required', 'string'],
            'contact' => ['required', 'string'],
            'category' => ['required', 'string', Rule::in(array_keys(trans('projects.categories')))],
            'price' => ['required_if:category,villas'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('projects.attributes');
    }
}
