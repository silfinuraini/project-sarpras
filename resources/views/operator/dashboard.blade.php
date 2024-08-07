@extends('layouts.operator-main')

@section('content')

<main class="h-full bg-gray-100 overflow-y-auto">
    <div class="container px-6 mx-auto grid">

        <!-- Cards -->
        <div class="grid mt-4 gap-6 mb-6 grid-cols-2 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Pengguna
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        34
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Ruangan
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        42
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Pengajuan
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        68
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Permintaan
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        126
                    </p>
                </div>
            </div>
        </div>

        <!-- New Table -->


        <!-- Charts -->
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Barang Masuk dan Keluar
                </h4>
                <canvas id="bars" width="479" height="239"
                    style="display: block; width: 479px; height: 239px;"
                    class="chartjs-render-monitor"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Chart legend -->
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                        <span>Shoes</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Bags</span>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-hidden rounded-box shadow-xs">
                <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                    
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Pengajuan dan Permintaan
                </h4>
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Unit</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                    alt="" loading="lazy">
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">RPL</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    Ani Nuraeni, M.Kom
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Diterima
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        6/10/2020
                                    </td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                    alt="" loading="lazy">
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">DKV</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    Zimzim Al Amin Syahid, S.T
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Diterima
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        6/10/2020
                                    </td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;facepad=3&amp;fit=facearea&amp;s=707b9c33066bf8808c934c8ab394dff6"
                                                    alt="" loading="lazy">
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">BK</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    Ratih Pratiwi, S. Pd
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                            Diproses
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        6/10/2020
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <a href="prosespengajuan.html"
                            class=" btn mt-6 mb-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            style="width: 100%;">
                            Ke halaman
                        </a>
                        <!-- Open the modal using ID.showModal() method -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection