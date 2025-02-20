@extends('layouts.unit-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container my-4 px-6 mx-auto grid">

            {{-- Breadcrumbs Section Start --}}
            <div class="text-sm mb-4 breadcrumbs text-gray-700">
                <ul>
                    <li><a href="kepala-unit-index.html" class="font-semibold text-purple-600">Home</a></li>
                    <li>Diproses</li>
                </ul>
            </div>
            {{-- Breadcrumbs Section End --}}

            {{-- Nota Barang Start --}}
            <div class="min-w-0 p-4 border border-gray-300 shadow-md bg-white rounded-box shadow-xs dark:bg-gray-800">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Permintaan</h3>
                <div class="grid mt-2 md:grid-cols-4">
                    <div class="mx-4">
                        <div class="min-w-0 my-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                Unit
                            </h4>
                            <p class="text-gray-800 text-sm dark:text-gray-400">
                                Nama unit akan terisi otomatis
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 p-4 justify-center items-center">
                        <input type="text" placeholder="" value=": {{ $permintaan->pegawai->nama }}" readonly
                            class="input w-full input-bordered flex focus:outline-none items-center border-none text-sm bg-white text-gray-700 h-10"
                            fdprocessedid="dee09r">
                        </input>
                    </div>
                    <div class="mx-4">
                        <div class="min-w-0 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                Sifat
                            </h4>
                            <p class="text-gray-800 text-sm dark:text-gray-400">
                                Sifat berisi urgensi pengajuan
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 px-4 justify-center items-center">
                        <input type="text" placeholder="" value=": {{ $permintaan->sifat }}" name="sifat"
                            class="input max-w-xs input-bordered flex focus:outline-none items-center text-sm bg-white border-none text-gray-700 h-10"
                            fdprocessedid="dee09r" readonly>
                        </input>
                    </div>
                    <div class="mx-4">
                        <div class="min-w-0 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                Perihal
                            </h4>
                            <p class="text-gray-800 text-sm dark:text-gray-400">
                                Alasan mengajukan barang-barang tsb, contoh: <b>Ujian praktek</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 px-4 justify-center items-center">
                        <textarea type="text" placeholder="" name="perihal" value="{{ $permintaan->perihal }}"
                            class="input min-h-20 max-h-20 textarea w-full input-bordered flex focus:outline-none items-center text-sm bg-white border-none text-gray-700 h-10"
                            fdprocessedid="dee09r" readonly>: {{ $permintaan->perihal }}</textarea>
                    </div>
                </div>
            </div>
            {{-- Nota Barang End --}}

            
            {{-- Table Section Start --}}
            <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-5">
                <div class="w-full overflow-hidden rounded-lg mb-2">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap" id="itemsTable">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Barang</th>
                                    <th class="px-4 py-3">Merk</th>
                                    <th class="px-4 py-3">Jumlah</th>
                                    <th class="px-4 py-3">Satuan</th>
                                </tr>
                            </thead>

                            @foreach ($detailPermintaan as $dp)
                                <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                    <tr class="text-gray-600 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ $dp->kode_item }}
                                        </td>

                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="avatar">
                                                    <div class="mask mask-squircle h-12 w-12">
                                                        <img src={{ asset('storage/' . $dp->item->gambar) }}
                                                            alt="Avatar Tailwind CSS Component" />
                                                    </div>
                                                </div>
                                                <div class="ml-2">
                                                    <p class="font-semibold flex gap-1">
                                                        {{ $dp->item->nama }}
                                                    </p>
                                                    <p class="text-xs text-gray-800 dark:text-gray-400">
                                                        {{ $dp->item->kategori->nama }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            {{ $dp->item->merk }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            {{ $dp->kuantiti }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $dp->item->satuan }}
                                        </td>
                                       
                                    </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="mx-4 my-2">
                        {{-- {{ $kategori->links() }} --}}
                    </div>
                </div>
            </div>
            {{-- Table Section End --}}

        </div>
    </main>
@endsection
