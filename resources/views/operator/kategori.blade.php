@extends('layouts.operator-main')

@section('content')
    <main class="h-full my-6 bg-gray-100 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
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
                        Kategori
                    </li>
                </ul>
            </div>

            <!-- Input -->
            <!-- <div class="grid gap-6 md:grid-cols-2"> -->
            <div class="px-4 py-3 mb-6 bg-white text-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <h4 class="mb-4 font-semibold text-gray-800">
                        Nama
                    </h4>
                    <input type="text" placeholder="Ketik di sini" name="nama"
                        class="input input-bordered text-sm block text-gray-700 w-full mt-1 max-w-s bg-white" />
                    <div class="" style="margin-bottom: 1%;">
                        <div class="">
                            <button type="submit"
                                class="mt-4 ml-auto flex min-w-xs px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Tambahkan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- </div> -->

            <!-- With actions -->
            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>

                            @foreach ($kategori as $k)
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <tr class=" text-gray-700 dark:text-gray-400">
                                        <td class="font-semibold px-4 py-3 text-sm">
                                            Kode-{{ $k->id }}
                                        </td>
                                        <td class="font-semibold px-4 py-3 text-sm">
                                            {{ $k->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $k->created_at }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                                <button onclick="edit{{ $k->id }}.ShowModal()"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <dialog id="edit{{ $k->id }}" class="modal">
                                                    <div class="modal-box">
                                                        <h3 class="text-lg font-bold">Hello!</h3>
                                                        <p class="py-4">Press ESC key or click outside to close</p>
                                                    </div>
                                                    <form method="dialog" class="modal-backdrop">
                                                        <button>close</button>
                                                    </form>
                                                </dialog>
                                                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    {{ $kategori->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
