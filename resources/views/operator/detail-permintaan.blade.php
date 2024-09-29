@extends('layouts.operator-main')

@section('content')
    <main class="h-full my-4 bg-gray-50 overflow-y-auto">
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
                                            {{ $permintaan->pegawai->nama }}
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
                                            {{ $permintaan->sifat }}
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
                                            {{ $permintaan->perihal }}
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
                                    <th class="px-4 py-3 text-center">Disetujui</th>
                                    <th class="px-4 py-3 text-center">Satuan</th>
                                    @if ($permintaan->status == 'menunggu')
                                        <th class="px-4 py-3 text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            @foreach ($detailPermintaan as $dp)
                                @if ($dp->kode_permintaan == $permintaan->kode)
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
                                            <td class="px-4 py-3 text-center text-xs">
                                                {{ $dp->kuantiti }}
                                            </td>

                                            <td class="px-4 py-3 text-center text-xs">
                                                {{ $dp->kuantiti_disetujui }}
                                            </td>
                                            <td class="px-4 py-3 text-center text-sm">
                                                {{ $dp->item->satuan }}
                                            </td>

                                            <td class="px-4 py-3">
                                                <div class="flex justify-center items-center space-x-4 text-sm">
                                                    @if ($permintaan->status == 'menunggu')
                                                        <!-- Modal -->
                                                        <form class="flex gap-3.5"
                                                            action="{{ route('operator.updatekuantitipermintaan', $dp->id) }}"
                                                            method="POST">
                                                            @csrf

                                                            @if ($dp->kuantiti == 1)
                                                                <button value=1
                                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-xl active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                                    type="submit" name="kuantiti_disetujui">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                                        aria-hidden="true" fill="currentColor"
                                                                        viewBox="0 0 448 512">
                                                                        <path
                                                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                                    </svg>
                                                                </button>
                                                            @else
                                                                <button
                                                                    onclick="document.getElementById('modal-{{ $dp->id }}').showModal()"
                                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-xl active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                                    aria-label="Like" type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                                        aria-hidden="true" fill="currentColor"
                                                                        viewBox="0 0 448 512">
                                                                        <path
                                                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                                    </svg>
                                                                </button>
                                                                <dialog id="modal-{{ $dp->id }}" class="modal">
                                                                    <div class="modal-box bg-white text-gray-800">
                                                                        <h3 class="font-bold text-sm">Jumlah</h3>
                                                                        <p
                                                                            class="text-xs mt-2 text-gray-800 dark:text-gray-400 flex gap-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="w-4 h-4" aria-hidden="true"
                                                                                fill="currentColor" viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                                                                            </svg>
                                                                            Stok: {{ $dp->item->stok }}
                                                                        </p>
                                                                        <div class="flex gap-2">
                                                                            <input type="number"
                                                                                value="{{ $dp->kuantiti }}"
                                                                                max="{{ $dp->kuantiti }}" min=1
                                                                                name="kuantiti_disetujui"
                                                                                class="input bg-white text-gray-800 mt-4 input-bordered w-full" />
                                                                            <button type="submit"
                                                                                class="btn px-5 mt-4 border-none py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-xl active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                                                Acc
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <form method="dialog" class="modal-backdrop">
                                                                        <button>close</button>
                                                                    </form>
                                                                </dialog>
                                                            @endif

                                                            <button value=0 name="kuantiti_disetujui"
                                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-xl active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                                aria-label="Like" type="button">

                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                                    aria-hidden="true" fill="currentColor"
                                                                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path
                                                                        d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
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

            @if ($permintaan->status == 'menunggu')
                <form action="{{ route('operator.updatepermintaan', $permintaan->kode) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-2">
                        <button
                            class="px-4 py-2 mt-6 text-sm font-medium leading-5transition-colors duration-150 bg-white border text-purple-600 border-purple-600 rounded-box active:bg-purple-600 active:text-white hover:text-white hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            fdprocessedid="46ycoc" name="status" value="ditolak" type="submit">
                            Tolak
                        </button>
                        <button
                            class="px-4 py-2 mt-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            fdprocessedid="46ycoc" name="status" value="disetujui" type="submit">
                            Setujui
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </main>
@endsection
