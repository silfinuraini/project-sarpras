<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('') }}" > --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('src/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('src/js/charts-pie.js') }}" defer></script>
    @vite('resources/css/app.css')
</head>


<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <div class="flex flex-col flex-1 w-full">
            <!-- Navbar -->
            <div class="navbar bg-base-100 border">
                <div class="navbar-start">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a>Item 1</a></li>
                            <li>
                                <a>Parent</a>
                                <ul class="p-2">
                                    <li><a>Submenu 1</a></li>
                                    <li><a>Submenu 2</a></li>
                                </ul>
                            </li>
                            <li><a>Item 3</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost text-xl font-bold">Sarpras </a>
                </div>
                <div class="navbar-center hidden gap-1 lg:flex">
                    <label class="input input-bordered flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                clip-rule="evenodd" />
                        </svg>

                        <input type="text" class="grow border-none input input-sm w-80" placeholder="Cari.." />
                    </label>

                    {{-- <button
                        class="btn flex items-center justify-between px-4 py-2 text-sm font-medium  text-purple-700 transition-colors duration-150 bg-transparent border border-gray-300 rounded-lg active:bg-transparent hover:bg-transparent focus:outline-none focus:shadow-outline-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-70" viewBox="0 0 16 16">
                            <path
                                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg>
                    </button> --}}

                    <div class="dropdown dropdown-hover">
                        <div tabindex="0" role="button"
                            class="btn m-1 flex items-center justify-between px-4 py-2 text-sm font-medium text-purple-700 transition-colors duration-150 bg-transparent border border-gray-300 rounded-lg active:bg-transparent hover:bg-transparent focus:outline-none focus:shadow-outline-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                            </svg>
                        </div>
                        <div tabindex="0"
                            class="dropdown-content card card-compact text-sm bg-white z-[1] w-80 p-4 shadow">
                            <div class="card-body">
                                <h3 class="card-title text-lg font-semibold mb-4">Filter</h3>
                                <div class="space-y-4">
                                    <div>
                                        <p class="mb-1 font-medium">Kategori</p>
                                        <select class="select bg-white select-bordered w-full">
                                            <option disabled selected>Tampilkan semua</option>
                                            @foreach ($kategori as $k)
                                                <option>{{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <p class="mb-1 font-medium">Merk</p>
                                            <select class="select bg-white select-bordered w-full">
                                                <option disabled selected>All</option>
                                                <option>Han Solo</option>
                                                <option>Greedo</option>
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mb-1 font-medium">Jenis</p>
                                            <select class="select bg-white select-bordered w-full">
                                                <option disabled selected>All</option>
                                                <option>Han Solo</option>
                                                <option>Greedo</option>
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mb-1 font-medium">Warna</p>
                                            <select class="select bg-white select-bordered w-full">
                                                <option disabled selected>All</option>
                                                <option>Han Solo</option>
                                                <option>Greedo</option>
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mb-1 font-medium">Ukuran</p>
                                            <select class="select bg-white select-bordered w-full">
                                                <option disabled selected>All</option>
                                                <option>Han Solo</option>
                                                <option>Greedo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary w-full mt-6 text-white bg-purple-600 hover:bg-purple-700">
                                    Pakai
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- <ul
                        class="flex flex-col md:p-0 mt-4 font-medium border text-sm border-gray-100 rounded-box bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="kepala-unit-index.html"
                                class="block py-2 px-3 font-bold bg-transparent rounded md:bg-transparent text-purple-700 md:p-0 md:dark:text-purple-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="produk.html"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 md:dark:hover:text-purple-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Produk</a>
                        </li>
                        <li>
                            <a href="kontak.html"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 md:dark:hover:purple-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Kontak</a>
                        </li>
                    </ul> --}}
                </div>
                <div class="navbar-end mr-6">
                    <ul class="flex items-center flex-shrink-0 space-x-6">
                        <!-- Theme toggler -->
                        <li class="flex">
                            <button class="rounded-md focus:outline-none focus:shadow-outline-purple"
                                @click="toggleTheme" aria-label="Toggle color mode">
                                <template x-if="!dark">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                        </path>
                                    </svg>
                                </template>
                                <template x-if="dark">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </template>
                            </button>
                        </li>
                        <!-- Notifications menu -->
                        <li class="relative">
                            <a href="kepala-unit-laporan.html"
                                class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                                @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu"
                                aria-label="Notifications" aria-haspopup="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                                <!-- Notification badge -->
                                <span aria-hidden="true"
                                    class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                            </a>
                        </li>
                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                                aria-haspopup="true">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                                    alt="" aria-hidden="true" />
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                    aria-label="submenu">
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="edit-akun-user.html">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="#">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                                href="#">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                                <span>
                                                    Log out
                                                </span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="h-full overflow-y-auto">
                <div class="container my-4 px-6 mx-auto grid">

                    {{-- Breadcrumb --}}
                    <div class="text-sm mb-4 breadcrumbs text-gray-700">
                        <ul>
                            <li>
                                <a href="index.html">
                                    <svg class="w-4 h-4 stroke-current" aria-hidden="true" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewBox="0 0 24 24" stroke="currentColor">
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
                                Permintaan
                            </li>
                        </ul>
                    </div>

                    {{-- Content --}}
                    <form action="{{ route('permintaan.store') }}" method="POST">
                        @csrf
                        <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Permintaan</h3>
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
                                    <input type="text" placeholder="" value="{{ $unit[0]->nama }}" readonly
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
                        <div class="min-w-0 p-4 mt-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
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
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

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

</html>
