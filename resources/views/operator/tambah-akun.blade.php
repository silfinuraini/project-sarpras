@extends('layouts.operator-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 my-6 mx-auto grid">
            <div class="text-sm breadcrumbs">
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
                    <form action="" method="">

                    </form>
                    <h3 class="mb-8 font-semibold text-gray-800 dark:text-gray-300">
                        Masukkan data akun
                    </h3>

                    <label class="input input-bordered flex items-center mb-2 bg-white text-gray-600 border-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM208 288l64 0c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z" />
                        </svg>
                        <select id="namaPegawai"
                        class="grow ms-4 border-none w-full bg-white text-sm text-gray-600">
                           
                        </select>
                    </label>
                    <label
                        class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-600 border-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                        </svg>
                        <input type="text" class="grow ms-4 focus:outline-none border-none" placeholder="Username" />
                    </label>
                    <label class="input input-bordered flex items-center mb-2 bg-white text-gray-600 border-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70" style="fill: #430A5D;">
                            <path fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="text" class="grow ms-4 border-none" placeholder="Username" />
                    </label>
                </div>
            </div>
            <button
                class=" my-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Buat
            </button>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#namaPegawai').select2({
                    placeholder: 'Nama Pegawai',
                    ajax: {
                        url: "{{ route('akun.create') }}"
                    }
                });
            });

        </script>
    </main>
@endsection
