<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    // Menampilkan halaman pengaturan
    public function index()
    {
        return view('settings');
    }

    // Proses Ganti Password
    public function changePassword(Request $request)
    {
        // Validasi input password
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        // Cek apakah password lama benar
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah.']);
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Logout dan minta user login kembali dengan password baru
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Password berhasil diubah. Silakan login kembali dengan password baru.');
    }

    // Upload Foto Profil
    public function uploadProfile(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();

        // Simpan file gambar
        if ($request->hasFile('profile_picture')) {
            $filename = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads'), $filename);

            // Update di database
            $user->update(['profile_picture' => $filename]);
        }

        return back()->with('success', 'Foto profil berhasil diunggah.');
    }
}
