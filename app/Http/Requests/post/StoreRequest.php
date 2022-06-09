<?php

namespace App\Http\Requests\post;

use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            //'slug' => Str::slug($this->title)
            //'slug' => Str::of($this->title)->slug('_','es')->toString()
            'slug' => str($this->title)->slug('_', 'es')->toString()
        ]);
    }
    static public function myRuls()
    {
        return [
            'category_id' => 'required|integer',
            'title' => 'required|unique:posts|string',
            'description' => 'required|string',
            'slug' => 'required|unique:posts|string',
            'content' => 'required|string',
            'posted' => 'required|boolean'
        ];
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
    /**
     * 
            'title' => 'required|unique:posts|string',
            'slug' => 'required|unique:posts|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer', 
            'posted' => 'required'
     */
    public function rules()
    {
        return self::myRuls();
    }
}
