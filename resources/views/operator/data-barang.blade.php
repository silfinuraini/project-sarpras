@extends('layouts.operator-main')

@section('content')
    <main class="h-full bg-gray-50 my-4 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="text-sm mb-4 breadcrumbs">
                <ul class="text-gray-700">
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
                        Data barang
                    </li>
                </ul>
            </div>
            <!-- CTA -->
            <div class="flex gap-2">

                {{-- <a class="flex w-full items-center justify-between p-4 mb-2 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                    href="tambah-barang">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span>Tambah barang</span>
                    </div>
                    <span> &RightArrow;</span>
                </a> --}}
                <label class="input w-full flex items-center gap-2 bg-white ">
                    <input type="text" class="grow border-none" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
                <div class="dropdown dropdown-end dropdown-hover">
                    <div tabindex="0" role="button"
                        class="btn border-purple-700 bg-white flex items-center justify-between px-4 py-2 text-sm font-medium text-purple-700 transition-colors duration-150 bg-transparent border rounded-lg active:bg-transparent hover:bg-transparent focus:outline-none focus:shadow-outline-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                        </svg>
                    </div>
                    <div tabindex="0"
                        class="dropdown-content card card-compact text-sm bg-white text-gray-700 z-[1] w-80 p-4 shadow">
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
                <a href="tambah-barang"
                    class=" btn flex border-none items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 -ml-1" fill="currentColor"
                        aria-hidden="true" viewBox="0 0 16 16">
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                    </svg>
                    <span>Tambah barang</span>
                </a>
                <button onclick="my_modal_1.showModal()"
                    class=" btn flex border-none items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 -ml-1" fill="currentColor"
                        aria-hidden="true"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M128 64c0-35.3 28.7-64 64-64H352V128c0 17.7 14.3 32 32 32H512V448c0 35.3-28.7 64-64 64H192c-35.3 0-64-28.7-64-64V336H302.1l-39 39c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l39 39H128V64zm0 224v48H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H128zM512 128H384V0L512 128z" />
                    </svg>
                    <span>Import</span>
                </button>

                <!-- Open the modal using ID.showModal() method -->
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg mb-4">Import data</h3>

                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-55 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-800 dark:hover:border-gray-500 dark:hover:bg-gray-800">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-800 dark:text-gray-800 font-medium"><span
                                            class="font-semibold text-purple-600">Click to upload</span> or drag
                                        and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                        (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" />
                            </label>
                        </div>

                        <div class="divider text-sm">Belum punya format?</div>

                        <a class="flex justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 transition-colors duration-150 bg-transparent border border-purple-600 rounded-lg active:bg-purple-600 active:text-white hover:text-white hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            aria-label="Like" href="edit-akun.html">

                            Unduh format
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 384 512"
                                class="svg-inline--fa fa-arrow-down-to-line fa-fw fa-lg">
                                <path fill="currentColor"
                                    d="M32 480c-17.7 0-32-14.3-32-32s14.3-32 32-32l320 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 480zM214.6 342.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 242.7 160 64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 178.7 73.4-73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-128 128z"
                                    class=""></path>
                            </svg>

                        </a>

                        <div class="flex">
                            <button
                                class="mt-4  btn flex border-none items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                <span>Import</span>
                            </button>
                        </div>

                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>

                <button
                    class=" btn flex border-none items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" aria-hidden="true"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                    </svg>
                </button>
            </div>


            {{-- <div class="flex mb-2 gap-2">
                <label class="input w-full flex items-center gap-2 bg-white ">
                    <input type="text" class="grow border-none" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
                <div class="dropdown dropdown-end dropdown-hover">
                    <div tabindex="0" role="button"
                        class="btn m-1 flex items-center justify-between px-4 py-2 text-sm font-medium text-purple-700 transition-colors duration-150 bg-transparent border border-gray-300 rounded-lg active:bg-transparent hover:bg-transparent focus:outline-none focus:shadow-outline-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                        </svg>
                    </div>
                    <div tabindex="0"
                        class="dropdown-content card card-compact text-sm bg-white text-gray-700 z-[1] w-80 p-4 shadow">
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
            </div> --}}
            <!-- Table With Action -->
            <div class="flex items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="w-full overflow-hidden rounded-lg shadow-xs mb-2">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Barang</th>
                                    <th class="px-4 py-3">Merk</th>
                                    <th class="px-4 py-3">Stok</th>
                                    <th class="px-4 py-3">Satuan</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>

                            @foreach ($items as $item)
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ $item->kode }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src={{ asset('storage/' . $item->gambar) }}
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $item->nama }}</p>
                                                    <p class="text-xs text-gray-800 dark:text-gray-400">
                                                        {{ $item->kategori->nama }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            {{ $item->merk }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            {{ $item->stok }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            {{ $item->satuan }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                                <button onclick="modalItem{{ $item->kode }}.showModal()"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                                    </svg>
                                                </button>

                                                <a href="{{ route('item.edit', $item->kode) }}"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <!-- Open the modal using ID.showModal() method -->

                                                <dialog id="modalItem{{ $item->kode }}" class="modal">
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
                                                                <div class="flex mb-4  gap-1 items-center">
                                                                    <h4
                                                                        class="font-bold text-lg text-gray-800 dark:text-gray-300">
                                                                        {{ strtoupper($item->nama) }}
                                                                    </h4>
                                                                    <h2
                                                                        class="font-bold text-lg text-gray-800 dark:text-gray-300">
                                                                        {{ strtoupper($item->merk) }}
                                                                    </h2>
                                                                    <div
                                                                        class="badge bg-purple-700 text-white border-none text-xs">
                                                                        {{ $item->kode }}</div>
                                                                </div>
                                                                <div class="grid grid-cols-2">
                                                                    <div>
                                                                        <p
                                                                            class="text-gray-800 text-xs dark:text-gray-400 flex gap-1 mb-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor" class="bi bi-tag"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0" />
                                                                                <path
                                                                                    d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z" />
                                                                            </svg>
                                                                            Rp{{ number_format($item->harga, 0, ',', '.') }},00
                                                                        </p>
                                                                    </div>
                                                                    <div>
                                                                        <p
                                                                            class="text-gray-800 text-xs dark:text-gray-400 flex gap-1 mb-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor" class="bi bi-puzzle"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M3.112 3.645A1.5 1.5 0 0 1 4.605 2H7a.5.5 0 0 1 .5.5v.382c0 .696-.497 1.182-.872 1.469a.5.5 0 0 0-.115.118l-.012.025L6.5 4.5v.003l.003.01q.005.015.036.053a.9.9 0 0 0 .27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.9.9 0 0 0 .271-.194.2.2 0 0 0 .039-.063v-.009l-.012-.025a.5.5 0 0 0-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 0 1 9 2h2.395a1.5 1.5 0 0 1 1.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0 1 11.395 14H9a.5.5 0 0 1-.5-.5v-.382c0-.696.497-1.182.872-1.469a.5.5 0 0 0 .115-.118l.012-.025.001-.006v-.003a.2.2 0 0 0-.039-.064.9.9 0 0 0-.27-.193C8.91 11.1 8.49 11 8 11s-.912.1-1.19.24a.9.9 0 0 0-.271.194.2.2 0 0 0-.039.063v.003l.001.006.012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 0 1-.5.5H4.605a1.5 1.5 0 0 1-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238zM4.605 3a.5.5 0 0 0-.498.55l.001.007.29 3.4A.5.5 0 0 1 3.9 7.5h-.782c-.696 0-1.182-.497-1.469-.872a.5.5 0 0 0-.118-.115l-.025-.012L1.5 6.5h-.003a.2.2 0 0 0-.064.039.9.9 0 0 0-.193.27C1.1 7.09 1 7.51 1 8s.1.912.24 1.19c.07.14.14.225.194.271a.2.2 0 0 0 .063.039H1.5l.006-.001.025-.012a.5.5 0 0 0 .118-.115c.287-.375.773-.872 1.469-.872H3.9a.5.5 0 0 1 .498.542l-.29 3.408a.5.5 0 0 0 .497.55h1.878c-.048-.166-.195-.352-.463-.557-.274-.21-.52-.528-.52-.943 0-.568.447-.947.862-1.154C6.807 10.123 7.387 10 8 10s1.193.123 1.638.346c.415.207.862.586.862 1.154 0 .415-.246.733-.52.943-.268.205-.415.39-.463.557h1.878a.5.5 0 0 0 .498-.55l-.001-.007-.29-3.4A.5.5 0 0 1 12.1 8.5h.782c.696 0 1.182.497 1.469.872.05.065.091.099.118.115l.025.012.006.001h.003a.2.2 0 0 0 .064-.039.9.9 0 0 0 .193-.27c.14-.28.24-.7.24-1.191s-.1-.912-.24-1.19a.9.9 0 0 0-.194-.271.2.2 0 0 0-.063-.039H14.5l-.006.001-.025.012a.5.5 0 0 0-.118.115c-.287.375-.773.872-1.469.872H12.1a.5.5 0 0 1-.498-.543l.29-3.407a.5.5 0 0 0-.497-.55H9.517c.048.166.195.352.463.557.274.21.52.528.52.943 0 .568-.447.947-.862 1.154C9.193 5.877 8.613 6 8 6s-1.193-.123-1.638-.346C5.947 5.447 5.5 5.068 5.5 4.5c0-.415.246-.733.52-.943.268-.205.415-.39.463-.557z" />
                                                                            </svg>
                                                                            {{ $item->kategori->nama }}
                                                                        </p>
                                                                    </div>
                                                                    <div>
                                                                        <p
                                                                            class="text-gray-800 text-xs dark:text-gray-400 flex gap-1 mb-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor" class="bi bi-palette"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                                                                <path
                                                                                    d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8m-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7" />
                                                                            </svg>
                                                                            {{ $item->warna }}
                                                                        </p>
                                                                    </div>
                                                                    <p
                                                                        class="text-gray-800 text-xs dark:text-gray-400 flex gap-1 mb-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor" class="bi bi-gear"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                                                            <path
                                                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                                                                        </svg>
                                                                        {{ $item->jenis }}
                                                                    </p>
                                                                </div>


                                                                <div
                                                                    class="min-w-0 p-1 my-2 bg-white border-gray-800 rounded-lg shadow-xs dark:bg-gray-800">
                                                                    <table class="my-2">
                                                                        {{-- <tr
                                                                            class="text-gray-800 text-xs dark:text-gray-400 mb-1">
                                                                            <td class="text-semibold">
                                                                                Merk
                                                                            </td>
                                                                            <td>
                                                                                :
                                                                            </td>
                                                                            <td>
                                                                                {{ $item->merk }}
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
                                                                        </tr> --}}
                                                                        <tr
                                                                            class="text-gray-800 text-xs mt-1 dark:text-gray-400 mb-1">
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
                                                <dialog id="" class="modal">
                                                    <div class="modal-box w-11/12 max-w-5xl rounded-box bg-white">
                                                        <div class="grid grid-cols-1 gap-1 md:grid-cols-2 lg:grid-cols-2">
                                                            <figure class="px-10 p-4">
                                                                <div class="carousel w-full">
                                                                    <div id="item1" class="carousel-item w-full">
                                                                        <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/5/1/edcb8105-c50c-4b3f-a8eb-477005e300bb.png"
                                                                            class="w-full" />
                                                                    </div>
                                                                    <div id="item3" class="carousel-item w-full">
                                                                        <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2022/4/22/7ab00b89-133d-4c05-b5f8-1f1ac075924e.jpg"
                                                                            class="w-full" />
                                                                    </div>
                                                                </div>
                                                            </figure>

                                                            <div class="card-body">
                                                                <h2 class="card-title font-bold">
                                                                    {{ $item->nama }}
                                                                    <div class="badge badge-primary badge-outline">ATK
                                                                    </div>
                                                                </h2>
                                                                <div class="overflow-x-auto">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <!-- row 1 -->
                                                                            <tr class="border-none">
                                                                                <td
                                                                                    class="col-span-3 font-extrabold text-lg">
                                                                                    Rp{{ number_format($item->harga, 0, ',', '.') }},00
                                                                                </td>
                                                                            </tr>

                                                                            <tr class="border-none">
                                                                                <td class="col-span-3 font-semibold">
                                                                                    {{ $item->deskripsi }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr class="border-none">
                                                                                <th>Kode barang</th>
                                                                                <td>:</td>
                                                                                <td>{{ $item->kode }}</td>
                                                                            </tr>

                                                                            <tr class="border-none">
                                                                                <th>Merk</th>
                                                                                <td>:</td>
                                                                                <td>{{ $item->merk }}</td>
                                                                            </tr>
                                                                            <tr class="border-none">
                                                                                <th>Stok</th>
                                                                                <td>:</td>
                                                                                <td>{{ $item->stok }}</td>
                                                                            </tr>
                                                                            <tr class="border-none">
                                                                                <th>Satuan</th>
                                                                                <td>:</td>
                                                                                <td>{{ $item->satuan }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- <p class="font-semibold">Kode barang: </p>
                                                                                                                                        <p class="font-semibold">Merk       : </p>
                                                                                                                                        <p class="font-semibold">Stok       : </p>
                                                                                                                                        <p class="font-semibold">Satuan     : </p>
                                                                                                                                        <p class="font-semibold">Harga      : </p>
                                                                                                                                        <p class="font-semibold">Deskripsi  : </p> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="dialog" class="modal-backdrop">
                                                        <button>close</button>
                                                    </form>
                                                </dialog>

                                                <form action="{{ route('item.destroy', $item->kode) }}" method="POST">
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
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
