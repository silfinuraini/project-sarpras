@extends('layouts.operator-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 my-6 mx-auto grid">
            <div class="text-sm breadcrumbs text-gray-700">
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
                        <a href="kelola-akun.html">
                            Kelola akun
                        </a>
                    </li>
                    <li>
                        <a href="tambah-akun.html">
                            Tambah akun
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Charts -->
            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 mt-6 mb-2 md:grid-cols-4">
                    <div class="w-full p-4 bg-white rounded-box shadow-xs dark:bg-gray-800 justify-center items-center">
                        <h3 class="mb-4 font-semibold text-gray-800 dark:text-gray-300" style="text-align: center;">
                            Masukkan foto
                        </h3>
                        <div class="avatar my-2 mx-10">
                            <div class="w-full rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                            </div>
                        </div>
                        <button
                            class=" mt-2 px-4 py-2 text-sm font-medium leading-5 text-purple-600 hover:text-white active:text-white transition-colors duration-150 bg-transparent border border-purple-600 rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            style="width: 100%;">
                            Pilih foto
                        </button>
                    </div>
                    <div class="col-span-3 min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                        <h3 class="mb-8 font-semibold text-gray-800 dark:text-gray-300">
                            Masukkan data akun
                        </h3>
                        {{-- <label
                            class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128l95.1 0 11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128l58.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-68.9 0L325.8 320l58.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-68.9 0-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7-95.1 0-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384 32 384c-17.7 0-32-14.3-32-32s14.3-32 32-32l68.9 0 21.3-128L64 192c-17.7 0-32-14.3-32-32s14.3-32 32-32l68.9 0 11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320l95.1 0 21.3-128-95.1 0z" />
                            </svg>
                            <input type="text" name="kode" id="kode-supplier" class=" input border-none text-sm"
                                placeholder="Kode supplier" />
                        </label> --}}
                        <label
                            class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                            </svg>
                            <input type="text" name="nama" id="nama-supplier" class=" w-full input border-none text-sm"
                                placeholder="Nama supplier" />
                        </label>
                        <textarea name="alamat" id="alamat-supplier"
                            class="w-full textarea textarea-bordered text-gray-700 border-purple-600 bg-white" placeholder="Alamat"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class=" my-2 px-4 py-2 w-full text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Buat
                </button>
            </form>

            <!-- With actions -->
            <div class="flex mt-2 items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Alamat</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($supplier as $supp)
                                    <tr class=" text-gray-700 dark:text-gray-400">
                                        <td class="font-semibold px-4 py-3 text-sm">
                                            {{ $supp->kode }}
                                        </td>
                                        <td class="font-semibold px-4 py-3 text-sm">
                                            {{ $supp->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $supp->alamat }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center  text-sm">
                                                <button
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit"
                                                    onclick="addDataToForm('{{ $supp->nama }}', '{{ $supp->alamat }}')">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <button type="submit"
                                                    onclick="event.preventDefault(); document.getElementById('formHapus').submit();"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- @endforeach --}}
                        </table>
                    </div>
                    {{-- {{ $supplier->links() }} --}}
                </div>
            </div>
        </div>
    </main>
@endsection

@if (!empty($supp))
    <form id="formHapus" action="{{ route('supplier.destroy', $supp->kode) }}" method="DELETE">
        @csrf
        @method('DELETE')
    </form>
@endif

<script>
    function addDataToForm(nama, alamat) {
        // document.getElementById('kode-supplier').value = kode
        document.getElementById('nama-supplier').value = nama
        document.getElementById('alamat-supplier').value = alamat
    }
</script>
