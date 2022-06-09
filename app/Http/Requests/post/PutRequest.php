<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\This;

class PutRequest extends FormRequest
{
    static public function myRuls()
    {
        return [
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
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
    public function rules()
    {
        return self::myRuls();
    }
}
