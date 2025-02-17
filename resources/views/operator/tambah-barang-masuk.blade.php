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
                        Tambah Barang masuk
                    </li>
                </ul>
            </div>

            <form action="{{ route('barangmasuk.store') }}" method="POST">
                @csrf

                <div
                    class="px-4 py-3 mb-6 bg-white text-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-800">
                        Barang Masuk
                    </h4>
                    <label class="form-control w-full text-gray-700 max-w-xs">
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
                                class="max-w-xs mt-4 px-4 py-2 text-sm font-medium leading-5 text-purple-600 hover:text-white active:text-white transition-colors duration-150 bg-transparent border border-purple-600 rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
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
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('dynamic-form-container');
            const addButton = document.getElementById('add-form-row');

            function initializeSelect2(selectElement) {
                $(selectElement).select2();
            }

            function createFormRow() {
                const newRow = document.createElement('div');
                newRow.className = 'flex gap-2 mb-2 items-center dynamic-form-row';
                newRow.innerHTML = `
                    <select name="item[]" class="select select-bordered w-full h-10 text-gray-700 select2">
                        <option disabled selected>Pilih Item</option>
                        @foreach ($item as $item)
                            <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <div class="h-10 bg-white border border-gray-300 rounded-lg flex items-center">
                        <button type="button" class="px-2 h-full inline-flex justify-center items-center text-sm font-medium rounded-l-lg border-r border-gray-300 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none decrement-btn">
                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                        </button>
                        <input class="p-0 w-8 bg-transparent border-0 text-gray-800 text-center focus:ring-0" type="text" name="kuantiti[]" value="0">
                        <button type="button" class="px-2 h-full inline-flex justify-center items-center text-sm font-medium rounded-r-lg border-l border-gray-300 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none increment-btn">
                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </button>
                    </div>
                    <button type="button" class="h-10 px-4 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-transparent border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:shadow-outline-red remove-form-row">
                        X
                    </button>
                `;

                // Inisialisasi Select2 setelah elemen ditambahkan ke DOM
                container.appendChild(newRow);
                initializeSelect2(newRow.querySelector('.select2'));

                // Event listener untuk tombol decrement
                newRow.querySelector('.decrement-btn').addEventListener('click', function() {
                    const input = this.parentNode.querySelector('input[name="kuantiti[]"]');
                    input.value = Math.max(0, parseInt(input.value) - 1);
                });

                // Event listener untuk tombol increment
                newRow.querySelector('.increment-btn').addEventListener('click', function() {
                    const input = this.parentNode.querySelector('input[name="kuantiti[]"]');
                    input.value = parseInt(input.value) + 1;
                });

                // Event listener untuk tombol remove
                newRow.querySelector('.remove-form-row').addEventListener('click', function() {
                    if (container.children.length > 1) {
                        container.removeChild(newRow);
                    } else {
                        alert('Minimal harus ada satu form barang.');
                    }
                });

                return newRow;
            }

            // Tambahkan baris pertama
            container.appendChild(createFormRow());

            // Tambah baris baru ketika tombol diklik
            addButton.addEventListener('click', function() {
                container.appendChild(createFormRow());
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#select').select2();
        });
    </script>

    <style>
        /* Styling khusus Select2 */
        .select2-container .select2-selection--single {
            height: 44px;
            padding: 8px 16px;
            font-size: 14px;
            line-height: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #fff;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Placeholder style */
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #888;
        }

        /* Saat select aktif */
        .select2-container--default .select2-selection--single:focus {
            border-color: #d1d5db;
            outline: none;
            box-shadow: 0 0 5px rgba(209, 213, 219, 1);
        }

        /* Style dropdown */
        .select2-container--default .select2-results__option {
            padding: 10px;
            font-size: 14px;
        }

        /* Hover pada dropdown */
        .select2-container--default .select2-results__option--highlighted {
            background-color: #9333ea;
            color: white;
        }

        /* Styling saat select disabled */
        .select2-container--default .select2-selection--single.select2-selection__disabled {
            background-color: #f5f5f5;
            color: #999;
            border-color: #ddd;
            cursor: not-allowed;
        }

        /* Ubah warna saat hover di dropdown */
        .select2-container--default .select2-results__option--highlighted {
            background-color: #9333ea !important;
            /* Warna ungu */
            color: white !important;
        }

        /* Ubah warna saat opsi dipilih */
        .select2-container--default .select2-results__option[aria-selected="true"] {
            background-color: #9333ea !important;
            /* Warna ungu lebih gelap */
            color: white !important;
        }

        /* Membuat dropdown memiliki sudut membulat */
        .select2-container--default .select2-selection--single {
            border-radius: 8px !important;
            /* Rounded */
            border: 1px solid #ccc;
            height: 44px;
            padding: 8px 16px;
            font-size: 14px;
            line-height: 20px;
            background-color: #fff;
        }

        /* Membuat dropdown list juga rounded */
        .select2-container--default .select2-dropdown {
            border-radius: 8px !important;
            overflow: hidden;
            /* Menghindari overflow */
            border: 1px solid #ccc;
        }

        /* Membuat setiap opsi dalam dropdown juga rounded */
        .select2-container--default .select2-results__option {
            border-radius: 6px;
            /* Biar opsi juga sedikit rounded */
            margin: 4px;
            /* Biar tidak terlalu rapat */
        }

        /* Membuat input pencarian dalam dropdown Select2 menjadi rounded */
        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-radius: 8px !important;
            /* Rounded */
            border: 1px solid #ccc;
            padding: 8px 12px;
            font-size: 14px;
            outline: none;
        }

        /* Mengubah tampilan saat input aktif/fokus */
        .select2-container--default .select2-search--dropdown .select2-search__field:focus {
            border-color: #9333ea;
            /* Warna ungu */
            box-shadow: 0 0 5px rgba(139, 92, 246, 0.5);
            /* Efek glow ungu */
        }

        /* Membuat dropdown box juga rounded */
        .select2-container--default .select2-dropdown {
            border-radius: 8px !important;
            overflow: hidden;
            border: 1px solid #ccc;
        }
    </style>
@endsection
