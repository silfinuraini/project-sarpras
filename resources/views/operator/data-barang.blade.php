@extends('layouts.operator-main')

@section('content')
    <main class="h-full bg-gray-100 my-4 overflow-y-auto">
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

                <a class="flex w-full items-center justify-between p-4 mb-2 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
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
                </a>
                <button onclick="my_modal_1.showModal()"
                    class="ml-auto btn flex items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
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
                                class="flex flex-col items-center justify-center w-full h-55 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
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
                                class="mt-4 ml-auto btn flex items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                <span>Import</span>
                            </button>
                        </div>

                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>

                <button
                    class=" btn flex items-center justify-between px-4 py-2 text-sm font-medium  text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" aria-hidden="true"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                    </svg>
                </button>
            </div>


            <div class="flex mb-2 gap-2">
                <label class="input w-full flex items-center gap-2 bg-white ">
                    <input type="text" class="grow border-none" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
                <select class="ml-auto select select-bordered max-w-xs bg-white text-gray-800 ">
                    <option disabled selected>Kategori </option>
                    <option>ATK</option>
                    <option>Alat kebersihan</option>
                </select>
            </div>
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
                                    <th class="px-4 py-3">Stok</th>
                                    <th class="px-4 py-3">Stok Minimum</th>
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
                                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $item->nama }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        Kategori {{ $item->kategori_id }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            {{ $item->stok }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $item->stok_minimum }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $item->satuan }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                                <button onclick="modalItem{{$item->kode}}.showModal()"
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

                                                <dialog id="modalItem{{$item->kode}}" class="modal">
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
                                                                                    Rp{{ $item->harga }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr class="border-none">
                                                                                <td class="col-span-3 font-semibold">
                                                                                    {{$item->deskripsi}}
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
