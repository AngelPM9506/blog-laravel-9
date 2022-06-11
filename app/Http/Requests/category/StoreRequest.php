<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function prepareForValidation(){
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
            'title' => 'required|unique:categories|string',
            'slug'  => 'required|unique:categories|string',
        ];
    }
}
