<?php

namespace App\Http\Requests\Dashboard\Book;

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
        //dd($this);
        return [
            'name' => 'required|string|max:255|min:5',
            'description' => 'required|string|max:255|min:5',
            'category_id' => 'required|integer',
            'image' => 'required|file|image',
        ];
    }
}
