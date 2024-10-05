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
                        Barang masuk
                    </li>
                </ul>
            </div>

            {{-- Content --}}
            <div class="min-w-0 p-4 mx-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Barang Masuk</h3>
                <div class="grid mt-2 md:grid-cols-4">
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
                            class="input text-sm  input-bordered w-full text-gray-800 bg-white" fdprocessedid="dee09r">
                            @foreach ($pengadaan as $pgd)
                                <option value="{{ $pgd->nip }}">{{ $pgd->kode }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <form action="{{ route('barangmasuk.store') }}" method="POST">
                    @csrf
                    <label
                        class="input w-full input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <select name="kode_supplier"
                            class="bg-white ms-2 outline-none border-none text-sm w-full text-gray-700">
                            <option selected hidden>Supplier</option>
                            @foreach ($supplier as $supp)
                                <option value="{{ $supp->kode }}">{{ $supp->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <div class="items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                        <div id="dynamic-form-container">
                            <!-- Dynamic form rows will be added here -->
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full my-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Buat
                    </button>
                </form>
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
                        <input class="p-0 w-8 bg-transparent border-0 text-gray-800 text-center focus:ring-0" type="text" name="kuantiti[]" value="0">
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
