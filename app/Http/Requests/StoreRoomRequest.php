<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_number' => 'required|unique:rooms',
            'type' => 'required|in:dormitory,private',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,cleaning,maintenance',
            'images' => 'required|image',
        ];
    }
}
