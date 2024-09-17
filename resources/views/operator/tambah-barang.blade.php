@extends('layouts.operator-main')

@section('content')
    <main class="h-full pb-16 my-4 overflow-y-auto">
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
                        <a href="data-barang">
                            Data barang
                        </a>
                    </li>
                    <li>
                        Tambah barang
                    </li>
                </ul>
            </div>

            <form action="{{ route('item.store') }}" id="formStoreItem" method="POST">
                @csrf
                {{-- Form kategori --}}
                <div class="px-4 py-3 mb-6 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <div class="grid gap-6 mt-4 md:grid-cols-4">
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Kategori
                                </h4>
                            </div>
                        </div>
                        <div class="col-span-3">
                            <div>
                                <select class="select select-bordered w-full bg-white text-sm text-gray-700"
                                    name="kategori_id">
                                    <option disabled selected>Pilih kategori</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Detail barang --}}
                <div class="px-4 py-3 mb-6 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <div class="grid ms-4 mt-2 md:grid-cols-4">
                        <div class="col-span-4 p-4">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-300">
                                Detail Barang
                            </h4>
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Foto barang
                                </h4>
                                <p class="text-gray-700 text-sm dark:text-gray-400">
                                    Format foto harus .jpg .jpeg .png dan ukuran min. 300 x 300 px (untuk gambar optimal,
                                    gunakan ukuran min. 1.200 x 1.200 px).
                                </p>
                            </div>
                        </div>
                        <div class="col-span-3 flex gap-4 p-4">
                            <div
                                class="relative w-40 h-40 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center text-gray-400 hover:border-purple-700 hover:text-purple-700 transition-colors duration-300 overflow-hidden">
                                <input type="file" accept="image/*" name="gambar"
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
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Nama
                                </h4>
                                <p class="text-gray-700 text-sm dark:text-gray-400">
                                    Nama barang min. 25 karakter
                                </p>
                            </div>
                        </div>
                        <div class="p-4 col-span-3 justify-center items-center">
                            <input type="text" placeholder="Kertas HVS" name="nama"
                                class="input text-sm  input-bordered w-full text-gray-700 bg-white" />
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Merk
                                </h4>
                                <p class="text-gray-700 text-sm dark:text-gray-400">
                                    Merk dapat mempermudah pencarian
                                </p>
                            </div>
                        </div>
                        <div class="p-4 col-span-3 justify-center items-center">
                            <input type="text" placeholder="SIDU/Natural/PaperOne" name="merk"
                                class="input text-sm  input-bordered w-full text-gray-700 bg-white" />
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Jenis
                                </h4>
                                <p class="text-gray-700 text-sm dark:text-gray-400">
                                    Jenis barang dapat berupa <b>kegunaan, ketebalan, tekstur,</b> dsb.
                                </p>
                            </div>
                        </div>
                        <div class="p-4 col-span-3 justify-center items-center">
                            <input type="text" placeholder="HVS/Kertas foto" name="jenis"
                                class="input text-sm  input-bordered w-full text-gray-700 bg-white" />
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Ukuran
                                </h4>
                                <p class="text-gray-700 text-sm dark:text-gray-400">
                                    Ukuran barang dapat berbentuk <b>ukuran kertas, cM, mL</b> dsb.
                                </p>
                            </div>
                        </div>
                        <div class="p-4 col-span-3 justify-center items-center">
                            <input type="text" placeholder="A4 (21,0 x 29,7 cm)" name="ukuran"
                                class="input text-sm  input-bordered w-full text-gray-700 bg-white" />
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Warna
                                </h4>
                                <p class="text-gray-700 text-sm dark:text-gray-400">
                                    Warna barang perlu dicantumkan agar tidak membingungkan unit
                                </p>
                            </div>
                        </div>
                        <div class="p-4 col-span-3 justify-center items-center">
                            <input type="text" placeholder="Putih" name="warna"
                                class="input text-sm  input-bordered w-full text-gray-700 bg-white" />
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Harga
                                </h4>
                                <p class="text-gray-700 text-sm dark:text-gray-400">
                                    Harga barang akan otomatis dalam bentuk pecahan Rupiah
                                </p>
                            </div>
                        </div>
                        <div class="p-4 col-span-3 justify-center items-center">
                            <div class="relative">
                                <span
                                    class="absolute inset-y-0 left-0 flex items-center text-sm pl-3 text-gray-500 pointer-events-none">
                                    Rp
                                </span>
                                <input type="text" placeholder="0"
                                    class="input text-sm input-bordered text-gray-700 bg-white pl-10 pr-3 text-right"
                                    name="harga" id="hargaInput" />
                            </div>
                        </div>
                        <div>
                            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-sm text-gray-800 dark:text-gray-300">
                                    Deskripsi
                                </h4>
                                <p class="text-gray-700 text-sm dark:text-gray-400">
                                    Pastikan deskripsi barang memuat <b>penjelasan detail</b> agar mudah dimengerti.
                                </p>
                            </div>
                        </div>
                        <div class="p-4 col-span-3 justify-center items-center">
                            <textarea name="deskripsi" class="textarea h-full textarea-bordered bg-white text-gray-800 text-sm w-full"
                                placeholder="• Ukuran 210 x 297 
