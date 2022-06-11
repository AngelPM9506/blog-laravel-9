<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\This;

class PutRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => str($this->title)->slug('_', 'es')->toString()
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
            'category_id' => 'required|integer',
            'title' => [
                'required',
                Rule::unique('posts')->ignore($this->route("post")->id),
                'string'
            ],
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($this->route("post")->id),
                'string'
            ],
            'description' => 'required|string',
            'content' => 'required|string',
            'posted' => 'required|boolean',
            'image' => 'mimes:jpeg,pjg,png,gif|max:102400'
        ];
    }
}
