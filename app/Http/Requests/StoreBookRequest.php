<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'isbn' => 'required|numeric|min:13|max:13',
            'title' => 'required|max:250',
            'author' => 'required',
            'image_path' => 'nullable',
            'publisher' => 'required|max:100',
            'category' => 'required',
            'pages' => 'required|numeric',
            'language' => 'required',
            'publish_date' => 'required',
            'subjects' => 'required|max:50',
            'desc' => 'required'
        ];
    }
}
