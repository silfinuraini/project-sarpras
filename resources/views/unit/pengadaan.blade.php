<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    {{-- <link rel="stylesheet" href="../src/css/output.css" /> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('src/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('src/js/charts-pie.js') }}" defer></script>
    @vite('resources/css/app.css')

</head>

<body>
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">

        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white border dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">

                    <!-- Search input -->
                    <div class="flex justify-center flex-1">
                        <div class="relative w-full max-w-xl focus-within:text-purple-500">
                            <label class="input input-bordered flex items-center gap-2">
                                <input type="text" class="grow" placeholder="Search" />
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="w-4 h-4 opacity-70">
                                    <path fill-rule="evenodd"
                                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Navbar -->
            <div class="navbar bg-base-100 border">
                <!-- Breadcrumbs -->
                <div class=" mx-4 text-sm breadcrumbs">
                    <ul>
                        <li><a href="kepala-unit-index.html" class="font-semibold text-purple-600">Home</a></li>
                        <li>Pengajuan</li>
                    </ul>
                </div>
            </div>
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <!-- With actions -->
                    <div class="grid mt-6 gap-6 mb-6 md:grid-cols-2 xl:grid-cols-4">
                        <div class="col-span-3">
                            <div class="items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800"
                                style="height:100%;">
                                <div class="flex">
                                    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                                        Nota Dinas
                                    </h4>
                                    <h4 class="mb-4 flex ml-auto font-sans text-gray-800 dark:text-gray-300">
                                        20/02/24
                                    </h4>
                                </div>

                                <div class="w-full overflow-x-auto">
                                    <table class="w-full whitespace-no-wrap text-sm">
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-1 font-semibold">
                                                    Dari
                                                </td>
                                                <td class="px-4 py-1">
                                                    :
                                                </td>
                                                <td class="px-4 py-1">
                                                    <input type="text" value="RPL" class="input input-ghost w-full" />
                                                </td>
                                            </tr>

                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-1 font-semibold">
                                                    Sifat
                                                </td>
                                                <td class="px-4 py-1">
                                                    :
                                                </td>
                                                <td class="px-4 py-1">
                                                    <input type="text" class="input input-ghost w-full" />
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-1 font-semibold">
                                                    Perihal
                                                </td>
                                                <td class="px-4 py-1">
                                                    :
                                                </td>
                                                <td class="px-4 py-1">
                                                    <input type="text" class="input input-ghost w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                                    Kategori
                                </h4>
                                <canvas id="pie"></canvas>
                                <div
                                    class="flex justify-center mt-4 mb-1 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                                    <!-- Chart legend -->
                                    <div class="flex items-center">
                                        <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                                        <span>ATK</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                                        <span>Kebersihan</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                                        <span>Alat bangunan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full overflow-hidden rounded-box shadow-xs">
                        <div class="">
                           
                            <div class="flex items-center mb-5 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800"
                                style="height:100%;">
                                <!-- content -->
                                <div class="w-full overflow-hidden rounded-box shadow-xs">
                                    <div class="w-full overflow-x-auto">
                                        <table class="w-full whitespace-no-wrap">
                                            <thead>
                                                <tr
                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                    <th class="px-4 py-3">Kode</th>
                                                    <th class="px-4 py-3">Barang</th>
                                                    <th class="px-4 py-3">Merk</th>
                                                    <th class="px-4 py-3">Jumlah</th>
                                                    <th class="px-4 py-3">Satuan</th>
                                                    <th class="px-4 py-3">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3 text-sm font-semibold">
                                                        ATK001
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <!-- Avatar with inset shadow -->
                                                            <div
                                                                class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                                <img class="object-cover w-full h-full rounded-full"
                                                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                                                                    alt="" loading="lazy" />
                                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                                    aria-hidden="true"></div>
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold">Kertas HVS</p>
                                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                    ATK
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">
                                                        Sinar Dunia
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        <!-- Input Number -->
                                                        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-box"
                                                            data-hs-input-number="">
                                                            <div class="flex items-center gap-x-1.5">
                                                                <button type="button"
                                                                    class="size-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                                                    data-hs-input-number-decrement="">
                                                                    <svg class="flex-shrink-0 size-3.5"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                    </svg>
                                                                </button>
                                                                <input
                                                                    class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0"
                                                                    type="text" value="0" data-hs-input-number-input="">
                                                                <button type="button"
                                                                    class="size-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                                                    data-hs-input-number-increment="">
                                                                    <svg class="flex-shrink-0 size-3.5"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                        <path d="M12 5v14"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- End Input Number -->
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">
                                                        Rim
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center space-x-4 text-sm">
                                                            <button
                                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-box dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                                aria-label="Delete">
                                                                <svg class="w-5 h-5" aria-hidden="true"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3 text-sm font-semibold">
                                                        AKB001
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <!-- Avatar with inset shadow -->
                                                            <div
                                                                class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                                <img class="object-cover w-full h-full rounded-full"
                                                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                                                                    alt="" loading="lazy" />
                                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                                    aria-hidden="true"></div>
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold">Sapu</p>
                                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                    Alat kebersihan
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">
                                                        Polytron
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        <!-- Input Number -->
                                                        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-box"
                                                            data-hs-input-number="">
                                                            <div class="flex items-center gap-x-1.5">
                                                                <button type="button"
                                                                    class="size-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                                                    data-hs-input-number-decrement="">
                                                                    <svg class="flex-shrink-0 size-3.5"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                    </svg>
                                                                </button>
                                                                <input
                                                                    class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0"
                                                                    type="text" value="0" data-hs-input-number-input="">
                                                                <button type="button"
                                                                    class="size-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                                                    data-hs-input-number-increment="">
                                                                    <svg class="flex-shrink-0 size-3.5"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14"></path>
                                                                        <path d="M12 5v14"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- End Input Number -->
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">
                                                        Pcs
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center space-x-4 text-sm">
                                                            <button
                                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-box dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                                aria-label="Delete">
                                                                <svg class="w-5 h-5" aria-hidden="true"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div
                                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
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
                                                            <svg class="w-4 h-4 fill-current" aria-hidden="true"
                                                                viewBox="0 0 20 20">
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
                                                            <svg class="w-4 h-4 fill-current" aria-hidden="true"
                                                                viewBox="0 0 20 20">
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

                            <div class="col-span-3">
                                <button
                                    class="px-4 py-2 text-sm w-full font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>


    </div>
</body>

</html>