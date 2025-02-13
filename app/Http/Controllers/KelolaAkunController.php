<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class KelolaAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        $users = User::with('pegawai')->get();
        return view('operator.kelola-akun', compact('users', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = Pegawai::leftJoin('users', 'pegawai.nip', '=', 'users.nip')
            ->whereNull('users.nip')
            ->select('pegawai.*')
            ->get();

        return view('operator.tambah-akun', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'nip' => $request->nip,
            'password' => $request->password
        ]);

        return redirect()->route('kelolaakun');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nip)
    {
        $user = User::where('nip', $nip)->first();
        $pegawai = Pegawai::all();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nip)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,unit,pengawas',
        ]);
    
        $user = User::where('nip', $nip)->firstOrFail();
    
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']); 
        }
    
        $user->update($validatedData);
    
        return redirect()->route('kelolaakun')->with('success', 'User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
