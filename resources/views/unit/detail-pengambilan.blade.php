@extends('layouts.unit-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container my-4 px-6 mx-auto grid">
            <div class=" mx-4 text-sm breadcrumbs">
                <ul>
                    <li><a href="kepala-unit-index.html" class="font-semibold text-purple-600">Home</a></li>
                    <li>Diproses</li>
                </ul>
            </div>

            <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Barang Keluar</h3>
                    @if ($barangKeluar->status == 'belum diambil')
                        <form action="{{ route('pengambilan.update', $barangKeluar->kode) }}" method="POST">
                            @csrf
                            <button name="status" value="diambil"
                                class="btn bg-green-400 text-white btn-sm hover:bg-green-500 text-sm">Sudah Diambil</button>
                        </form>
                    @endif
                </div>
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
                        <input type="text" placeholder="" value=": {{ $barangKeluar->pegawai->nama }}" readonly
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
                        <input type="text" placeholder="" value=": {{ $barangKeluar->sifat }}" name="sifat"
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
                        <textarea type="text" placeholder="" name="perihal" value="{{ $barangKeluar->perihal }}"
                            class="input min-h-20 max-h-20 textarea w-full input-bordered flex focus:outline-none items-center text-sm bg-white border-none text-gray-700 h-10"
                            fdprocessedid="dee09r" readonly>: {{ $barangKeluar->perihal }}</textarea>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-hidden rounded-box shadow-xs mt-4">
                <div class="">
                    <div class="flex items-center mb-5 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800"
                        style="height:100%;">
                        <!-- content -->
                        <div class="w-full overflow-hidden rounded-box shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-white dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Kode</th>
                                            <th class="px-4 py-3">Barang</th>
                                            <th class="px-4 py-3">Merk</th>
                                            <th class="px-4 py-3 text-center">Jumlah</th>
                                            <th class="px-4 py-3 text-center">Satuan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        @foreach ($detailBarangKeluar as $dp)
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3 text-sm font-semibold">
                                                    {{ $dp->kode_item }}
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center text-sm">
                                                        <!-- Avatar with inset shadow -->
                                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full rounded-full"
                                                                src={{ asset('storage/' . $dp->item->gambar) }}
                                                                alt="" loading="lazy" />
                                                            <div class="absolute inset-0 rounded-full shadow-inner"
                                                                aria-hidden="true"></div>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold">{{ $dp->item->nama }}</p>
                                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                {{ $dp->item->kategori->nama }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $dp->item->merk }}
                                                </td>
                                                <td class="px-4 py-3 text-xs text-center">
                                                    {{ $dp->kuantiti }}
                                                </td>
                                                <td class="px-4 py-3 text-sm text-center">
                                                    {{ $dp->item->satuan }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <script>
                                        // Fitur Kuantiti
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Select all increment and decrement buttons
                                            const decrementButtons = document.querySelectorAll('[data-hs-input-number-decrement]');
                                            const incrementButtons = document.querySelectorAll('[data-hs-input-number-increment]');

                                            decrementButtons.forEach(button => {
                                                button.addEventListener('click', function() {
                                                    const input = this.nextElementSibling;
                                                    let currentValue = parseInt(input.value);
                                                    if (currentValue > 0) {
                                                        input.value = currentValue - 1;
                                                    }
                                                });
                                            });

                                            incrementButtons.forEach(button => {
                                                button.addEventListener('click', function() {
                                                    const input = this.previousElementSibling;
                                                    let currentValue = parseInt(input.value);
                                                    input.value = currentValue + 1;
                                                });
                                            });
                                        });
                                    </script> --}}
                            </div>
                            <div
                                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-white sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                                <span class="flex items-center col-span-3">
                                    Showing 21-30 of 100
                                </span>
                                <span class="col-span-2"></span>
                                <!-- Pagination -->
                                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                    <nav aria-label="Table navigation">
                                        <ul class="inline-flex items-center">
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                                    aria-label="Previous">
                                                    <svg class="w-4 h-4 fill-current" aria-hidden="true"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                    1
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                    2
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                    3
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                    4
                                                </button>
                                            </li>
                                            <li>
                                                <span class="px-3 py-1">...</span>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                    8
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                    9
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                                    aria-label="Next">
                                                    <svg class="w-4 h-4 fill-current" aria-hidden="true"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </nav>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
