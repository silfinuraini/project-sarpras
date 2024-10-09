@extends('layouts.operator-main')

@section('content')
    <main class="h-full bg-gray-100 overflow-y-auto">
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

                        Barang keluar

                    </li>
                </ul>
            </div>

            <div class="flex mb-2 gap-2">
                {{-- Search bar --}}
                <label class="input input-bordered flex items-center gap-2 bg-white text-gray-700 w-full">
                    <input type="text" class="grow border-none input " placeholder="Cari.." />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>

                {{-- Filter data --}}
                <select class="select select-bordered max-w-xs bg-white text-gray-700">
                    <option disabled selected>Kategori</option>
                    <option>ATK</option>
                    <option>Alat kebersihan</option>
                </select>
                <select class="select select-bordered max-w-xs bg-white text-gray-700">
                    <option disabled selected>Order by</option>
                    <option>1 Tahun</option>
                    <option>Semester</option>
                    <option>Trimester</option>
                    <option>1 Bulan</option>
                </select>
                <input type="date" class="input input-bordered max-w-xs bg-white text-gray-700">
                <button
                    class=" btn flex items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" aria-hidden="true"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                    </svg>
                </button>
            </div>
            <!-- Table With Action -->
            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="w-full overflow-hidden rounded-lg shadow-xs mb-2">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs text-left font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Unit</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm font-semibold">
                                        BK001
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        RPL
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        18/05/2024
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">

                                            <button onclick="my_modal_2.showModal()"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true"
                                                    fill="currentColor"
                                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                </svg>
                                            </button>

                                        </div>
                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm font-semibold">
                                        BK002
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        Kesiswaan
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        18/02/2024
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm text">

                                            <button onclick="my_modal_2.showModal()"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true"
                                                    fill="currentColor"
                                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                </svg>
                                            </button>
                                            <dialog id="my_modal_2" class="modal">
                                                <div class="modal-box bg-white">
                                                    <label
                                                        class="input input-bordered flex items-center gap-2 bg-white text-gray-700">
                                                        <input type="text" class="grow border-none input"
                                                            placeholder="Search" />
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                            fill="currentColor" class="h-4 w-4 opacity-70">
                                                            <path fill-rule="evenodd"
                                                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </label>

                                                    <table class="w-full mt-2 whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">Kode</th>
                                                                <th class="px-4 py-3">Nama</th>
                                                                <th class="px-4 py-3">Satuan</th>
                                                                <th class="px-4 py-3">Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm font-semibold">
                                                                    AKT001
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    Kertas HVS
                                                                </td>
                                                                <td class="px-4 py-3 text-sm">
                                                                    Rim
                                                                </td>
                                                                <td class="px-4 py-3 text-sm">
                                                                    79
                                                                </td>
                                                            </tr>
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm font-semibold">
                                                                    AKB001
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    Sapu
                                                                </td>
                                                                <td class="px-4 py-3 text-sm">
                                                                    80
                                                                </td>
                                                                <td class="px-4 py-3 text-sm">
                                                                    Pcs
                                                                </td>
                                                            </tr>
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm font-semibold">
                                                                    ABG001
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    Cat tembok
                                                                </td>
                                                                <td class="px-4 py-3 text-sm">
                                                                    30
                                                                </td>
                                                                <td class="px-4 py-3 text-sm">
                                                                    Pcs
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div
                                                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700  sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
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
                                                                            <svg aria-hidden="true"
                                                                                class="w-4 h-4 fill-current"
                                                                                viewBox="0 0 20 20">
                                                                                <path
                                                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                                    clip-rule="evenodd"
                                                                                    fill-rule="evenodd">
                                                                                </path>
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
                                                                            <svg class="w-4 h-4 fill-current"
                                                                                aria-hidden="true" viewBox="0 0 20 20">
                                                                                <path
                                                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                                    clip-rule="evenodd"
                                                                                    fill-rule="evenodd">
                                                                                </path>
                                                                            </svg>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </span>
                                                    </div>
                                                </div>
                                                <form method="dialog" class="modal-backdrop">
                                                    <button>close</button>
                                                </form>
                                            </dialog>
                                            <dialog id="my_modal_3" class="modal">
                                                <div class="modal-box bg-white">
                                                    <h3 class="font-bold text-lg mb-4">Upload berita acara</h3>

                                                    <label class="text-sm font-semibold mb-2">Pemeriksaan</label>
                                                    <div class="flex items-center justify-center w-full">
                                                        <label for="dropzone-file"
                                                            class="flex flex-col items-center justify-center w-full h-55 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer  dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                </svg>
                                                                <p
                                                                    class="mb-2 text-sm text-gray-800 dark:text-gray-800 font-medium">
                                                                    <span class="font-semibold text-purple-600">Click
                                                                        to upload</span> or drag
                                                                    and drop
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    SVG, PNG, JPG or GIF
                                                                    (MAX. 800x400px)</p>
                                                            </div>
                                                            <input id="dropzone-file" type="file" class="hidden" />
                                                        </label>
                                                    </div>

                                                    <hr class="my-4">

                                                    <label class="text-sm font-semibold mb-2">Serah terima</label>
                                                    <div class="flex items-center justify-center w-full">
                                                        <label for="dropzone-file"
                                                            class="flex flex-col items-center justify-center w-full h-55 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer  dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                </svg>
                                                                <p
                                                                    class="mb-2 text-sm text-gray-800 dark:text-gray-800 font-medium">
                                                                    <span class="font-semibold text-purple-600">Click
                                                                        to upload</span> or drag
                                                                    and drop
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    SVG, PNG, JPG or GIF
                                                                    (MAX. 800x400px)</p>
                                                            </div>
                                                            <input id="dropzone-file" type="file" class="hidden" />
                                                        </label>
                                                    </div>

                                                    <div class="flex">
                                                        <button
                                                            class="mt-4 ml-auto btn flex items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                            <span>Import</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <form method="dialog" class="modal-backdrop">
                                                    <button>close</button>
                                                </form>
                                            </dialog>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm font-semibold">
                                        BK003
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        BK
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        31/03/2023
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">

                                            <button onclick="my_modal_2.showModal()"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm font-semibold">
                                        BK004
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        DKV
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        31/01/2023
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">

                                            <button onclick="my_modal_2.showModal()"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700  sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
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
                                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
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
                                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
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
        </div>
    </main>
@endsection
