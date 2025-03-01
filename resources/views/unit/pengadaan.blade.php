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

            <form action="{{ route('pengadaan.store') }}" method="POST">
                @csrf

                {{-- Nota Barang Start --}}
                <div class="min-w-0 p-4 bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800">
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
                            <input type="text" placeholder="" value="{{ $unit }}" readonly
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
                                        <th class="px-4 py-3 text-center">Jumlah</th>
                                        <th class="px-4 py-3 text-center">Satuan</th>
                                        <th class="px-4 py-3"></th>
                                    </tr>
                                </thead>

                                @foreach ($keranjang as $k)
                                    <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                        <tr class="text-gray-600 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm font-semibold">
                                                {{ $k->item->kode }}
                                            </td>

                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="avatar">
                                                        <div class="mask mask-squircle h-12 w-12">
                                                            <img src={{ asset('storage/' . $k->item->gambar) }}
                                                                alt="Avatar Tailwind CSS Component" />
                                                        </div>
                                                    </div>
                                                    <div class="ml-2">
                                                        <p class="font-semibold flex gap-1">
                                                            {{ $k->item->nama }}
                                                        </p>
                                                        <p class="text-xs text-gray-800 dark:text-gray-400">
                                                            {{ $k->item->kategori->nama }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-3 text-xs">
                                                {{ $k->item->merk }}
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
                                                            type="text" value="{{ $k->kuantiti }}"
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
                                                {{ $k->item->satuan }}
                                            </td>
                                            <td class="px-4 py-3">

                                                <button type="button"
                                                    onclick="deleteConfirmation{{ $k->id }}.showModal()"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>

                                                <dialog id="deleteConfirmation{{ $k->id }}" class="modal">
                                                    <div class="modal-box">
                                                        <div class="flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                class="text-purple-700" height="50"
                                                                viewBox="0 0 24 24">
                                                                <rect width="24" height="24" fill="none" />
                                                                <path fill="currentColor"
                                                                    d="M2.725 21q-.275 0-.5-.137t-.35-.363t-.137-.488t.137-.512l9.25-16q.15-.25.388-.375T12 3t.488.125t.387.375l9.25 16q.15.25.138.513t-.138.487t-.35.363t-.5.137zM12 18q.425 0 .713-.288T13 17t-.288-.712T12 16t-.712.288T11 17t.288.713T12 18m0-3q.425 0 .713-.288T13 14v-3q0-.425-.288-.712T12 10t-.712.288T11 11v3q0 .425.288.713T12 15" />
                                                            </svg>
                                                        </div>
                                                        <p class="py-4 text-center text-gray-600 text-sm">Apakah anda
                                                            yakin
                                                            untuk menghapus <span
                                                                class="font-semibold">{{ $k->item->nama }}</span> ?</p>
                                                        <div class="flex gap-2"></div>
                                                        <div class="modal-action">
                                                            <a href="{{ route('pengadaan') }}" class="btn">Tutup</a>
                                                            <button type="button"
                                                                onclick="document.getElementById('delete-form-{{ $k->id }}').submit();"
                                                                class="btn bg-purple-700 text-white">
                                                                Hapus
                                                            </button>
                                                        </div>

                                                    </div>
                                                </dialog>

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
                
                @if (isset($k))
                    <div class="">
                        <button type="submit" id="submitButton"
                            class="mt-4 ml-auto flex min-w-xs px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Tambahkan
                        </button>
                    </div>
                @endif

            </form>

            @if (isset($k))
                <form id="delete-form-{{ $k->id }}" action="{{ route('keranjang.destroy', $k->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            @endif

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
    </main>
@endsection
