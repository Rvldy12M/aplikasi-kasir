<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member; // Pastikan ini ada!

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('member.index', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        Member::create($request->all());

        return redirect()->route('member.index')->with('message', 'Member berhasil ditambahkan!');
    }
}
