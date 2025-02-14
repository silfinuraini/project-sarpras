<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::paginate(5);
        return view('operator.pegawai', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        try {
            $request->validate([
                'nip' => 'required|string|max:20|unique:pegawai,nip',
                'email' => 'required|email|max:50|unique:pegawai,email',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nama' => 'required|string|max:50',
            ]);

            if ($request->hasFile('avatar')) {
                $avatarPath = ImageHelper::handleImage($request->avatar);
            }

            $pegawai = Pegawai::create([
                'nip' => $request->nip,
                'email' => $request->email,
                'avatar' => $avatarPath ?? null, 
                'nama' => $request->nama,
            ]);


            return redirect()->back()->with('success', 'Pegawai berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nip)
    {
        $supplier = Pegawai::where('nip', $nip)->first();
        $supplier->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nip)
    {
        $pegawais = Pegawai::find($nip);

        if ($nip) {
            $pegawais->delete();
            return redirect()->back();
        }

        return redirect()->back();
    }
}
