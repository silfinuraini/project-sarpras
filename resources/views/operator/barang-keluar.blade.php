@extends('layouts.operator-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container my-4 px-6 mx-auto grid">

            {{-- Breadcrumb --}}
            <div class="text-sm mb-4 breadcrumbs text-gray-700">
                <ul>
                    <li>
                        <a href="index.html">
                            <svg class="w-4 h-4 stroke-current" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        Kelola barang
                    </li>
                    <li>

                        Barang keluar

                    </li>
                </ul>
            </div>

            <div class="flex mb-2 gap-2">

                {{-- Button export --}}
                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button"
                        class="mb-1 btn flex border-none items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" aria-hidden="true"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                        </svg>
                        <span>Export</span>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li><a href="{{ route('barangkeluar.excel') }}">Excel</a></li>
                        <li><a href="{{ route('barangkeluar.pdf') }}">PDF</a></li>
                    </ul>
                </div>

                {{-- Filter data --}}
                <select class="select select-bordered max-w-xs bg-white text-gray-700 shadow-md ml-auto">
                    <option disabled selected>Unit</option>
                    <option>RPL</option>
                    <option>BK</option>
                </select>
                <select class="select select-bordered max-w-xs bg-white text-gray-700 shadow-md">
                    <option disabled selected>Order by</option>
                    <option>1 Tahun</option>
                    <option>Semester</option>
                    <option>Trimester</option>
                    <option>1 Bulan</option>
                </select>
                <input type="date" class="input input-bordered max-w-xs bg-white text-gray-700 shadow-md">

            </div>


            {{-- Table Section Start --}}
            <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-2">
                <div class="w-full overflow-hidden rounded-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap" id="search-table">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3 text-center">Unit</th>
                                    <th class="px-4 py-3 text-center">Jumlah Item</th>
                                    <th class="px-4 py-3 text-center">Perihal</th>
                                    <th class="px-4 py-3 text-center">Sifat</th>
                                    <th class="px-4 py-3 text-center">Status</th>
                                    <th class="px-4 py-3 text-center">Tanggal</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                @foreach ($barangKeluar as $bk)
                                    <tr class="text-gray-600 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ $bk->kode }}
                                        </td>

                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bk->pegawai->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bk->jumlah_item }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bk->perihal }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bk->sifat }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            @if ($bk->status == 'belum diambil')
                                                <div class="badge badge-outline outline-orange-500 text-orange-500 text-sm">
                                                    {{ $bk->status }}</div>
                                            @elseif ($bk->status == 'diambil')
                                                <div class="badge badge-outline outline-green-500 text-green-500 text-sm">
                                                    {{ $bk->status }}</div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bk->created_at }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center space-x-4 text-sm">

                                                <button onclick=" detailBarangKeluar{{ $bk->kode }}.showModal()"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                    </svg>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-4 my-2">
                        {{-- {{ $barangKeluar->links() }} --}}
                    </div>
                </div>
            </div>
            {{-- Table Section End --}}


        </div>

        @foreach ($barangKeluar as $bk)
            <dialog id="detailBarangKeluar{{ $bk->kode }}" class="modal">
                <div class="modal-box">

                    {{-- Search Bar Start --}}
                    <label class="input input-bordered w-full flex items-center gap-2 bg-white shadow-md">
                        <input type="text" id="searchInput" onkeyup="filterTable()"
                            class="input grow text-sm text-gray-600 border-none" placeholder="Cari..." />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill=""
                            class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </label>
                    {{-- Search Bar Start --}}

                    <div
                        class="min-w-0 p-4 mt-2 border border-gray-300 shadow-md bg-white rounded-box shadow-xs dark:bg-gray-800">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Barang Keluar
                        </h3>
                        <div class="grid mt-2 md:grid-cols-4">
                            <div class="mx-4">
                                <div class="min-w-0 my-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                    <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                        Unit
                                    </h4>
                                    <p class="text-gray-800 text-sm dark:text-gray-400">
                                        Nama unit
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-3 p-4 justify-center items-center">
                                <input type="text" placeholder="" value=": {{ $bk->pegawai->nama }}" readonly
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
                                        Urgensi pengajuan
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-3 px-4 justify-center items-center">
                                <input type="text" placeholder="" value=": {{ $bk->sifat }}" name="sifat"
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
                                        Alasan mengajukan
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-3 px-4 justify-center items-center">
                                <textarea type="text" placeholder="" name="perihal" value="{{ $bk->perihal }}"
                                    class="input min-h-20 max-h-20 textarea w-full input-bordered flex focus:outline-none items-center text-sm bg-white border-none text-gray-700 h-10"
                                    fdprocessedid="dee09r" readonly>: {{ $bk->perihal }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Table Section Start --}}
                    <div
                        class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-5">
                        <div class="w-full overflow-hidden rounded-lg mb-2">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap" id="itemsTable">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Kode</th>
                                            <th class="px-4 py-3">Nama</th>
                                            <th class="px-4 py-3">Kuantiti</th>
                                            <th class="px-4 py-3">Satuan</th>
                                        </tr>
                                    </thead>

                                    @foreach ($detailBarangKeluar as $dbk)
                                        @if ($dbk->kode_barang_keluar == $bk->kode)
                                            <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                                <tr class="text-gray-600 dark:text-gray-400">
                                                    <td class="px-4 py-3 text-sm font-semibold">
                                                        {{ $dbk->item->kode }}
                                                    </td>

                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $dbk->item->nama }}
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $dbk->kuantiti }}
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $dbk->item->satuan }}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                            <div class="mx-4 my-2">
                                {{-- {{ $detailBM->links() }} --}}
                            </div>
                        </div>
                    </div>
                    {{-- Table Section End --}}

                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
        @endforeach

    </main>
@endsection
