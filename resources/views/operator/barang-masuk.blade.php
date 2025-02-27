@extends('layouts.operator-main')

@section('content')
    <main class="h-full bg-gray-50 overflow-y-auto">
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

                        Barang masuk

                    </li>
                </ul>
            </div>

            <div class="flex gap-2">

                {{-- Button formTambah --}}
                <a href="{{ route('barangmasuk.create') }}" {{-- onclick="formTambah.showModal()" --}}
                    class="flex items-center justify-between p-4 mb-2 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor"
                            class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                            <path
                                d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                            <path
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0" />
                        </svg>
                        <span>Tambah barang</span>
                    </div>
                </a>

                {{-- Modal formTambah --}}
                <dialog id="formTambah" class="modal">
                    <div class="modal-box text-gray-700 shadow-md">

                        <form action="{{ route('barangmasuk.store') }}" method="POST">
                            @csrf

                            <div
                                class="px-4 py-3 mb-6 bg-white text-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-gray-800">
                                    Barang Masuk
                                </h4>
                                <label class="form-control w-full text-gray-700">
                                    <div class="label">
                                        <span class="label-text">Supplier</span>
                                    </div>
                                    <select name="kode_supplier" class="select select-bordered">
                                        <option disabled selected>Pilih supplier</option>
                                        @foreach ($supplier as $supp)
                                            <option value="{{ $supp->kode }}">{{ $supp->nama }}</option>
                                        @endforeach
                                    </select>
                                </label>

                                <div
                                    class="items-center mt-4 p-4 bg-white rounded-lg border border-gray-300 shadow-md dark:bg-gray-800">
                                    <div class="label">
                                        <span class="label-text">List Barang</span>
                                    </div>
                                    <div id="dynamic-form-container">
                                        <!-- Dynamic form rows will be added here -->
                                    </div>
                                    <div class="justify-center flex">
                                        <button type="button" id="add-form-row"
                                            class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-purple-600 hover:text-white active:text-white transition-colors duration-150 bg-transparent border border-purple-600 rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                            style="width: 60%;">
                                            Tambah form
                                        </button>
                                    </div>
                                </div>

                                <div class="">
                                    <button type="submit" id="submitButton"
                                        class="mt-4 ml-auto flex min-w-xs px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Tambahkan
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>

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
                        <li><a href="{{ route('barangmasuk.excel') }}">Excel</a></li>
                        <li><a href="{{ route('barangmasuk.pdf') }}">PDF</a></li>
                    </ul>
                </div>

                 {{-- Filter --}}
                 <select id="categoryFilter" class="select select-bordered max-w-xs bg-white text-gray-700 shadow-md ml-auto">
                    <option disabled selected>Supplier</option>
                    <option>Artmedia</option>
                    <option>Alat kebersihan</option>
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
                                    <th class="px-4 py-3 text-center">Petugas</th>
                                    <th class="px-4 py-3 text-center">Jumlah Item</th>
                                    <th class="px-4 py-3 text-center">Supplier</th>
                                    <th class="px-4 py-3 text-center">Tanggal</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                @foreach ($barangmasuk as $bm)
                                    <tr class="text-gray-600 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ $bm->kode }}
                                        </td>

                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bm->pegawai->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bm->jumlah_item }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bm->supplier->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $bm->created_at }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center space-x-4 text-sm">

                                                <!-- Button beritaAcara -->
                                                <button onclick="beritaAcara{{ $bm->kode }}.showModal()"
                                                    class="flex items-center justify-center w-8 h-8 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Upload">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        aria-hidden="true" fill="currentColor" viewBox="0 0 448 512">
                                                        <path
                                                            d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3 192 320c0 17.7 14.3 32 32 32s32-14.3 32-32l0-210.7 73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 64c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 64c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-64z" />
                                                    </svg>
                                                </button>

                                                {{-- Modal beritaAcara --}}
                                                <dialog id="beritaAcara{{ $bm->kode }}" class="modal">
                                                    <div class="modal-box bg-white">
                                                        <form action="{{ route('barangmasuk.berita.acara', $bm->kode) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <h3 class="font-bold text-lg mb-4">Upload berita acara</h3>
                                                            <label class="text-sm font-semibold mb-2">Pemeriksaan</label>
                                                            <div class="flex mt-5 w-full">
                                                                <input type="file" accept="image/*" name="pemeriksaan"
                                                                    class="file-input file-input-ghost w-full" />
                                                            </div>

                                                            <hr class="my-4">

                                                            <label class="text-sm font-semibold mb-2">Serah terima</label>
                                                            <div class="flex mt-5 w-full">
                                                                <input type="file" accept="image/*"
                                                                    name="serah_terima"
                                                                    class="file-input file-input-ghost w-full" />
                                                            </div>

                                                            <div class="flex">
                                                                <button type="submit"
                                                                    class="mt-4 ml-auto btn flex items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                                    <span>Kirim</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <form method="dialog" class="modal-backdrop">
                                                        <button>close</button>
                                                    </form>
                                                </dialog>

                                                <!-- Button lihatFile -->
                                                <button onclick="lihatFile{{ $bm->kode }}.showModal()"
                                                    class="flex items-center justify-center w-8 h-8 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="View">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        aria-hidden="true" fill="currentColor" viewBox="0 0 384 512">
                                                        <path
                                                            d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z" />
                                                    </svg>
                                                </button>

                                                {{-- Modal lihatFile --}}
                                                <dialog id="lihatFile{{ $bm->kode }}" class="modal">
                                                    <div class="modal-box w-11/12 max-w-5xl bg-white text-gray-700">
                                                        <h3 class="font-bold text-lg">Berita acara</h3>
                                                        <div class="grid grid-cols-2">
                                                            <div>
                                                                <p class="py-4 font-semibold">Pemeriksaan</p>
                                                            </div>
                                                            <div>
                                                                <p class="py-4 font-semibold">Serah terima</p>
                                                            </div>
                                                            <img src={{ asset('storage/' . $bm->pemeriksaan) }}
                                                                class="rounded-box max-w-md"
                                                                alt="Tidak ada berita acara pemeriksaan">
                                                            <img src={{ asset('storage/' . $bm->serah_terima) }}
                                                                class="rounded-box max-w-md"
                                                                alt="Tidak ada berita acara serah terima">

                                                        </div>
                                                        {{-- <div class="flex flex-col w-full lg:flex-row">
                                                            <img src={{ asset('storage/' . $bm->pemeriksaan) }}
                                                                class="rounded-box max-w-md" alt="Tidak ada cerita acara pemeriksaan">
                                                            <div class="divider lg:divider-horizontal">OR</div>
                                                            <img src={{ asset('storage/' . $bm->serah_terima) }}
                                                                class="rounded-box max-w-md" alt="Tidak ada cerita acara serah">
                                                        </div> --}}
                                                    </div>
                                                    <form method="dialog" class="modal-backdrop">
                                                        <button>close</button>
                                                    </form>
                                                </dialog>

                                                <!-- Button detailBM-->
                                                <button onclick="detailBM{{ $bm->kode }}.showModal()"
                                                    class="flex items-center justify-center w-8 h-8 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Details">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        aria-hidden="true" fill="currentColor" viewBox="0 0 576 512">
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
                        {{-- {{ $barangmasuk->links() }} --}}
                    </div>
                </div>
            </div>
            {{-- Table Section End --}}

        </div>

        {{-- Modal detailBM --}}
        @foreach ($barangmasuk as $bm)
            <dialog id="detailBM{{ $bm->kode }}" class="modal">
                <div class="modal-box">
                    <div class="flex justify-between mb-2">
                        <h3 class="text-lg font-bold">Barang Masuk</h3>
                        <p class="mt-1">
                            <a class="text-sm font-normal text-purple-600 dark:text-purple-400 hover:underline"
                                href="{{ route('barangmasuk.edit', $bm->kode) }}">
                                Edit barang masuk
                            </a>
                        </p>
                    </div>
                    {{-- Search bar --}}
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


                    {{-- Table Section Start --}}
                    <div
                        class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-2">
                        <div class="w-full overflow-hidden rounded-lg">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap" id="itemsTable">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Kode</th>
                                            <th class="px-4 py-3">Nama</th>
                                            <th class="px-4 py-3">Stok Masuk</th>
                                            <th class="px-4 py-3">Satuan</th>
                                        </tr>
                                    </thead>

                                    @foreach ($detailBM as $dbm)
                                        @if ($dbm->kode_barang_masuk == $bm->kode)
                                            <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                                <tr class="text-gray-600 dark:text-gray-400">
                                                    <td class="px-4 py-3 text-sm font-semibold">
                                                        {{ $dbm->item->kode }}
                                                    </td>

                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $dbm->item->nama }}
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $dbm->kuantiti }}
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $dbm->item->satuan }}
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
