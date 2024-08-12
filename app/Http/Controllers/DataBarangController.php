<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Http\Request;

class  DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(5);    
        return view('operator.data-barang', compact('items'));
    }

    public function tambahbarang()
    { 
        $kategori = Kategori::all();
        return view('operator.tambah-barang', compact ('kategori') );
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
            // $request->validate([
            //     'kode' => 'required|min:6',
            //     'nama' => 'required|min:3',
            //     'merk' => 'required|min:3',
            //     'satuan' => 'required',
            //     'harga' => 'required|numeric|min:3',
            //     'stok' => 'required|integer|min:0',
            //     'stok_minimum' => 'required|integer|min:0',
            //     'kategori_id' => 'required',  
            // ]);

        $item = Item::create($request->all());

        return redirect()->route('databarang')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode)
    {
        $items = Item::where('kode', $kode)->first();
        $kategori = Kategori::all();
        return view('operator.edit-barang', compact('items', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode)
    {
        // $request->validate([
        //     'nama' => 'required|min:3',
        //     'kode' => 'required|min:6',
        //     'merk' => 'required|min:3',
        //     'satuan' => 'required',
        //     'harga' => 'required|numeric|min:3',
        //     'stok' => 'required|integer|min:0',
        //     'stok_minimum' => 'required|integer|min:0',
        //     'kategori_kode' => 'required',  
        // ]);

        $items = Item::where('kode', $kode)->first();
        $items->update($request->all());
        
        return redirect()->route('databarang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode)
    {
        $items = Item::find($kode);

        if($items){
            $items->delete();
            return redirect()->back();
        }

        return redirect()->back();
    }
}
