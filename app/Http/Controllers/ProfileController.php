<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Affiche la page de profil de l'utilisateur connecté.
     */
    public function index()
    {
        $user = Auth::user()->load('reservations.livre');
        return view('profile.index', compact('user'));
    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }



    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour l'image
        ]);

        if ($request->hasFile('profile')) {
            // Supprime l'ancienne image si elle existe
            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }

            // Stocke la nouvelle image
            $path = $request->file('profile')->store('profiles', 'public');
            $validated['profile'] = $path;
        }

        // Met à jour les données de l'utilisateur
        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }


}
