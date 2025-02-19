@extends('layouts.operator-main')

@section('content')
    <main class="h-full my-4 overflow-y-auto">
        <div class="container my-4 grid px-6 mx-auto">

            {{-- Breadcrumbs Section Start --}}
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
            {{-- Breadcrumbs Section Start --}}

            {{-- Nota Dinas Section Start --}}
            <div class="min-w-0 p-4 bg-white border border-gray-300 shadow-md rounded-box shadow-xs dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Nota Dinas</h3>
                    <h4 class="mb-4 flex ml-auto font-sans text-sm text-gray-800 dark:text-gray-300">
                        {{ $permintaan->created_at }}
                    </h4>
                </div>
                <div class="grid mt-2 md:grid-cols-4">
                    <div class="mx-4">
                        <div class="min-w-0 my-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                Unit
                            </h4>
                            <p class="text-gray-800 text-sm dark:text-gray-400">
                                Nama unit pengaju
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 p-4 justify-center items-center">
                        <input type="text" placeholder="" value=": {{ $permintaan->pegawai->nama }}" readonly
                            class="input w-full flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">
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
                        <input type="text" placeholder="" value=": {{ $permintaan->sifat }}" name="sifat" readonly
                            class="input max-w-xs flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">
                    </div>
                    <div class="mx-4">
                        <div class="min-w-0 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-1 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                Perihal
                            </h4>
                            <p class="text-gray-800 text-sm dark:text-gray-400">
                                Alasan mengajukan barang-barang tersebut
                            </p>
                        </div>
                    </div>
                    <div class="col-span-3 px-4 justify-center items-center">
                        <textarea type="text" placeholder="" name="perihal" readonly
                            class="input min-h-20 max-h-20 textarea w-full flex focus:outline-none items-center text-sm bg-white text-gray-700 h-10">: {{ $permintaan->perihal }}
                        </textarea>
                    </div>
                </div>
            </div>
            {{-- Nota Dinas Section Start --}}


            {{-- Table Section Start --}}
            <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-5">
                <div class="w-full overflow-hidden rounded-lg mb-2">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap" id="itemsTable">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Barang</th>
                                    <th class="px-4 py-3 text-center">Jumlah</th>
                                    <th class="px-4 py-3 text-center">Disetujui</th>
                                    <th class="px-4 py-3 text-center">Satuan</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>

                            @foreach ($detailPermintaan as $dp)
                                @if ($dp->kode_permintaan == $permintaan->kode)
                                    <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                        <tr class="text-gray-600 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm font-semibold">
                                                {{ $dp->kode_item }}
                                            </td>

                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="avatar">
                                                        <div class="mask mask-squircle h-12 w-12">
                                                            <img src={{ asset('storage/' . $dp->item->gambar) }}
                                                                alt="Avatar Tailwind CSS Component" />
                                                        </div>
                                                    </div>
                                                    <div class="ml-2">
                                                        <p class="font-semibold flex gap-1">
                                                            {{ $dp->item->nama }}
                                                        </p>
                                                        <p class="text-xs text-gray-800 dark:text-gray-400">
                                                            {{ $dp->item->kategori->nama }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-3 text-xs text-center">
                                                {{ $dp->kuantiti }}
                                            </td>

                                            <td class="px-4 py-3 text-xs text-center">
                                                {{ $dp->kuantiti_disetujui }}
                                            </td>

                                            <td class="px-4 py-3 text-xs text-center">
                                                {{ $dp->item->satuan }}
                                            </td>
                                            <td class="px-4 py-3">
                                                @if (Auth::user()->role == 'pengawas')
                                                    <div class="flex justify-center items-center space-x-4 text-sm">
                                                        @if ($permintaan->status == 'menunggu' && $dp->kuantiti_disetujui == 0)
                                                            <form class="flex gap-3.5"
                                                                action="{{ route('operator.updatekuantitipermintaan', $dp->id) }}"
                                                                method="POST">
                                                                @csrf

                                                                @if ($dp->kuantiti == 1)
                                                                    <button value=1
                                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-xl active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                                        type="submit" name="kuantiti_disetujui">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-4 h-4" aria-hidden="true"
                                                                            fill="currentColor" viewBox="0 0 448 512">
                                                                            <path
                                                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                                        </svg>
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        onclick="document.getElementById('modal-{{ $dp->id }}').showModal()"
                                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-xl active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                                        aria-label="Like" type="button">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-4 h-4" aria-hidden="true"
                                                                            fill="currentColor" viewBox="0 0 448 512">
                                                                            <path
                                                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                                        </svg>
                                                                    </button>
                                                                    <dialog id="modal-{{ $dp->id }}" class="modal">
                                                                        <div class="modal-box bg-white text-gray-800"
                                                                            x-data="{
                                                                                kuantiti: {{ $dp->kuantiti > $dp->item->stok ? $dp->item->stok : $dp->kuantiti }},
                                                                                stok: {{ $dp->item->stok }},
                                                                                stokMinimum: {{ $dp->item->stok_minimum }}
                                                                            }">

                                                                            <h3 class="font-bold text-sm">Jumlah</h3>

                                                                            <!-- Stok -->
                                                                            <p
                                                                                class="text-xs mt-2 text-gray-800 dark:text-gray-400 flex gap-1">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="w-4 h-4" aria-hidden="true"
                                                                                    fill="currentColor"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                                                                                </svg>
                                                                                Stok: <span x-text="stok"></span>
                                                                            </p>

                                                                            <!-- Stok Minimum (Warna Berubah Real-Time) -->
                                                                            <p class="text-xs mt-2 flex gap-1"
                                                                                :class="kuantiti > (stok - stokMinimum) ?
                                                                                    'text-red-600' :
                                                                                    'text-gray-800 dark:text-gray-400'">
                                                                                <svg class="w-4 h-4"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    viewBox="0 0 16 16"
                                                                                    :class="kuantiti > (stok - stokMinimum) ?
                                                                                        'text-red-600' : 'text-gray-800'">
                                                                                    <path
                                                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                                    <path
                                                                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                                                                </svg>
                                                                                Stok Minimum: <span
                                                                                    x-text="stokMinimum"></span>
                                                                            </p>

                                                                            <!-- Input dan Button -->
                                                                            <div class="flex gap-2">
                                                                                <input type="number" x-model="kuantiti"
                                                                                    :max="stok" min="1"
                                                                                    name="kuantiti_disetujui"
                                                                                    class="input bg-white text-gray-800 mt-4 input-bordered w-full"
                                                                                    value="{{ $dp->kuantiti > $dp->item->stok ? $dp->item->stok : $dp->kuantiti }}" />
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

                                                                <button value="0" name="kuantiti_disetujui"
                                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-xl active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                                    aria-label="Like" type="submit">

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="w-4 h-4" aria-hidden="true"
                                                                        fill="currentColor"
                                                                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                        <path
                                                                            d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                @endif
                                            </td>

                                        </tr>

                                    </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="mx-4 my-2">
                    </div>
                </div>
            </div>
            {{-- Table Section End --}}

            @if (Auth::user()->role == 'pengawas')
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
            @endif

        </div>
    </main>
@endsection
