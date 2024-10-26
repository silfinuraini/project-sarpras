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
            <form action="{{ route('pengadaan.store') }}" method="POST">
                @csrf
                <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Pengadaan</h3>
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
                            <input type="text" placeholder="" value="{{ $keranjang[0]->pegawai->nama }}" readonly
                                class="input w-full input-bordered flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10"
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
                            <input type="text" placeholder="" value="" name="sifat"
                                class="input max-w-xs input-bordered flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10"
                                fdprocessedid="dee09r">
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
                            <textarea type="text" placeholder="" name="perihal" value=""
                                class="input min-h-20 max-h-20 textarea w-full input-bordered flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10"
                                fdprocessedid="dee09r"></textarea>
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
                                                <th class="px-4 py-3">Jumlah</th>
                                                <th class="px-4 py-3">Satuan</th>
                                                <th class="px-4 py-3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            @foreach ($keranjang as $krj)
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3 text-sm font-semibold">
                                                        {{ $krj->item->kode }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <!-- Avatar with inset shadow -->
                                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                                <img class="object-cover w-full h-full rounded-full"
                                                                    src={{ asset('storage/' . $krj->item->gambar) }}
                                                                    alt="" loading="lazy" />
                                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                                    aria-hidden="true"></div>
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold">{{ $krj->item->nama }}</p>
                                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                    {{ $krj->item->kategori->nama }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">
                                                        {{ $krj->item->merk }}
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        <!-- Input Number -->
                                                        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-box"
                                                            data-hs-input-number="">
                                                            <div class="flex items-center gap-x-1.5">
                                                                <button type="button"
                                                                    class="size-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                                                    data-hs-input-number-decrement>
                                                                    <svg class="flex-shrink-0 size-3.5"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                    </svg>
                                                                </button>
                                                                <input name="kuantiti[]"
                                                                    class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0"
                                                                    type="text" value="{{ $krj->kuantiti }}"
                                                                    data-hs-input-number-input="">
                                                                <button type="button"
                                                                    class="size-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                                                    data-hs-input-number-increment="">
                                                                    <svg class="flex-shrink-0 size-3.5"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                        <path d="M12 5v14"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- End Input Number -->
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">
                                                        {{ $krj->item->satuan }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center  text-sm">
                                                            <!-- <form
                                                                            action="{{ route('keranjang.destroy', $krj->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')

                                                                            <button type="submit"
                                                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-box dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                                                aria-label="Delete">
                                                                                <svg class="w-5 h-5" aria-hidden="true"
                                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                                        clip-rule="evenodd"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </form> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <script>
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
                                    </script>
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

                        <div class="col-span-3">
                            <button type="submit"
                                class="px-4 py-2 text-sm w-full font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Kirim
                            </button>
                        </div>
                    </div>
                </div>

            </form>
            <!-- <form id="deleteForm" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form> -->

            <script>
                function deleteItem(id) {
                    if (confirm('Are you sure you want to delete this item?')) {
                        var form = document.getElementById('deleteForm');
                        form.action = "{{ route('keranjang.destroy', '') }}/" + id;
                        form.submit();
                    }
                }

                // ... (other JavaScript code remains unchanged) ...
            </script>
        </div>
    </main>
@endsection
