@extends('layouts.operator-main')

@section('content')
    <main class="h-full my-4 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            {{-- Breadcrumb Section Start --}}
            <div class="text-sm mb-4 breadcrumbs">
                <ul class="text-gray-600">
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
                        Laporan
                    </li>
                </ul>
            </div>
            {{-- Breadcrumb Section End --}}


            {{-- Nota Dinas Section Start --}}
            <div class="min-w-0 p-4 bg-white border border-gray-300 shadow-md rounded-box shadow-xs dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Nota Barang</h3>
                    <h4 class="mb-4 flex ml-auto font-sans text-sm text-gray-800 dark:text-gray-300">
                        {{ $item->created_at }}
                    </h4>
                </div>
                <div class="grid mt-2 md:grid-cols-4">
                    <div class="mx-4">
                        <div class="min-w-0 my-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                Kode
                            </h4>
                            <p class="text-gray-800 text-sm dark:text-gray-400">
                                Kode barang
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 p-4 justify-center items-center">
                        <input type="text" placeholder="" value=": {{ $item->kode }}" readonly
                            class="input w-full flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">
                    </div>
                    <div class="mx-4">
                        <div class="min-w-0 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                Nama 
                            </h4>
                            <p class="text-gray-800 text-sm dark:text-gray-400">
                                Nama barang
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 px-4 justify-center items-center">
                        <input type="text" placeholder="" value=": {{ $item->nama }}" name="sifat" readonly
                            class="input max-w-xs flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">
                    </div>
                    <div class="mx-4">
                        <div class="min-w-0 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                Kategori
                            </h4>
                            <p class="text-gray-800 text-sm dark:text-gray-400">
                                Kategori barang 
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 px-4 justify-center items-center">
                        <textarea type="text" placeholder="" name="perihal" readonly
                            class="input min-h-20 max-h-20 textarea w-full flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">: {{ $item->kategori->nama }}
                        </textarea>
                    </div>
                </div>
            </div>
            {{-- Nota Dinas Section End --}}
            <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-5">
                <div class="w-full overflow-hidden rounded-lg mb-2">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap" id="itemsTable">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3 text-center">Masuk</th>
                                    <th class="px-4 py-3 text-center">Keluar</th>
                                    <th class="px-4 py-3 text-center">Sisa</th>
                                    <th class="px-4 py-3 text-center">Satuan</th>
                                </tr>
                            </thead>


                            @php $total = 0; @endphp

                            @foreach ($data as $item)

                                @php
                                    $total += $item->barang_masuk - $item->barang_keluar;
                                @endphp

                                <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                    <tr class="text-gray-600 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ date('d-m-Y', strtotime($item->tanggal)) }}
                                        </td>
                                        
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $item->barang_masuk }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $item->barang_keluar }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $total }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $item->satuan }}
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="mx-4 my-2">
                        {{-- {{ $items->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
