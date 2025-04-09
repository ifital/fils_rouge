<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'room_number' => 'required|unique:rooms,room_number,' . $this->room->id,
            'type' => 'required|in:dormitory,private',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,cleaning,maintenance',
            'images' => 'nullable|image',
        ];
    }
}
