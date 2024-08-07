@extends('layouts.operator-main')

@section('content')
    <main class="h-full pb-16 my-4 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="text-sm mb-4 breadcrumbs">
                <ul class="text-gray-700">
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
                        <a href="{{ route('databarang') }}">
                            Data barang
                        </a>
                    </li>
                    <li>
                        Tambah barang
                    </li>
                </ul>
            </div>

            <!-- General elements -->

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('item.update', $items->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mt-4 md:grid-cols-2" style="margin-left: 1%; margin-right: 1%;">
                        <div>
                            <label class="block text-sm">
                                <b><span class="text-gray-700 dark:text-gray-400">Kode</span></b>
                                <input type="text" value="{{ $items->kode }}" name="kode"
                                    class="input input-bordered text-sm block w-full mt-1 max-w-s text-gray-700 bg-white border-purple-300" />
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm">
                                <b><span class="text-gray-700 dark:text-gray-400">Nama</span></b>
                                <input type="text" value="{{ $items->nama }}" name="nama"
                                    class="input input-bordered text-sm block w-full mt-1 max-w-s text-gray-700 bg-white border-purple-300" />
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm">
                                <b><span class="text-gray-700 dark:text-gray-400">Merk</span></b>
                                <input type="text" value="{{ $items->merek }}ron" name="merek"
                                    class="input input-bordered text-sm block w-full mt-1 max-w-s text-gray-700 bg-white border-purple-300" />
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm">
                                <b><span class="text-gray-700 dark:text-gray-400">Harga</span></b>
                                <input type="text" value="{{ $items->harga }}" name="harga"
                                    class="input input-bordered  text-sm block w-full mt-1 max-w-s text-gray-700 bg-white border-purple-300" />
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm">
                                <b><span class="text-gray-700 dark:text-gray-400">
                                        Satuan
                                    </span></b>
                                <select class="block mt-1 select select-bordered bg-white border-purple-300 text-gray-600"
                                    style="width: 100%;" name="satuan">
                                    <option>Pcs</option>
                                    <option>Rim</option>
                                    <option>Lusin</option>
                                    <option>Box</option>
                                </select>
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm">
                                <b><span class="text-gray-700 dark:text-gray-400">
                                        Kategori
                                    </span></b>
                                <select class="block mt-1 select select-bordered bg-white border-purple-300 text-gray-600"
                                    style="width: 100%;" name="kategori_id">
                                    @foreach ($kategori as $k )
                                        <option value="{{ $k -> id }}">{{ $k -> nama }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm">
                                <b><span class="text-gray-700 dark:text-gray-400">Stok</span></b>
                                <input type="text" value="{{ $items->stok }}" name="stok"
                                    class="input input-bordered  text-sm block w-full mt-1 max-w-s text-gray-700 bg-white border-purple-300" />
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm">
                                <b><span class="text-gray-700 dark:text-gray-400">Stok Minimum</span></b>
                                <input type="text" value="{{ $items->stok_minimum }}" name="stok_minimum"
                                    class="input input-bordered  text-sm block w-full mt-1 max-w-s text-gray-700 bg-white border-purple-300" />
                            </label>
                        </div>
                        
                    </div>
                    <div style="margin-left: 1%; margin-right: 1%;">
                        <div>
                            <label class="block text-sm mt-5">
                                <b><span class="text-gray-700  dark:text-gray-400">
                                        Upload gambar
                                    </span></b>
                                <input type="file"
                                    class="block mt-1 file-input file-input-ghost w-full bg-white border-purple-300 text-gray-600" />
                            </label>
                        </div>
                        <label class="block text-sm mb-5 mt-5 ">
                            <b><span class="text-gray-700 dark:text-gray-400">
                                    Deskripsi barang
                                </span></b>
                            <textarea class="block textarea mt-1 textarea-bordered bg-white border-purple-300 text-gray-600" style="width: 100%;"
                                value="{{ $items->deskripsi }}" name="deskripsi"></textarea>
                        </label>
                    </div>
                    <button
                        class="mt-2 mb-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        style="width: 100%;" type="submit">
                        Tambahkan
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
