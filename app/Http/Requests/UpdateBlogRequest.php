<?php

namespace App\Http\Requests;

use App\Rules\NoReservedWords;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title'   => ['required', 'string', 'max:255', new NoReservedWords],
            'content' => ['required', 'string'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required'   => 'The blog title is required.',
            'title.max'        => 'The title may not be longer than 255 characters.',
            'title.no_reserved_words' => 'The title must not contain reserved words (e.g. spam, test, admin).',
            'content.required' => 'Please provide some content for your blog post.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title'   => 'blog title',
            'content' => 'blog content',
        ];
    }
}
