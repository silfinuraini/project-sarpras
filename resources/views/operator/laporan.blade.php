@extends('layouts.operator-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container my-4  px-6 mx-auto grid">

            {{-- Breadcrumb Section Start --}}
            <div class="text-sm mb-4 breadcrumbs">
                <ul class="text-gray-600">
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
                        Laporan
                    </li>
                </ul>
            </div>
            {{-- Breadcrumb Section End --}}


            <div class="flex gap-2">

                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button"
                        class="mb-1 btn flex border-none items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" aria-hidden="true"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                        </svg>
                        <span>Export</span>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li><a href="{{ route('laporan.excel') }}">Excel</a></li>
                        <li><a href="{{ route('laporan.pdf') }}">PDF</a></li>
                    </ul>
                </div>

                {{-- Filter Section Start --}}
                <div class="dropdown dropdown-end dropdown-hover ml-auto">
                    <div tabindex="0" role="button"
                        class="shadow-md btn border-gray-300 bg-white flex items-center justify-between px-4 py-2 text-sm font-medium  transition-colors duration-150 bg-transparent border rounded-lg active:bg-transparent hover:bg-transparent focus:outline-none focus:shadow-outline-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                        </svg>
                    </div>
                    <div tabindex="0"
                        class="dropdown-content card card-compact text-sm bg-white text-gray-600 z-[1] w-80 p-4 shadow">
                        <div class="card-body">
                            <h3 class="card-title text-lg font-semibold mb-4">Filter</h3>
                            <div class="space-y-4">
                                <form method="GET" action="{{ route('databarang') }}">
                                    <p class="mb-1 font-medium">Kategori</p>
                                    <select class="select bg-white select-bordered w-full" name="category_id" id="category"
                                        onchange="this.form.submit()">
                                        <option value="">Tampilkan semua</option>
                                        @foreach ($kategori as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                                                {{ $category->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
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
                {{-- Filter Section End --}}


            </div>

            <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-5">
                <div class="w-full overflow-hidden rounded-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap" id="search-table">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Barang</th>
                                    <th class="px-4 py-3 text-center">Masuk</th>
                                    <th class="px-4 py-3 text-center">Keluar</th>
                                    <th class="px-4 py-3 text-center">Stok</th>
                                    <th class="px-4 py-3 text-center">Satuan</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>



                            <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                @foreach ($data as $item)
                                    <tr class="text-gray-600 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ $item->kode }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="avatar">
                                                    <div class="mask mask-squircle h-12 w-12">
                                                        <img src={{ asset('storage/' . $item->gambar) }}
                                                            alt="Avatar Tailwind CSS Component" />
                                                    </div>
                                                </div>
                                                <div class="ml-2">
                                                    <p class="font-semibold flex gap-1">{{ $item->nama }}
                                                    </p>
                                                    <p class="text-xs text-gray-800 dark:text-gray-400">
                                                        {{ $item->kategori }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $item->total_barang_masuk }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $item->total_barang_keluar }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $item->stok }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $item->satuan }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('laporan.detail', $item->kode) }}"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true"
                                                    fill="currentColor"
                                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                </svg>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-4 my-2">
                        {{-- {{ $items->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
