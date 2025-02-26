<?php

namespace App\Http\Controllers;

use App\Exports\DataBarangExport;
use App\Helpers\ImageHelper;
use App\Imports\DataBarangImport;
use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class  DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve all categories for the dropdown
        $kategori = Kategori::all();

        // Get the selected category ID from the request
        $selectedCategory = $request->input('category_id');

        // Retrieve items, filtered by category if a category is selected
        $items = Item::with('kategori')
            ->when($selectedCategory, function ($query) use ($selectedCategory) {
                $query->where('kategori_id', $selectedCategory);
            })
            ->orderByRaw('stok <= stok_minimum DESC') 
            ->orderBy('nama', 'ASC') 
            ->get();



        // Alternatif untuk withQueryString()
        // $items->appends(request()->query());

        // Check if it's an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'items' => $items
            ]);
        }

        // Return the view with items, categories, and selected category
        return view('operator.data-barang', compact('items', 'kategori', 'selectedCategory'));
    }

    public function export_excel()
    {
        return Excel::download(new DataBarangExport, 'data_barang.xlsx');
    }

    public function import(Request $request) 
    {
        // dd($request);
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,csv',
            ]);

            Excel::import(new DataBarangImport, $request->file('file'));

            return redirect()->route('databarang')->with('success', 'Barang berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->route('databarang')->with('error', $th->getMessage());
        }
        
        // Excel::import(new DataBarangImport, 'data_barang.xlsx');
        
        // return redirect()->route('databarang')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function tambahbarang()
    {
        $kategori = Kategori::all();
        return view('operator.tambah-barang', compact('kategori'));
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
                // 'kode' => 'required|min:6',
                'nama' => 'required|min:3',
                'merk' => 'required|min:3',
                'satuan' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'harga' => 'required|numeric|min:3',
                'stok' => 'required|integer|min:0',
                'stok_minimum' => 'required|integer|min:0',
                'kategori_id' => 'required',
            ]);

            $kategoriID = $request->input('kategori_id');
            $kategori = Kategori::find($kategoriID);

            $namaKode = $kategori->alias;
            $randomNumber = rand(1000, 9999);

            $code = $namaKode . $randomNumber;

            if ($request->hasFile('gambar')) {
                $image = ImageHelper::handleImage($request->gambar);
            }

            $item = Item::create([
                'kode' => $code,
                'gambar' => $image ?? null,
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'ukuran' => $request->ukuran,
                'merk' => $request->merk,
                'warna' => $request->warna,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'stok_minimum' => $request->stok_minimum,
                'kategori_id' => $request->kategori_id,
                'deskripsi' => $request->deskripsi
            ]);


            return redirect()->route('databarang')->with('success', 'Barang berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->route('databarang')->with('error', $th->getMessage());
        }
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
        try {
            $request->validate([
                'nama' => 'required|min:3',
                'merk' => 'required|min:3',
                'satuan' => 'required',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'harga' => 'required|numeric|min:3',
                'stok' => 'required|integer|min:0',
                'stok_minimum' => 'required|integer|min:0',
                'kategori_id' => 'required',
            ]);

            $items = Item::where('kode', $kode)->firstOrFail();

            if ($request->hasFile('gambar')) {
                $image = ImageHelper::handleImage($request->gambar);
                $requestData = $request->all();
                $requestData['gambar'] = $image;
            } else {
                $requestData = $request->except('gambar'); // Don't update image if not provided
            }

            $items->update($requestData);

            return redirect()->route('databarang')->with('success', 'Barang berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->route('databarang')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource wfrom storage.
     */
    public function destroy(string $kode)
    {
        $items = Item::find($kode);

        if ($items) {
            $items->delete();
            return redirect()->back();
        }

        return redirect()->back();
    }
}
