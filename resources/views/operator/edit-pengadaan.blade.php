@extends('layouts.operator-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container my-4 grid px-6 mx-auto">

            {{-- Breadcrumbs Section Start --}}
            <div class="text-sm mb-4 breadcrumbs text-gray-800">
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
                        <a href="prosespengajuan.html"></a>
                        Riwayat
                    </li>
                    <li>
                        <a href="detail-pengajuan.html"></a>
                        Detail riwayat
                    </li>
                </ul>
            </div>
            {{-- Breadcrumbs Section Start --}}

            <form action="{{ route('operator.updatekuantiti', $pengadaan->kode)}}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nota Dinas Section Start --}}
                <div class="min-w-0 p-4 bg-white border border-gray-300 shadow-md rounded-box shadow-xs dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Nota Dinas</h3>
                        <h4 class="mb-4 flex ml-auto font-sans text-sm text-gray-800 dark:text-gray-300">
                            {{ $pengadaan->created_at }}
                        </h4>
                    </div>
                    <div class="grid mt-2 md:grid-cols-4">
                        <div class="mx-4">
                            <div class="min-w-0 my-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Unit
                                </h4>
                                <p class="text-gray-800 text-sm dark:text-gray-400">
                                    Nama unit pengaju
                                </p>
                            </div>
                        </div>
                        <div class="col-span-3 p-4 justify-center items-center">
                            <input type="text" placeholder="" value=": {{ $pengadaan->pegawai->nama }}" readonly
                                class="input w-full flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">
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
                            <input type="text" placeholder="" value=": {{ $pengadaan->sifat }}"  readonly
                                class="input max-w-xs flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">
                        </div>
                        <div class="mx-4">
                            <div class="min-w-0 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Perihal
                                </h4>
                                <p class="text-gray-800 text-sm dark:text-gray-400">
                                    Alasan mengajukan barang-barang tersebut
                                </p>
                            </div>
                        </div>
                        <div class="col-span-3 px-4 justify-center items-center">
                            <textarea type="text" placeholder="" readonly
                                class="input min-h-20 max-h-20 textarea w-full flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">: {{ $pengadaan->perihal }}
                        </textarea>
                        </div>
                    </div>
                </div>
                {{-- Nota Dinas Section End --}}
    
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
                                        <th class="px-4 py-3 text-center">Jumlah</th>
                                        <th class="px-4 py-3 text-center">Satuan</th>
                                        <th class="px-4 py-3"></th>
                                    </tr>
                                </thead>
    
                                @foreach ($detailPengadaan as $dp)
                                    @if ($dp->kode_pengadaan == $pengadaan->kode)
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
    
                                                <td class="px-4 py-3 text-xs text-center">
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
                                                                type="text" value="{{ $dp->kuantiti }}"
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
    
                                                <td class="px-4 py-3 text-xs text-center">
                                                    {{ $dp->item->satuan }}
                                                </td>
                                                
    
                                            </tr>
    
                                        </tbody>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        <div class="mx-4 my-2">
                        </div>
                    </div>
                </div>
                {{-- Table Section End --}}
    
                <div class="">
                    <button type="submit"
                        class="mt-4 ml-auto flex min-w-xs px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </main>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all decrement buttons
            const decrementButtons = document.querySelectorAll('.decrement-btn');
            // Select all increment buttons
            const incrementButtons = document.querySelectorAll('.increment-btn');

            // Decrement event
            decrementButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Find the input field next to this button
                    const inputField = this.nextElementSibling;
                    // Get the current value of the input field
                    let currentValue = parseInt(inputField.value);

                    // Decrease the value by 1 if greater than 1
                    if (currentValue > 1) {
                        inputField.value = currentValue - 1;
                    }
                });
            });

            // Increment event
            incrementButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Find the input field before this button
                    const inputField = this.previousElementSibling;
                    // Get the current value of the input field
                    let currentValue = parseInt(inputField.value);

                    // Increase the value by 1
                    inputField.value = currentValue + 1;
                });
            });
        });
    </script>
@endsection
