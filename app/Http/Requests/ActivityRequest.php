<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
        ];

        if ($this->isMethod('post')) {
            $rules['images'] = 'required|string'; 
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['images'] = 'nullable|string';
        }

        return $rules;
    }
}
