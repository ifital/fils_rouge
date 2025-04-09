<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ou appliquer une logique d'autorisation
    }

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
