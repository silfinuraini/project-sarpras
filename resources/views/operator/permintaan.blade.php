@extends('layouts.operator-main')

@section('content')
    <main class="h-full bg-gray-50 my-4 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
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
                        Pengajuan
                    </li>
                </ul>
            </div>

            <div class="flex mb-2 gap-2">
                <label class="input w-full flex items-center gap-2 bg-white ">
                    <input type="text" class="grow border-none" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
                <select class="ml-auto select select-bordered max-w-xs bg-white text-gray-800">
                    <option disabled selected>Status</option>
                    <option>Diterima</option>
                    <option>Ditolak</option>
                    <option>Menunggu acc</option>
                </select>
                <button onclick="formPengadaan.showModal()"
                    class=" btn flex items-center justify-between px-4 py-2 text-sm font-medium border-none text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple ml-auto"
                    fdprocessedid="allgztj">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                </button>

                <!-- Open the modal using ID.showModal() method -->
                <dialog id="formPengadaan" class="modal">
                    <div class="modal-box bg-white text-gray-800 ">
                        <form action="{{ route('operator.tambahpermintaan') }}" method="POST">
                            @csrf
                            <div class="grid mx-4 mt-2 md:grid-cols-4">
                                <div class="col-span-2">
                                    <div class="min-w-0 my-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                        <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                            Unit
                                        </h4>
                                        <p class="text-gray-800 text-sm dark:text-gray-400">
                                            Nama unit wajib diisi
                                        </p>
                                    </div>
                                </div>
                                <div class="my-4 col-span-2 justify-center items-center">
                                    <select type="text" placeholder="" name="nip"
                                        class="input text-sm  input-bordered w-full text-gray-800 bg-white">
                                        @foreach ($user as $user)
                                            <option value="{{ $user->nip }}">{{ $user->pegawai->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2 form-control w-full relative col-span-4">
                                    <input type="text" placeholder="" name="sifat"
                                        class="input text-sm bg-white text-gray-800 input-bordered w-full pt-4 pb-1"
                                        fdprocessedid="51tx8d">
                                    <label
                                        class="absolute text-md text-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">SIfat</label>
                                </div>
                                <div class="mb-1 form-control w-full relative col-span-4">
                                    <input type="text" placeholder="" name="perihal"
                                        class="input text-sm bg-white text-gray-800 input-bordered w-full pt-4 pb-1"
                                        fdprocessedid="51tx8d">
                                    <label
                                        class="absolute text-md text-bold text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Perihal</label>
                                </div>
                            </div>
                            <div class="items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
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
                            <button type="submit"
                                class="w-full my-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Buat
                            </button>
                        </form>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
            </div>
            <script>
                $(document).ready(function() {
                    $('.select2').select2();
                });

                $('.select2-ajax').select2({
                    ajax: {
                        url: '/api/items',
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.nama,
                                        kode: item.kode
                                    }
                                })
                            };
                        },
                        cache: true
                    }
                });
            </script>
            <div class="flex items-center p-4 mt-2 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="w-full overflow-hidden rounded-lg shadow-xs mb-2">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-800  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Unit</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    {{-- @if ($permintaan->status == 'menunggu') --}}
                                    <th class="px-4 py-3">Aksi</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-800 dark:bg-gray-800">
                                @foreach ($permintaan as $p)
                                    <tr class="text-gray-800 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ $p->kode }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $p->pegawai->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @if ($p->status == 'menunggu')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                                    {{ $p->status }}
                                                </span>
                                            @elseif ($p->status == 'disetujui')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-white dark:bg-green-600">
                                                    {{ $p->status }}
                                                </span>
                                            @elseif ($p->status == 'ditolak')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-white dark:bg-re-600">
                                                    {{ $p->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            {{ $p->created_at }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                                <a href={{ route('operator.detailpermintaan', $p->kode) }}
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div
                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-800  sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
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
                                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
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
                                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
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
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('dynamic-form-container');
            const addButton = document.getElementById('add-form-row');

            function createFormRow() {
                const newRow = document.createElement('div');
                newRow.className = 'flex gap-2 mb-2 items-center dynamic-form-row';
                newRow.innerHTML = `
                    <label class="input w-full input-bordered flex focus:outline-none items-center bg-white text-gray-700 h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                        </svg>
                        <select name="item[]" class="bg-white ms-2 outline-none border-none text-sm w-full text-gray-700">
                            @foreach ($item as $item)
                                <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <div class="h-10 bg-white border border-gray-200 rounded-xl flex items-center">
                        <button type="button" class="px-2 h-full inline-flex justify-center items-center text-sm font-medium rounded-l-xl border-r border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none decrement-btn">
                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                        </button>
                        <input class="p-0 w-8 bg-transparent border-0 text-gray-800 text-center focus:ring-0" name="kuantiti[]" value="1" min=1 >
                        <button type="button" class="px-2 h-full inline-flex justify-center items-center text-sm font-medium rounded-r-xl border-l border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none increment-btn">
                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </button>
                    </div>
                    <button type="button" class="h-10 px-4 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-transparent border border-gray-200 rounded-xl hover:bg-gray-50 focus:outline-none focus:shadow-outline-red remove-form-row">
                        X
                    </button>
                `;

                // Add event listeners for the new row
                newRow.querySelector('.decrement-btn').addEventListener('click', function() {
                    const input = this.parentNode.querySelector('input[name="kuantiti[]"]');
                    input.value = Math.max(0, parseInt(input.value) - 1);
                });

                newRow.querySelector('.increment-btn').addEventListener('click', function() {
                    const input = this.parentNode.querySelector('input[name="kuantiti[]"]');
                    input.value = parseInt(input.value) + 1;
                });

                newRow.querySelector('.remove-form-row').addEventListener('click', function() {
                    if (container.children.length > 1) {
                        container.removeChild(newRow);
                    } else {
                        alert('Minimal harus ada satu form barang.');
                    }
                });

                return newRow;
            }

            // Add initial form row
            container.appendChild(createFormRow());

            // Add new form row when "Tambah form" button is clicked
            addButton.addEventListener('click', function() {
                container.appendChild(createFormRow());
            });
        });
    </script>
@endsection
