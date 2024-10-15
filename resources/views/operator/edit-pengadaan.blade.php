@extends('layouts.operator-main')

@section('content')
    <main class="h-full my-4 bg-gray-100 overflow-y-auto">
        <div class="container my-4 grid px-6 mx-auto">

            <div class="text-sm mb-4 breadcrumbs text-gray-800">
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
                        <a href="prosespengajuan.html"></a>
                        Riwayat
                    </li>
                    <li>
                        <a href="detail-pengajuan.html"></a>
                        Detail riwayat
                    </li>
                </ul>
            </div>
            <!-- With actions -->
            <div class="mb-6">
                <div class="col-span-3">
                    <div class="items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800" style="height:100%;">
                        <div class="flex mx-4">
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
                                        <td class="px-4 py-4 font-semibold">
                                            Dari
                                        </td>
                                        <td class="px-4 py-4">
                                            :
                                        </td>
                                        <td class="px-4 py-4 font-semi">
                                            {{ $pengadaan->pegawai->nama }}
                                        </td>
                                    </tr>

                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-4 font-semibold">
                                            Sifat
                                        </td>
                                        <td class="px-4 py-4">
                                            :
                                        </td>
                                        <td class="px-4 py-4 ">
                                            {{ $pengadaan->sifat }}
                                        </td>
                                    </tr>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-4 font-semibold">
                                            Perihal
                                        </td>
                                        <td class="px-4 py-4">
                                            :
                                        </td>
                                        <td class="px-4 py-4">
                                            {{ $pengadaan->perihal }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="w-full overflow-hidden rounded-box shadow-xs mb-2">
                    <div class="w-full overflow-x-auto">
                        <div class="flex justify-between mx-4">
                            {{-- <h4 class="mb-2  font-semibold text-gray-800 dark:text-gray-300">
                                    Daftar Barang
                                </h4> --}}
                            {{-- <button
                                    class="btn px-4 mb-2 py-2 text-sm w-full font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Setujui semua
                                </button> --}}
                        </div>
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3 text-center">Kode</th>
                                    <th class="px-4 py-3">Barang</th>
                                    <th class="px-4 py-3 text-center">Jumlah</th>
                                    <th class="px-4 py-3 text-center">Satuan</th>
                                </tr>
                            </thead>
                            @foreach ($detailPengadaan as $dp)
                                @if ($dp->kode_pengadaan == $pengadaan->kode)
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-center text-sm font-semibold">
                                                {{ $dp->kode_item }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div
                                                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block justify-center">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;facepad=3&amp;fit=facearea&amp;s=707b9c33066bf8808c934c8ab394dff6"
                                                            alt="" loading="lazy">
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $dp->item->nama }}</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            ATK
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 align-middle text-sm">
                                                <div class="flex justify-center items-center">
                                                  <div class="h-9 bg-white border border-gray-200 rounded-xl flex items-center w-32">
                                                    <!-- Decrement Button -->
                                                    <button type="button"
                                                      class="w-10 h-full flex justify-center items-center text-sm font-medium rounded-l-xl border-r border-gray-200 bg-white text-gray-800 hover:bg-gray-50 decrement-btn">
                                                      <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                      </svg>
                                                    </button>
                                              
                                                    <!-- Quantity Input Field -->
                                                    <input class="p-0 w-12 bg-transparent border-0 text-gray-800 text-center focus:ring-0" type="text"
                                                      name="kuantiti" value="199" />
                                              
                                                    <!-- Increment Button -->
                                                    <button type="button"
                                                      class="w-10 h-full flex justify-center items-center text-sm font-medium rounded-r-xl border-l border-gray-200 bg-white text-gray-800 hover:bg-gray-50 increment-btn">
                                                      <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                      </svg>
                                                    </button>
                                                  </div>
                                                </div>
                                              </td>
                                            <td class="px-4 py-3 text-center text-sm">
                                                {{ $dp->item->satuan }}
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif
                            @endforeach
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
                                            aria-label="Previous" fdprocessedid="wfzp7h">
                                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                <path
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                                            fdprocessedid="iesul">
                                            1
                                        </button>
                                    </li>
                                    <li>
                                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                                            fdprocessedid="ykm94d">
                                            2
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                                            fdprocessedid="5hbe45">
                                            3
                                        </button>
                                    </li>
                                    <li>
                                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                                            fdprocessedid="vylbas">
                                            4
                                        </button>
                                    </li>
                                    <li>
                                        <span class="px-3 py-1">...</span>
                                    </li>
                                    <li>
                                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                                            fdprocessedid="oi8bqr">
                                            8
                                        </button>
                                    </li>
                                    <li>
                                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                                            fdprocessedid="82a7su">
                                            9
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Next" fdprocessedid="uvgrh">
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

            <button
                class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                fdprocessedid="46ycoc" name="status" value="disetujui" type="submit">
                Setujui
            </button>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all decrement buttons
            const decrementButtons = document.querySelectorAll('.decrement-btn');
            // Select all increment buttons
            const incrementButtons = document.querySelectorAll('.increment-btn');
    
            // Decrement event
            decrementButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Find the input field next to this button
                    const inputField = this.nextElementSibling;
                    // Get the current value of the input field
                    let currentValue = parseInt(inputField.value);
    
                    // Decrease the value by 1 if greater than 1
                    if (currentValue > 1) {
                        inputField.value = currentValue - 1;
                    }
                });
            });
    
            // Increment event
            incrementButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Find the input field before this button
                    const inputField = this.previousElementSibling;
                    // Get the current value of the input field
                    let currentValue = parseInt(inputField.value);
    
                    // Increase the value by 1
                    inputField.value = currentValue + 1;
                });
            });
        });
    </script>
@endsection
