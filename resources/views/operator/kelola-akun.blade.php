@extends('layouts.operator-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container my-4 px-6 mx-auto grid">
            <div class="text-sm mb-4 breadcrumbs text-gray-600">
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
                </ul>
            </div>
            <!-- CTA -->
            <div class="flex mb-2 p-2 gap-2">
                <label class="input w-full flex items-center gap-2 bg-white ">
                    <input type="text" class="grow border-none" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
                <select class="select select-bordered max-w-xs bg-white text-gray-600" fdprocessedid="5dae8g">
                    <option disabled="" selected="">Jenis akun</option>
                    <option>Aktif</option>
                    <option>Non aktif</option>
                </select>
                <a href="{{ route('akun.create') }}"
                    class=" btn border-none ml-auto flex items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 -ml-1" fill="currentColor"
                        aria-hidden="true"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                    </svg>
                    <span>Tambah akun</span>
                </a>
                <a href="{{ route('pegawai') }}"
                    class=" btn border-none ml-auto flex items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M384 48c8.8 0 16 7.2 16 16l0 384c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16L80 64c0-8.8 7.2-16 16-16l288 0zM96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80l-64 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z">
                        </path>
                    </svg>
                </a>
            </div>
            <!-- Cards -->
            <div class="p-2 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="grid grid-cols-4 gap-4">

                    @foreach ($users as $user)
                        <div class=" bg-white rounded-box shadow-xs dark:bg-gray-800 border border-gray-300 mb-4">
                            <div class="p-4">
                                <div class="avatar ">
                                    <div class="w-full mask mask-squircle">
                                        <img
                                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                    </div>
                                </div>
                                <div class="my-6 ms-2">
                                    <h1 class="mb-1 text-lg text-gray-700 font-bold">
                                        {{ $user->pegawai->nama }}
                                    </h1>
                                    <h6 class="mb-4 text-sm font-bold text-purple-600">
                                        {{ $user->username }}
                                    </h6>
                                    <div class="gap-2" style="display: flex;">
                                        <button onclick="editakun{{ $user->nip }}.showModal()"
                                            class=" flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 active:text-white hover:text-white transition-colors duration-150 bg-transparent border border-purple-600 rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Like">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button
                                            class="px-3 py-1 text-sm w-full font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Deaktivasi
                                        </button>

                                        <dialog id="editakun{{ $user->nip }}" class="modal">
                                            <div class="modal-box bg-white text-gray-700 w-11/12 max-w-5xl">
                                                <form action="{{ route('akun.edit', $user->nip) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="grid gap-4 mt-6 mb-2 md:grid-cols-4">
                                                        <div
                                                            class="w-full p-4 bg-white rounded-box shadow-xs dark:bg-gray-800 justify-center items-center">
                                                            <h3 class="mb-4 font-semibold text-gray-800 dark:text-gray-300"
                                                                style="text-align: center;">
                                                                Masukkan foto
                                                            </h3>
                                                            <div class="avatar my-2 mx-10">
                                                                <div
                                                                    class="w-full rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                                                    <img
                                                                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                                                </div>
                                                            </div>
                                                            <button
                                                                class=" mt-2 px-4 py-2 text-sm font-medium leading-5 text-purple-600 hover:text-white active:text-white transition-colors duration-150 bg-transparent border border-purple-600 rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                                style="width: 100%;">
                                                                Pilih foto
                                                            </button>
                                                        </div>
                                                        <div
                                                            class="col-span-3 min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">

                                                            <h3 class="mb-8 font-semibold text-gray-800 dark:text-gray-300">
                                                                Masukkan data akun
                                                            </h3>
                                                            <label
                                                                class="input input-bordered flex items-center mb-2 bg-white text-gray-600 border-purple-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                                                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path
                                                                        d="M384 48c8.8 0 16 7.2 16 16l0 384c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16L80 64c0-8.8 7.2-16 16-16l288 0zM96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80l-64 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z" />
                                                                </svg>
                                                                <select name="nip"
                                                                    class="bg=-white ms-2 outlin-none border-none text-sm w-full text-gray-700 ">
                                                                    @foreach ($pegawai as $p)
                                                                        <option value="{{ $p->nip }}">
                                                                            {{ $p->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                            <label
                                                                class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-5 h-5 opacity-70" style="fill: #430A5D;"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                                                </svg>
                                                                <input type="text" name="username"
                                                                    class=" input border-none text-sm"
                                                                    value="{{ $user->username }}"
                                                                    placeholder="Nama supplier" />
                                                            </label>
                                                            <label
                                                                class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-5 h-5 opacity-70" style="fill: #430A5D;"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5" />
                                                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                                                </svg>
                                                                <input type="text" name="password"
                                                                    class=" input border-none text-sm"
                                                                    value="{{ $user->password }}"
                                                                    placeholder="Password" />
                                                            </label>

                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="w-full my-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                        Edit
                                                    </button>
                                                </form>
                                            </div>
                                            <form method="dialog" class="modal-backdrop">
                                                <button>close</button>
                                            </form>
                                        </dialog>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
