<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\DetailBarangKeluar;
use App\Models\DetailBarangMasuk;
use App\Models\Item;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pengadaan;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $item = Item::orderBy('nama', 'asc')->get();
        $kategori = Kategori::all();
        $user = User::all();

        $statPengadaan = Pengadaan::where('nip', Auth::user()->nip)->count();
        $statPermintaan = Permintaan::where('nip', Auth::user()->nip)->count();
        $statBarangKeluar = BarangKeluar::where('nip', Auth::user()->nip)
            ->where('status', 'belum diambil')
            ->count();


        $menungguPengadaan = Pengadaan::with('pegawai')
            ->where('status', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $othersPengadaan = Pengadaan::with('pegawai')
            ->whereIn('status', ['ditolak', 'disetujui'])
            ->orderBy('created_at', 'desc')
            ->take(3 - $menungguPengadaan->count())
            ->get();

        $pengadaan = $menungguPengadaan->concat($othersPengadaan);

        $menunggu = Permintaan::with('pegawai')
            ->where('status', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $others = Permintaan::with('pegawai')
            ->whereIn('status', ['ditolak', 'disetujui'])
            ->orderBy('created_at', 'desc')
            ->take(3 - $menunggu->count())
            ->get();

        $permintaan = $menunggu->concat($others);

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'pengawas') {
            $user = User::all();
            // dd($user);

            $incomingItems = DetailBarangMasuk::selectRaw('MONTH(created_at) as month, SUM(kuantiti) as total')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $outgoingItems = DetailBarangKeluar::selectRaw('MONTH(created_at) as month, SUM(kuantiti) as total')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $labels = collect(range(1, 12))->map(function ($month) {
                return \Carbon\Carbon::create()->month($month)->format('M');
            })->toArray();

            $incomingData = $this->mapDataByMonth($incomingItems);
            $outgoingData = $this->mapDataByMonth($outgoingItems);

            $chart = [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Barang Masuk',
                        'data' => $incomingData,
                        'backgroundColor' => '#1E201E',
                        'borderRadius' => 5,
                        'barThickness' => 23,
                    ],
                    [
                        'label' => 'Barang Keluar',
                        'data' => $outgoingData,
                        'backgroundColor' => '#3C3D37',
                        'borderRadius' => 5,
                        'barThickness' => 23,
                    ],
                ]
            ];

            $user = User::count();
            $barangMasuk = DetailBarangMasuk::count();
            $barangKeluar = DetailBarangKeluar::count();
            $barang = Item::count();

            return view('operator.dashboard', ([
                'permintaan' => $permintaan,
                'pengadaan' => $pengadaan,
                'chart' => $chart,
                'user' => $user,
                'barangMasuk' => $barangMasuk,
                'barangKeluar' => $barangKeluar,
                'barang' => $barang,
            ]));
        }

        $nip = Auth::user()->nip;

        $keranjang = Keranjang::where('nip', $nip)->get();
        $jumlah = count($keranjang);

        return view('unit.dashboard', compact('item', 'kategori', 'jumlah', 'user', 'statPengadaan', 'statPermintaan', 'statBarangKeluar'));
    }

    private function mapDataByMonth($items)
    {
        $data = array_fill(0, 12, 0);

        foreach ($items as $item) {
            $data[$item->month - 1] = $item->total;
        }

        return $data;
    }
}
