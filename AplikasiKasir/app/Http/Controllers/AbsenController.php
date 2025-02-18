<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AbsenController extends Controller
{
    // Menampilkan daftar petugas yang bisa absen
    public function index()
    {
        $employees = User::where('role', 'petugas')->get();
        return view('AbsenPetugas', compact('employees'));
    }

    // Memperbarui status absen petugas
    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);

        // Hanya petugas yang bisa mengubah status dirinya sendiri
        if (auth()->user()->role != 'petugas' || auth()->user()->id != $id) {
            return redirect()->route('AbsenPetugas')->with('error', 'Anda tidak memiliki izin!');
        }

        // Cek apakah status sudah diisi sebelumnya
        if (!is_null($employee->status)) {
            return redirect()->route('AbsenPetugas')->with('error', 'Anda sudah memilih, tidak bisa diubah lagi!');
        }

        // Validasi status hanya bisa 'present' atau 'absen'
        $request->validate([
            'status' => 'required|in:present,absen',
        ]);

        $employee->status = $request->status;
        $employee->save();

        return redirect()->route('AbsenPetugas')->with('success', 'Status berhasil diperbarui!');
    }

    // Menghapus user (hanya bisa dilakukan oleh admin)
    public function destroy($id)
    {
        // Pastikan hanya admin yang bisa menghapus user
        if (auth()->user()->role != 'admin') {
            return redirect()->route('AbsenPetugas')->with('error', 'Anda tidak memiliki izin untuk menghapus!');
        }

        $employee = User::findOrFail($id);

        // Hapus user dari database secara permanen
        $employee->delete();

        return redirect()->route('AbsenPetugas')->with('success', 'User berhasil dihapus!');
    }
}
