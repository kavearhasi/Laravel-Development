<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBlogDatavalidation extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:20',
            'blog_content'=>'required',
            'cover_image'=>'required|image'
        ];
    }
}
