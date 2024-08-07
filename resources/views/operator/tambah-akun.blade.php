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
                            <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
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
                    <select id="namaPegawai" class="select select-bordered w-full bg-white mb-2 border-purple-600 text-gray-600">
                        <option disabled selected>Who shot first?</option>
                        <option>Han Solo</option>
                        <option>Greedo</option>
                    </select>
                    <label
                        class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-600 border-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-4 h-4 opacity-70"
                            style="fill: #430A5D;">
                            <path
                                d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path
                                d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="grow ms-4 focus:outline-none border-none" placeholder="Email" />
                    </label>
                    <label class="input input-bordered flex items-center mb-2 bg-white text-gray-600 border-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70" style="fill: #430A5D;">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input type="text" class="grow ms-4 border-none" placeholder="Username" />
                    </label>
                    <label class="input input-bordered flex items-center mb-2 bg-white text-gray-600 border-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70" style="fill: #430A5D;">
                            <path fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="password" class="grow ms-4 border-none" value="password" />
                    </label>
                </div>
            </div>
            <button
                class=" my-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Buat
            </button>
        </div>
    </main>
@endsection
