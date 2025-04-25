<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('employee.dashboard', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,employee,client',
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'nationality' => 'nullable|string|max:100',
        ]);

        $user->update($validated);

        return redirect()->route('employee.users.index')
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('employee.users.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
}