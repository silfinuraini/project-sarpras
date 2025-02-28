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
                paging: true,
                perPage: 10,
                perPageSelect: [5, 10, 20, 50],
                firstLast: false,
                nextPrev: true,
            });

            const styleDataTable = () => {
                const datatableTop = document.querySelector(".datatable-top");
                if (datatableTop) {
                    datatableTop.style.marginBottom = "0";
                }

                const searchContainer = document.querySelector(".datatable-search");
                if (searchContainer) {
                    searchContainer.classList.add("my-3", "mx-4");

                    const searchInput = searchContainer.querySelector(".datatable-input");
                    if (searchInput) {
                        searchInput.classList.add("input", "input-bordered", "w-full", "max-w-xs", "input-sm");
                        searchInput.style.borderRadius = "0.5rem";
                        searchInput.style.padding = "1.1rem 1rem";
                        searchContainer.style.position = "relative";
                    }
                }

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

                const paginationContainer = document.querySelector(".datatable-pagination");
                if (paginationContainer) {
                    paginationContainer.classList.add("mx-4", "my-3", "flex", "justify-center");

                    const paginationList = paginationContainer.querySelector(".datatable-pagination-list");
                    if (paginationList) {
                        paginationList.classList.add("flex", "gap-1");

                        const paginationItems = paginationList.querySelectorAll(".datatable-pagination-list-item");
                        paginationItems.forEach(item => {
                            item.classList.add("pagination-item");

                            const button = item.querySelector(".datatable-pagination-list-item-link");
                            if (button) {
                                button.classList.remove("bg-purple-700", "text-white", "btn-ghost",
                                    "btn-disabled", "opacity-0", "cursor-not-allowed");

                                button.classList.add("btn", "btn-sm");
                                button.style.minHeight = "2rem";
                                button.style.height = "2rem";
                                button.style.borderRadius = "0.375rem";

                                if (item.classList.contains("datatable-active")) {
                                    button.classList.add("bg-purple-700", "text-white");
                                } else if (item.classList.contains("datatable-disabled")) {
                                    button.classList.add("btn-ghost", "btn-disabled", "opacity-0",
                                        "cursor-not-allowed");
                                } else {
                                    button.classList.add("btn-ghost");
                                }
                            }
                        });
                    }
                }

                // Style info text
                const infoContainer = document.querySelector(".datatable-info");
                if (infoContainer) {
                    infoContainer.classList.add("mx-4", "my-3", "text-sm", "text-gray-600");
                }
            };

            // Style on initialization
            styleDataTable();

            // Fix container appearance
            const tableContainer = document.querySelector("div.w-full.overflow-hidden.mb-2");
            if (tableContainer) {
                tableContainer.classList.add("rounded-box", "shadow-md", "border", "border-gray-200");
                tableContainer.classList.remove("rounded-lg");
            }

            // Additional styling for bottom elements
            document.querySelector(".datatable-info")?.classList.add("mx-4", "my-3");

            // Fix bottom margin issues
            const datatableBottom = document.querySelector(".datatable-bottom");
            if (datatableBottom) {
                datatableBottom.classList.forEach(cls => {
                    if (cls.startsWith("mt-")) datatableBottom.classList.remove(cls);
                });
                datatableBottom.classList.add("py-2");
            }

            // Key event listeners to keep styling consistent when page changes
            dataTable.on("datatable.page", function() {
                // Wait for DOM update before restyling
                setTimeout(styleDataTable, 10);
            });

            dataTable.on("datatable.perpage", function() {
                // Wait for DOM update before restyling
                setTimeout(styleDataTable, 10);
            });

            // Ensure styling is maintained after any search
            dataTable.on("datatable.search", function() {
                setTimeout(styleDataTable, 10);
            });
        }
    </script>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>
