<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->get();
        return view('admin.profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'about' => 'required',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'address' => 'nullable|max:255',
            'phone' => 'nullable|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        Profile::create($request->all());

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'about' => 'required',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'address' => 'nullable|max:255',
            'phone' => 'nullable|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        $profile->update($request->all());

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil dihapus.');
    }
}
