@extends('layouts.operator-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 my-6 mx-auto grid">
            <div class="text-sm breadcrumbs text-gray-700">
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
                        <a href="kelola-akun.html">
                            Kelola akun
                        </a>
                    </li>
                    <li>
                        <a href="tambah-akun.html">
                            Pegawai
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Charts -->
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 mt-6 mb-2 md:grid-cols-4">
                    <div class="w-full p-4 bg-white rounded-box shadow-xs dark:bg-gray-800 justify-center items-center">
                        <h3 class="mb-4 font-semibold text-gray-800 dark:text-gray-300" style="text-align: center;">
                            Masukkan foto
                        </h3>
                        <div class="avatar my-2 mx-10">
                            <div class="w-full rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                            </div>
                        </div>
                        <button
                            class=" mt-2 px-4 py-2 text-sm font-medium leading-5 text-purple-600 hover:text-white active:text-white transition-colors duration-150 bg-transparent border border-purple-600 rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            style="width: 100%;">
                            Pilih foto
                        </button>
                    </div>
                    <div class="col-span-3 min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                        <h3 class="mb-8 font-semibold text-gray-800 dark:text-gray-300">
                            Masukkan data akun
                        </h3>
                        <label
                            class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                            <p style="color: #965ab3;" class="my-2">#</p>
                            <input type="text" name="nip" id="nip-pegawai" class=" input border-none text-sm"
                                placeholder="NIP" />
                        </label>
                        <label
                            class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                            <input type="text" name="nama" id="nama-pegawai" class=" input border-none text-sm"
                                placeholder="Nama" />
                        </label>
                        <label
                            class="input input-bordered flex focus:outline-none items-center mb-2 bg-white text-gray-700 border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70" style="fill: #430A5D;"
                                viewBox="0 0 16 16">
                                <path
                                    d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                                <path
                                    d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                            </svg>
                            <input type="text" name="email" id="email-pegawai" class=" input border-none text-sm"
                                placeholder="Email " />
                        </label>
                    </div>
                </div>
                <button type="submit"
                    class=" my-2 px-4 py-2 w-full text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Buat
                </button>
            </form>

            <!-- With actions -->
            <div class="flex mt-2 items-center p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">NIP</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($pegawais as $peg)
                                    <tr class=" text-gray-700 dark:text-gray-400">
                                        <td class="font-semibold px-4 py-3 text-sm">
                                            {{ $peg->nip }}
                                        </td>
                                        <td class="font-semibold px-4 py-3 text-sm">
                                            {{ $peg->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $peg->email }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center  text-sm">
                                                <button
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit"
                                                    onclick="addDataToForm('{{ $peg->nip }}', '{{ $peg->nama }}', '{{ $peg->email }}')">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>

                                                <button type="submit"
                                                    onclick="event.preventDefault(); document.getElementById('formHapus').submit();"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- @endforeach --}}
                        </table>
                    </div>
                    {{-- {{ $plier->links() }} --}}
                </div>
            </div>
        </div>
    </main>
@endsection

@if (!empty($peg))
    <form  id="formHapus" action="{{ route('pegawai.destroy', $peg->nip) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endif

<script>
    function addDataToForm(nip, nama, email) {
        document.getElementById('nip-pegawai').value = nip
        document.getElementById('nama-pegawai').value = nama
        document.getElementById('email-pegawai').value = email
    }
</script>
