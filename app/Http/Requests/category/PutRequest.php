<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PutRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => str($this->title)->slug('_', 'esp')->toString()
        ]);
    }
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
            'title' => [
                'required',
                Rule::unique('categories')->ignore($this->route("category")->id),
                'string'
            ],
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($this->route("category")->id),
                'string'
            ]
        ];
    }
}
