<?php
namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ContactService
{
    public function store(array $data): Contact
    {
        $validator = Validator::make($data, [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Contact::create($validator->validated());
    }

    public function allPaginated(int $perPage = 10)
    {
        return Contact::latest()->paginate($perPage);
    }
}
