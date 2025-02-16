<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan model sesuai

class AbsenPetugasController extends Controller
{
    public function index()
    {
        $employees = User::where('role', 'petugas')->get();
        return view('AbsenPetugas', compact('employees'));
    }

    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        $employee->status = $request->status;
        $employee->save();

        return redirect()->route('AbsenPetugas')->with('success', 'Status updated successfully');
    }
}
