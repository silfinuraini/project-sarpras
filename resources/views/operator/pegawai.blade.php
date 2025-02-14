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

            {{-- Form Section Start --}}
            <form id="pegawaiForm"  action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="_method" value="POST" id="methodField">

                <div class="grid gap-4 mt-6 md:grid-cols-4">

                    <div
                        class="flex flex-col items-center justify-center px-4 py-3 bg-white text-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800">

                        <div
                            class="relative w-48 h-48 border-2 border-dashed border-gray-300 rounded-full flex items-center justify-center text-gray-400 hover:border-purple-700 hover:text-purple-700 transition-colors duration-300 overflow-hidden">
                            <input type="file" name="avatar" accept="image/*"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="fileInput" />
                            <div id="placeholder" class="flex flex-col items-center justify-center w-full h-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm font-semibold">Foto Utama</span>
                            </div>
                            <img id="preview" class="absolute inset-0 w-full h-full object-cover hidden"
                                alt="Uploaded image preview" />
                        </div>

                        <script>
                            document.getElementById('fileInput').addEventListener('change', function(e) {
                                const parentDiv = this.parentElement;
                                const placeholder = document.getElementById('placeholder');
                                const preview = document.getElementById('preview');

                                if (this.files && this.files[0]) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        preview.src = e.target.result;
                                        preview.classList.remove('hidden');
                                        placeholder.classList.add('hidden');
                                        parentDiv.classList.remove('border-gray-300', 'text-gray-400');
                                        parentDiv.classList.add('border-purple-700');
                                    }

                                    reader.readAsDataURL(this.files[0]);
                                } else {
                                    preview.src = '';
                                    preview.classList.add('hidden');
                                    placeholder.classList.remove('hidden');
                                    parentDiv.classList.remove('border-purple-700');
                                    parentDiv.classList.add('border-gray-300', 'text-gray-400');
                                }
                            });
                        </script>
                    </div>

                    <div
                        class="col-span-3 px-4 py-3 bg-white text-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800">
                        <h4 class="mb-4 font-semibold text-gray-800">
                            Pegawai
                        </h4>
                        <div class="flex gap-2">
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">Nama Pegawai</span>
                                </div>
                                <input name="nama" id="nama" type="text" placeholder="Masukkan nama pegawai"
                                    class="input input-bordered text-sm text-gray-700 w-full" />
                            </label>
                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text">NIP</span>
                                </div>
                                <input name="nip" id="nip" type="text" placeholder="Ex. 1990081720200410"
                                    class="input input-bordered text-sm text-gray-700 w-full max-w-xs" />
                            </label>
                        </div>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Email</span>
                            </div>
                            <input name="email" id="email" type="text" placeholder="admin@localhost"
                                class="input input-bordered text-sm text-gray-700 w-full" />
                        </label>
                        <div class="">
                            <button type="submit" id="submitButton"
                                class="mt-4 ml-auto flex min-w-xs px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Tambahkan
                            </button>
                        </div>
                    </div>

                </div>
            </form>

            <script>
                function fillForm(row) {
                    // Ambil data dari atribut data-
                    let nip = row.getAttribute("data-nip");
                    let nama = row.getAttribute("data-nama");
                    let email = row.getAttribute("data-email");

                    // Isi form dengan data dari tabel
                    document.getElementById("nip").value = nip;
                    document.getElementById("nama").value = nama;
                    document.getElementById("email").value = email;

                    // Ubah form menjadi mode edit
                    document.getElementById("pegawaiForm").action = `/operator/pegawai/${nip}`;
                    document.getElementById("methodField").value = "PUT";
                    document.getElementById("submitButton").textContent = "Update";
                }

                function resetForm() {
                    // Reset form ke mode tambah
                    document.getElementById("pegawaiForm").action = "{{ route('pegawai.store') }}";
                    document.getElementById("methodField").value = "POST";
                    document.getElementById("nip").value = "";
                    document.getElementById("nama").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("submitButton").textContent = "Tambahkan";
                }
            </script>
            {{-- Form Section End --}}

            <h4 class="font-semibold text-gray-800 mt-4">
                Daftar Kategori
            </h4>

            {{-- Table Section Start --}}
            <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-2">
                <div class="w-full overflow-hidden rounded-lg mb-2">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap" id="itemsTable">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3 text-center">Alias</th>
                                    <th class="px-4 py-3 text-center">Tanggal</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>

                            @foreach ($pegawais as $p)
                                <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                    <tr class="text-gray-600 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ $p->nip }}
                                        </td>

                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $p->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $p->email }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center space-x-4 text-sm">

                                                <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit" data-nip="{{ $p->nip }}"
                                                    data-nama="{{ $p->nama }}" data-email="{{ $p->email }}"
                                                    onclick="fillForm(this)">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <button type="button"
                                                    onclick="deleteConfirmation{{ $p->nip }}.showModal()"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>

                                                <dialog id="deleteConfirmation{{ $p->nip }}" class="modal">
                                                    <div class="modal-box">
                                                        <div class="flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                class="text-purple-700" height="50" viewBox="0 0 24 24">
                                                                <rect width="24" height="24" fill="none" />
                                                                <path fill="currentColor"
                                                                    d="M2.725 21q-.275 0-.5-.137t-.35-.363t-.137-.488t.137-.512l9.25-16q.15-.25.388-.375T12 3t.488.125t.387.375l9.25 16q.15.25.138.513t-.138.487t-.35.363t-.5.137zM12 18q.425 0 .713-.288T13 17t-.288-.712T12 16t-.712.288T11 17t.288.713T12 18m0-3q.425 0 .713-.288T13 14v-3q0-.425-.288-.712T12 10t-.712.288T11 11v3q0 .425.288.713T12 15" />
                                                            </svg>
                                                        </div>
                                                        <p class="py-4 text-center text-gray-600 text-sm">Apakah anda yakin
                                                            untuk menghapus <span
                                                                class="font-semibold">{{ $p->nama }}</span> ?</p>
                                                        <div class="flex gap-2"></div>
                                                        <div class="modal-action">
                                                            <form method="dialog">
                                                                <!-- if there is a button in form, it will Tutup the modal -->
                                                                <button class="btn">Tutup</button>
                                                            </form>
                                                            <form action="{{ route('pegawai.destroy', $p->nip) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn bg-purple-700 text-white"
                                                                    type="submit">Hapus</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </dialog>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="mx-4 my-2">
                        {{ $pegawais->links() }}
                    </div>
                </div>
            </div>
            {{-- Table Section End --}}

        </div>
    </main>
@endsection
