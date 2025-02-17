@extends('layouts.operator-main')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container my-4 px-6 mx-auto grid">

            {{-- Breadcrumb --}}
            <div class="text-sm mb-4 breadcrumbs text-gray-700">
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
                        Kelola barang
                    </li>
                    <li>
                        Barang masuk
                    </li>
                </ul>
            </div>
            
            <form action="{{ route('barangmasuk.update', $barangmasuk->kode) }}", method="POST">
                @csrf
                @method('PUT')

                <div
                    class="px-4 py-3 mb-6 bg-white text-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-800">
                        Barang Masuk
                    </h4>
                    <label class="form-control w-full text-gray-700 max-w-xs">
                        <div class="label">
                            <span class="label-text">Supplier</span>
                        </div>
                        <select name="kode_supplier" class="select select-bordered">
                            @foreach ($supplier as $supp)
                                <option value="{{ $supp->id }}"
                                    {{ $barangmasuk->kode_supplier == $supp->kode ? 'selected' : '' }}>
                                    {{ $supp->nama }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    <div
                        class="items-center mt-4 p-4 bg-white rounded-lg border border-gray-300 shadow-md dark:bg-gray-800">
                        <div class="label">
                            <span class="label-text">List Barang</span>
                        </div>
                        @foreach ($detailBM as $dbm)
                        <div class="flex gap-2 mb-2 items-center dynamic-form-row">
                            <!-- Item Name -->
                            <label
                                class="input w-full input-bordered flex focus:outline-none items-center bg-white text-gray-700 h-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70"
                                    style="fill: #430A5D;" viewBox="0 0 16 16">
                                    <path
                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                                </svg>
                                <input name="item[]"
                                    class="bg-white input ms-2 outline-none border-none text-sm w-full text-gray-700"
                                    value="{{ $dbm->item->nama }}" readonly />
                            </label>

                            <!-- Quantity Section -->
                            <div class="h-10 bg-white border border-gray-200 rounded-xl flex items-center">
                                <!-- Decrement Button -->
                                <button type="button"
                                    class="px-2 h-full inline-flex justify-center items-center text-sm font-medium rounded-l-xl border-r border-gray-200 bg-white text-gray-800 hover:bg-gray-50 decrement-btn">
                                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                    </svg>
                                </button>

                                <!-- Quantity Input Field -->
                                <input class="p-0 w-8 bg-transparent border-0 text-gray-800 text-center focus:ring-0"
                                    type="text" name="kuantiti[]" value="{{ $dbm->kuantiti }}" />

                                <!-- Increment Button -->
                                <button type="button"
                                    class="px-2 h-full inline-flex justify-center items-center text-sm font-medium rounded-r-xl border-l border-gray-200 bg-white text-gray-800 hover:bg-gray-50 increment-btn">
                                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    <div class="">
                        <button type="submit" id="submitButton"
                            class="mt-4 ml-auto flex min-w-xs px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Perbarui
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all decrement buttons
            const decrementButtons = document.querySelectorAll('.decrement-btn');
            // Select all increment buttons
            const incrementButtons = document.querySelectorAll('.increment-btn');

            // Decrement event
            decrementButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Find the input field next to this button
                    const inputField = this.nextElementSibling;
                    // Get the current value of the input field
                    let currentValue = parseInt(inputField.value);

                    // Decrease the value by 1 if greater than 1
                    if (currentValue > 1) {
                        inputField.value = currentValue - 1;
                    }
                });
            });

            // Increment event
            incrementButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Find the input field before this button
                    const inputField = this.previousElementSibling;
                    // Get the current value of the input field
                    let currentValue = parseInt(inputField.value);

                    // Increase the value by 1
                    inputField.value = currentValue + 1;
                });
            });
        });
    </script>
@endsection
