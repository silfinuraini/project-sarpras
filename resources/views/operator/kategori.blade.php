@extends('layouts.operator-main')

@section('content')
    <main class="h-full my-6 bg-gray-50 overflow-y-auto">
        <div class="container grid px-6 mx-auto">

            {{-- Breadcrumb Section Start --}}
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
            {{-- Breadcrumb Section End --}}

            {{-- Form Section Start --}}
            <form id="kategoriForm" action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST" id="methodField">
                <input type="hidden" name="id" id="kategoriId">

                <div
                    class="px-4 py-3 mb-6 bg-white text-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-800">
                        Kategori
                    </h4>
                    <div class="flex gap-2">
                        <label
                            class="input input-bordered flex w-full focus:outline-none items-center mb-2 bg-white text-gray-700">
                            <input type="text" name="nama" id="nama" class="w-full input border-none text-sm"
                                placeholder="Nama kategori" required />
                        </label>

                        <label
                            class="input input-bordered flex max-w-xs focus:outline-none items-center mb-2 bg-white text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-70" viewBox="0 0 16 16">
                                <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0" />
                                <path
                                    d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z" />
                            </svg>
                            <input type="text" name="alias" id="alias" class="input border-none text-sm"
                                placeholder="Alias" required />
                        </label>
                    </div>
                    <div class="">
                        <button type="submit" id="submitButton"
                            class="mt-4 ml-auto flex min-w-xs px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Tambahkan
                        </button>
                    </div>
                </div>
            </form>

            <script>
                function fillForm(row) {
                    // Ambil data dari atribut data-
                    let id = row.getAttribute("data-id");
                    let nama = row.getAttribute("data-nama");
                    let alias = row.getAttribute("data-alias");

                    // Isi form dengan data dari tabel
                    document.getElementById("kategoriId").value = id;
                    document.getElementById("nama").value = nama;
                    document.getElementById("alias").value = alias;

                    // Ubah form menjadi mode edit
                    document.getElementById("kategoriForm").action = `/operator/kategori/${id}`;
                    document.getElementById("methodField").value = "PUT";
                    document.getElementById("submitButton").textContent = "Update";
                }

                function resetForm() {
                    // Reset form ke mode tambah
                    document.getElementById("kategoriForm").action = "{{ route('kategori.store') }}";
                    document.getElementById("methodField").value = "POST";
                    document.getElementById("kategoriId").value = "";
                    document.getElementById("nama").value = "";
                    document.getElementById("alias").value = "";
                    document.getElementById("submitButton").textContent = "Tambahkan";
                }
            </script>
            {{-- Form Section End --}}

            <h4 class="font-semibold text-gray-800">
                Daftar Kategori
            </h4>

            {{-- Table Section Start --}}
            <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-2">
                <div class="w-full overflow-hidden rounded-lg mb-2">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap" id="search-table">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3 text-center">Alias</th>
                                    <th class="px-4 py-3 text-center">Tanggal</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                @foreach ($kategori as $k)
                                    <tr class="text-gray-600 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm font-semibold">
                                            {{ $k->nama }}
                                        </td>

                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $k->alias }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-center">
                                            {{ $k->created_at }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-center space-x-4 text-sm">

                                                <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit" data-id="{{ $k->id }}"
                                                    data-nama="{{ $k->nama }}" data-alias="{{ $k->alias }}"
                                                    onclick="fillForm(this)">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <button type="button"
                                                    onclick="deleteConfirmation{{ $k->id }}.showModal()"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>

                                                <dialog id="deleteConfirmation{{ $k->id }}" class="modal">
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
                                                                class="font-semibold">{{ $k->nama }}</span> ?</p>
                                                        <div class="flex gap-2"></div>
                                                        <div class="modal-action">
                                                            <form method="dialog">
                                                                <!-- if there is a button in form, it will Tutup the modal -->
                                                                <button class="btn">Tutup</button>
                                                            </form>
                                                            <form action="{{ route('kategori.destroy', $k->id) }}"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-4 my-2">
                        {{-- {{ $kategori->links() }} --}}
                    </div>
                </div>
            </div>
            {{-- Table Section End --}}

        </div>
        <!-- </div> -->

    </main>

    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false,
                paging: true, // enable or disable pagination
                perPage: 5, // set the number of rows per page
                perPageSelect: [5, 10, 20, 50], // set the number of rows per page options
                firstLast: true, // enable or disable the first and last buttons
                nextPrev: true,
            });

            // document.getElementById("searchInput").addEventListener("input", (e) => dataTable.search(e.target.value));

            const styleDataTable = () => {
                const datatableTop = document.querySelector(".datatable-top");
                if (datatableTop) {
                    datatableTop.style.marginBottom = "0"; // Hilangkan margin bottom
                }

                const searchContainer = document.querySelector(".datatable-search");
                if (searchContainer) {
                    searchContainer.classList.add("my-3", "mx-4");

                    const searchInput = searchContainer.querySelector(".datatable-input");
                    if (searchInput) {
                        searchInput.classList.add("input", "input-bordered", "w-full", "max-w-xs", "input-sm");
                        searchInput.style.borderRadius = "0.5rem";
                        searchInput.style.padding = "1.1rem 1rem";

                        // Tambahkan ikon search jika diinginkan
                        searchContainer.style.position = "relative";


                    }
                }

                // Style untuk dropdown perPageSelect
                const dropdownContainer = document.querySelector(".datatable-dropdown");
                if (dropdownContainer) {
                    dropdownContainer.classList.add("my-3", "mx-4");

                    const selector = dropdownContainer.querySelector(".datatable-selector");
                    if (selector) {
                        selector.classList.add("select", "select-bordered", "select-sm", "mr-2");
                        selector.style.borderRadius = "0.5rem";
                        selector.style.padding = "0 1rem";
                        selector.style.minHeight = "2rem";
                        selector.style.height = "2rem";
                    }
                }
            };

            // Style saat inisialisasi
            styleDataTable();

            // Perbaikan tampilan container
            const tableContainer = document.querySelector("div.w-full.overflow-hidden.mb-2");
            if (tableContainer) {
                tableContainer.classList.add("rounded-box", "shadow-md", "border", "border-gray-200");
                tableContainer.classList.remove("rounded-lg");
            }

            // document.querySelector(".datatable-top")?.remove();
            document.querySelector(".datatable-info")?.classList.add("mx-4");
            document.querySelector(".datatable-pagination")?.classList.add("mx-4");
            document.querySelector("div.w-full.overflow-hidden.rounded-lg.mb-2")?.classList.replace("rounded-lg",
                "rounded-box");

            document.querySelector(".datatable-bottom")?.classList.forEach(cls => {
                if (cls.startsWith("mt-")) document.querySelector(".datatable-bottom").classList.remove(cls);
            });
        }
    </script>
@endsection
