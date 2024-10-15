<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // $keranjangs = Keranjang::where('nip', Auth::id())
        //     ->where('kode_item', $request->kode_item)
        //     ->first();

        //     dd($keranjangs);

        // if ($keranjangs) {
        //     //
        // } else {
            $keranjang = Keranjang::create([
                'kode_item' => $request->kode_item,
                'kuantiti' => 1,
                'nip' => Auth::id()
            ]);
        // }


        return redirect()->route('dashboard.unit');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keranjang = Keranjang::find($id);

        // dd($keranjang);

        if ($keranjang) {
            $keranjang->delete();
            return redirect()->back();
        }

        return redirect()->back();
    }
}