• Kertas 80 GSM 
• Isi 500 lembar/rim
• Permukaan halus & warna putih cerah - hasil cetak tajam dan kontras warna maksimum"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Pengelolaan barang --}}
                <div class="px-4 py-3 mb-6 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <div class="grid ms-4 mt-2 md:grid-cols-3">
                        <div class="col-span-3 p-4">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-300">
                                Pengelolaan Barang
                            </h4>
                        </div>
                        <div class="p-4">
                            <div class="form-control w-full relative">
                                <select type="text" placeholder=" " name="satuan"
                                    class="input text-sm bg-white text-gray-800 input-bordered w-full pt-4 pb-1">
                                    <option value="Pcs">Pcs</option>
                                    <option value="Box">Box</option>
                                    <option value="Rim">Rim</option>
                                    <option value="Karton">Karton</option>
                                    <option value="Dus">Dus</option>
                                </select>
                                <label
                                    class="absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Satuan</label>
                            </div>

                            <style>
                                .form-control input:focus-within~label,
                                .form-control input:not(:placeholder-shown)~label {
                                    @apply transform scale-75 -translate-y-4 z-10 ml-1 px-1 py-0;
                                }
                            </style>
                        </div>
                        <div class="p-4">
                            <div class="form-control w-full relative">
                                <input type="text" placeholder=" " name="stok"
                                    class="input text-sm bg-white text-gray-800 input-bordered w-full pt-4 pb-1" />
                                <label
                                    class="absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Stok</label>
                            </div>

                            <style>
                                .form-control input:focus-within~label,
                                .form-control input:not(:placeholder-shown)~label {
                                    @apply transform scale-75 -translate-y-4 z-10 ml-1 px-1 py-0;
                                }
                            </style>
                        </div>
                        <div class="p-4">
                            <div class="form-control w-full relative">
                                <input type="text" placeholder=" " name="stok_minimum"
                                    class="input text-sm bg-white text-gray-800 input-bordered w-full pt-4 pb-1" />
                                <label
                                    class="absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Stok
                                    minimum</label>
                            </div>

                            <style>
                                .form-control input:focus-within~label,
                                .form-control input:not(:placeholder-shown)~label {
                                    @apply transform scale-75 -translate-y-4 z-10 ml-1 px-1 py-0;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <button
                    class="mt-2 mb-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    style="width: 100%;" type="submit">
                    Tambahkan
                </button>
            </form>
        </div>
    </main>

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

        const hargaInput = document.getElementById('hargaInput');

        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function unformatNumber(formattedNum) {
            return formattedNum.replace(/\./g, '');
        }

        hargaInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value === '') {
                this.value = '';
            } else {
                this.value = formatNumber(value);
            }

            console.log(this.value)
        });

        hargaInput.addEventListener('blur', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value !== '') {
                this.value = formatNumber(value);
            }
        });

        hargaInput.addEventListener('focus', function(e) {
            let value = this.value.replace(/\D/g, '');
            this.value = formatNumber(value);
        });

        const formStore = document.getElementById('formStoreItem');
        formStore.addEventListener('submit', function(e) {
            // Unformat the harga input before submitting the form
            hargaInput.value = unformatNumber(hargaInput.value);
        });
    </script>
@endsection
