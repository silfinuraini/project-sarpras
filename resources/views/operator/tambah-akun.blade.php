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
            <form action="{{ route('akun.store') }}" method="POST">
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
                        <label
                            class="input input-bordered flex items-center mb-2 bg-white text-gray-600 border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M384 48c8.8 0 16 7.2 16 16l0 384c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16L80 64c0-8.8 7.2-16 16-16l288 0zM96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80l-64 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z" />
                            </svg>
                            <select name="nip"
                                class="bg=-white ms-2 outlin-none border-none text-sm w-full text-gray-700 ">
                                @foreach ($pegawai as $p)
                                    <option value="{{ $p->nip }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label
                            class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-70" style="fill: #430A5D;"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                            <input type="text" name="username" class=" input border-none text-sm"
                                placeholder="Username" />
                        </label>
                        <label
                            class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-70" style="fill: #430A5D;"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5" />
                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg>
                            <input type="text" name="password" class=" input border-none text-sm"
                                placeholder="Password   " />
                        </label>

                    </div>
                </div>
                <button type="submit"
                    class="w-full my-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Buat
                </button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    </main>
@endsection
