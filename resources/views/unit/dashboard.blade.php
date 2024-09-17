<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('') }}" /da> --}}
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
                <div class="navbar-center hidden lg:flex">
                    <ul
                        class="flex flex-col md:p-0 mt-4 font-medium border text-sm border-gray-100 rounded-box bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="kepala-unit-index.html"
                                class="block py-2 px-3 font-bold bg-purple-700 rounded md:bg-transparent text-purple-700 md:p-0 md:dark:text-purple-500"
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
                    </ul>
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
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="#">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            <span>Log out</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main -->
            <main class="h-full overflow-y-auto bg-gray-50">
                <section class="bg-white dark:bg-gray-900">
                    <div
                        class="grid gap-8 max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-6">
                        <div class=" lg:mt-0 lg:col-span-5 lg:flex">
                            <img src="pict/user1.svg" class="w-82 " alt="hero image">
                        </div>
                        <div class="mr-auto place-self-center lg:col-span-7">
                            <h1
                                class="max-w-2xl mb-4 text-3xl text-purple-700 font-extrabold leading-none tracking-tight md:text-2xl xl:text-4xl dark:text-white">
                                Langkah - Langkah</h1>
                            <h1
                                class="max-w-2xl mb-4 text-3xl text-black font-extrabold leading-none tracking-tight md:text-2xl xl:text-4xl dark:text-white">
                                Penggunaan</h1>

                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-white bg-purple-600 rounded-full dark:text-white dark:bg-purple-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class=" text-sm leading-none font-bold text-gray-900 dark:text-gray-400">
                                        Pilih barang
                                    </p>
                                    <p
                                        class="text-xs xl:text-sm md:text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        Pilih barang-barang yang dibutuhkan,<br> lalu tentukan jumlahnya
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-white bg-pink-400 rounded-full dark:text-white dark:bg-pink-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M192 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm-8 384V352h16V480c0 17.7 14.3 32 32 32s32-14.3 32-32V192h56 64 16c17.7 0 32-14.3 32-32s-14.3-32-32-32H384V64H576V256H384V224H320v48c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H368c-26.5 0-48 21.5-48 48v80H243.1 177.1c-33.7 0-64.9 17.7-82.3 46.6l-58.3 97c-9.1 15.1-4.2 34.8 10.9 43.9s34.8 4.2 43.9-10.9L120 256.9V480c0 17.7 14.3 32 32 32s32-14.3 32-32z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class=" text-sm leading-none font-bold text-gray-900 dark:text-gray-400">
                                        Buat pengajuan
                                    </p>
                                    <p
                                        class="text-xs xl:text-sm md:text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        Isi data yang diperlukan untuk <br> melakukan pengajuan
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-white bg-purple-600 rounded-full dark:text-white dark:bg-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class=" text-sm leading-none font-bold text-gray-900 dark:text-gray-400">
                                        Proses
                                    </p>
                                    <p
                                        class="text-xs xl:text-sm md:text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        Menunggu konfirmasi admin
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-white bg-pink-400 rounded-full dark:text-teal-100 dark:bg-teal-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class=" text-sm leading-none font-bold text-gray-900 dark:text-gray-400">
                                        Permintaan
                                    </p>
                                    <p
                                        class="text-xs xl:text-sm md:text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        Setelah mendapat konfirmasi admin, Anda <br> dapat melakukan permintaan untuk
                                        mengambil barang
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container  mx-auto grid mt-5 my-10 p-2 ">
                        <div class="mb-5 min-w-min grid grid-cols-2 md:grid-cols-4 xl:grid-cols-4 gap-4">
                            <a href="{{ route('pengadaan') }}">
                                <div class="bg-white shadow rounded-box p-4 sm:p-6 xl:p-8">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <span
                                                class="text-md leading-none font-bold text-gray-900 mb-1">Pengadaan</span>
                                            <h3 class="text-xs xl:text-sm md:text-sm font-semibold text-gray-500">New
                                                products this week</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="menunggu-acc.html">
                                <div class="bg-white shadow rounded-box p-4 sm:p-6 xl:p-8">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <span class="text-md leading-none font-bold text-gray-900 mb-1">Menunggu
                                                acc</span>
                                            <h3 class="text-xs xl:text-sm md:text-sm font-semibold text-gray-500">User
                                                signups this week</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="permintaan.html">
                                <div class="bg-white shadow rounded-box p-4 sm:p-6 xl:p-8">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <span
                                                class="text-md leading-none font-bold text-gray-900 mb-1">Permintaan</span>
                                            <h3 class="text-xs xl:text-sm md:text-sm font-semibold text-gray-500">
                                                Visitors this week</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="disetujui.html">
                                <div class="bg-white shadow rounded-box p-4 sm:p-6 xl:p-8">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <span
                                                class="text-md leading-none font-bold text-gray-900 mb-1">Disetujui</span>
                                            <h3 class="text-xs xl:text-sm md:text-sm font-semibold text-gray-500">
                                                Visitors this week</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 mt-2">Produk Display</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                            @foreach ($item as $item)
                                <div
                                    class="max-w-sm bg-white border border-gray-200 rounded-box shadow dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img src="https://i.pinimg.com/564x/84/8e/62/848e62247384ee45350877695994a4cb.jpg"
                                            class="rounded-t-lg w-full" alt="Tailwind CSS Carousel component" />
                                    </a>
                                    <div class="p-5">
                                        <a href="#">
                                            <h5
                                                class="mb-2 text-md xl:text font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $item->nama }}</h5>
                                        </a>
                                        <p
                                            class="mb-3 font-normal text-xs xl:text-sm md:text-sm text-gray-700 dark:text-gray-400">
                                            {{ $item->deskripsi }}

                                        </p>
                                        <div class="flex gap-2">

                                            <button onclick="detailBarang{{ $item->kode }}.showModal()"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                aria-label="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                    fill="none" class=" opacity-70" viewBox="0 0 24 24"
                                                    stroke="white" stroke-width="3" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="16" x2="12"
                                                        y2="12"></line>
                                                    <line x1="12" y1="8" x2="12.01"
                                                        y2="8"></line>
                                                </svg>
                                            </button>
                                            <dialog id="detailBarang{{ $item->kode }}" class="modal">
                                                <div class="modal-box w-11/12 max-w-2xl rounded-box bg-white">
                                                    <div class="grid grid-cols-2 ">
                                                        <div
                                                            class="carousel rounded-box w-64 justify-center items-center">
                                                            <div class="carousel-item w-full">
                                                                <img src="https://i.pinimg.com/564x/84/8e/62/848e62247384ee45350877695994a4cb.jpg"
                                                                    class="w-full"
                                                                    alt="Tailwind CSS Carousel component" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="flex gap-1">
                                                                <h4
                                                                    class="mb-4 font-bold text-base text-gray-800 dark:text-gray-300">
                                                                    {{ $item->nama }}
                                                                </h4>
                                                                <div
                                                                    class="badge bg-purple-700 text-white border-none text-xs">
                                                                    {{ $item->kode }}</div>
                                                            </div>
                                                            <p
                                                                class="text-gray-800 text-xs dark:text-gray-400 flex gap-1 mb-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-tag" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0" />
                                                                    <path
                                                                        d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z" />
                                                                </svg>
                                                                Rp{{ number_format($item->harga, 0, ',', '.') }},00
                                                            </p>
                                                            <p
                                                                class="text-gray-800 text-xs dark:text-gray-400 flex gap-1 mb-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-puzzle" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.112 3.645A1.5 1.5 0 0 1 4.605 2H7a.5.5 0 0 1 .5.5v.382c0 .696-.497 1.182-.872 1.469a.5.5 0 0 0-.115.118l-.012.025L6.5 4.5v.003l.003.01q.005.015.036.053a.9.9 0 0 0 .27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.9.9 0 0 0 .271-.194.2.2 0 0 0 .039-.063v-.009l-.012-.025a.5.5 0 0 0-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 0 1 9 2h2.395a1.5 1.5 0 0 1 1.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0 1 11.395 14H9a.5.5 0 0 1-.5-.5v-.382c0-.696.497-1.182.872-1.469a.5.5 0 0 0 .115-.118l.012-.025.001-.006v-.003a.2.2 0 0 0-.039-.064.9.9 0 0 0-.27-.193C8.91 11.1 8.49 11 8 11s-.912.1-1.19.24a.9.9 0 0 0-.271.194.2.2 0 0 0-.039.063v.003l.001.006.012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 0 1-.5.5H4.605a1.5 1.5 0 0 1-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238zM4.605 3a.5.5 0 0 0-.498.55l.001.007.29 3.4A.5.5 0 0 1 3.9 7.5h-.782c-.696 0-1.182-.497-1.469-.872a.5.5 0 0 0-.118-.115l-.025-.012L1.5 6.5h-.003a.2.2 0 0 0-.064.039.9.9 0 0 0-.193.27C1.1 7.09 1 7.51 1 8s.1.912.24 1.19c.07.14.14.225.194.271a.2.2 0 0 0 .063.039H1.5l.006-.001.025-.012a.5.5 0 0 0 .118-.115c.287-.375.773-.872 1.469-.872H3.9a.5.5 0 0 1 .498.542l-.29 3.408a.5.5 0 0 0 .497.55h1.878c-.048-.166-.195-.352-.463-.557-.274-.21-.52-.528-.52-.943 0-.568.447-.947.862-1.154C6.807 10.123 7.387 10 8 10s1.193.123 1.638.346c.415.207.862.586.862 1.154 0 .415-.246.733-.52.943-.268.205-.415.39-.463.557h1.878a.5.5 0 0 0 .498-.55l-.001-.007-.29-3.4A.5.5 0 0 1 12.1 8.5h.782c.696 0 1.182.497 1.469.872.05.065.091.099.118.115l.025.012.006.001h.003a.2.2 0 0 0 .064-.039.9.9 0 0 0 .193-.27c.14-.28.24-.7.24-1.191s-.1-.912-.24-1.19a.9.9 0 0 0-.194-.271.2.2 0 0 0-.063-.039H14.5l-.006.001-.025.012a.5.5 0 0 0-.118.115c-.287.375-.773.872-1.469.872H12.1a.5.5 0 0 1-.498-.543l.29-3.407a.5.5 0 0 0-.497-.55H9.517c.048.166.195.352.463.557.274.21.52.528.52.943 0 .568-.447.947-.862 1.154C9.193 5.877 8.613 6 8 6s-1.193-.123-1.638-.346C5.947 5.447 5.5 5.068 5.5 4.5c0-.415.246-.733.52-.943.268-.205.415-.39.463-.557z" />
                                                                </svg>
                                                                {{ $item->kategori->nama }}
                                                            </p>
                                                            {{-- <p
                                                                class="text-gray-800 text-xs dark:text-gray-400 flex gap-1 mb-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-palette" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                                                    <path
                                                                        d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8m-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7" />
                                                                </svg>
                                                                {{ $item->warna }}
                                                            </p>
                                                            <p
                                                                class="text-gray-800 text-xs dark:text-gray-400 flex gap-1 mb-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-gear" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                                                    <path
                                                                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                                                                </svg>
                                                                {{ $item->jenis }}
                                                            </p> --}}
                                                            <div
                                                                class="min-w-0 p-1 bg-white border-gray-800 rounded-lg shadow-xs dark:bg-gray-800">
                                                                <table class="my-2">
                                                                    <tr
                                                                        class="text-gray-800 text-xs dark:text-gray-400 mb-1">
                                                                        <td class="text-semibold">
                                                                            Warna
                                                                        </td>
                                                                        <td>
                                                                            :
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->warna }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr
                                                                        class="text-gray-800 text-xs dark:text-gray-400 mb-1">
                                                                        <td class="text-semibold">
                                                                            Jenis
                                                                        </td>
                                                                        <td>
                                                                            :
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->jenis }}
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                            <div
                                                                class="min-w-0 p-1 bg-white border-gray-800 rounded-lg shadow-xs dark:bg-gray-800">
                                                                <table class="my-2">
                                                                    <tr
                                                                        class="text-gray-800 text-xs dark:text-gray-400 mb-1">
                                                                        <td class="text-semibold">
                                                                            Stok
                                                                        </td>
                                                                        <td>
                                                                            :
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->stok }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr
                                                                        class="text-gray-800 text-xs dark:text-gray-400 mb-1">
                                                                        <td class="text-semibold">
                                                                            Stok minimum
                                                                        </td>
                                                                        <td>
                                                                            :
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->stok_minimum }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr
                                                                        class="text-gray-800 text-xs dark:text-gray-400 mb-1">
                                                                        <td class="text-semibold">
                                                                            Satuan
                                                                        </td>
                                                                        <td>
                                                                            :
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->satuan }}
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                            <div
                                                                class="min-w-0 p-1 text-xs bg-white rounded-lg shadow-xs outline-gray-800 border-gray-800 dark:bg-gray-800">
                                                                <h4
                                                                    class="mb-2 font-semibold text-gray-800 dark:text-gray-300">
                                                                    Deskripsi
                                                                </h4>
                                                                <p class="text-gray-800 dark:text-gray-400">
                                                                    {{ $item->deskripsi }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form method="dialog" class="modal-backdrop">
                                                    <button>close</button>
                                                </form>
                                            </dialog>
                                            <a href="#"
                                                class="inline-flex w-full justify-center items-center px-3 py-2 text-xs xl:text-sm md:text-sm font-medium text-center text-white bg-purple-700 rounded-box hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                                Tambahkan
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>

</html>
