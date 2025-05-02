<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function store(Request $request)
    {
        try {
            $this->contactService->store($request->all());
            return redirect()->back()->with('success', 'Message sent successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
    }

    public function index()
    {
        $contacts = $this->contactService->allPaginated(10);
        return view('employee.contacts', compact('contacts'));
    }
    
   
    public function destroy($id)
    {
        try {
            $this->contactService->destroy($id);
            return redirect()->route('employee.contacts')
                ->with('success', 'Contact message deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('employee.contacts')
                ->with('error', 'Failed to delete contact message.');
        }
    }
}