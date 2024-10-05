<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use App\Models\Pengadaan;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke()
    {
        $item = Item::all();
        $kategori = Kategori::all();
        $user = User::all();

        $menungguPengadaan = Pengadaan::with('pegawai')
            ->where('status', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $othersPengadaan = Pengadaan::with('pegawai')
            ->whereIn('status', ['ditolak', 'disetujui'])
            ->orderBy('created_at', 'desc')
            ->take(4 - $menungguPengadaan->count())
            ->get();

        $pengadaan = $menungguPengadaan->concat($othersPengadaan);
        
        $menunggu = Permintaan::with('pegawai')
            ->where('status', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $others = Permintaan::with('pegawai')
            ->whereIn('status', ['ditolak', 'disetujui'])
            ->orderBy('created_at', 'desc')
            ->take(4 - $menunggu->count())
            ->get();

        $permintaan = $menunggu->concat($others);

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'pengawas') {
            return view('operator.dashboard', compact('permintaan', 'pengadaan' ));
        }

        return view('unit.dashboard', compact('item', 'kategori'));
    }
}
