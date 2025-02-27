<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sarpras Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('src/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('src/js/charts-bars.js') }}" defer></script>
    <script src="{{ asset('src/js/charts-pie.js') }}" defer></script>
    <script src="{{ asset('src/js/focus-trap.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Flowbite Datatable --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    {{-- Dropzone --}}
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    @vite('resources/css/app.css')
</head>

<body>

    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        @if (session('success'))
            <div class="toast z-[999]">
                <div class="alert bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="toast z-[999]">
                <div class="alert bg-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif
    </div>

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('patrials.sidebar')

        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('patrials.mobile-hamburger')

        <div class="flex flex-col flex-1 w-full">
            @include('patrials.navbar')

           

            @yield('content')

        </div>
    </div>

    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false,
                paging: true, // enable or disable pagination
                perPage: 10, // set the number of rows per page
                perPageSelect: [ 5, 10, 20, 50], // set the number of rows per page options
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

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>
