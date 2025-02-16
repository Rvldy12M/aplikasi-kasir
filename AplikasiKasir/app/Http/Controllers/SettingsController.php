<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah!']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('message', 'Password berhasil diperbarui!');
    }

    public function uploadProfile(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $filename = 'profile_' . $user->id . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $path = $request->file('profile_picture')->storeAs('uploads', $filename, 'public');

            $user->update(['profile_picture' => $filename]);
        }

        return back()->with('message', 'Foto profil berhasil diunggah!');
    }
}
