<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class EditItemFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'artist_name' => 'required|string|max:255',
            'produced_year' => 'required',
            'subject_classification' => 'required|string|max:200',
            'image_path' => 'nullable|mimes:jpg,jpeg,png',
            'description' => 'required',
            'used_medium' => 'nullable|string|max:255',
            'used_material' => 'nullable|string|max:255',
            'image_type_of' => 'nullable|string|max:255',
            'dimension' => 'nullable|string|max:255',
            'weight' => 'nullable|string',
            'is_framed' => 'nullable|string',
            'status' => 'nullable|string'
        ];
    }
}
