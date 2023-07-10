<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'release_year' => ['digits:4', 'integer', 'min:1900', 'max:'.(date('Y')+1) ],
            'director' => ['string'],
            'description' => ['string', 'max:100000'],
            'genre' => ['array'],
            'cover' => ['image']
        ];
    }
}
