@extends('layouts.operator-main')

@section('content')
    <main class="h-full bg-gray-100 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            {{-- Alert --}}
            <div role="alert" class="transition-all duration-200 alert shadow-lg mt-3 bg-white text-gray-700 border-none">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-warning opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-warning"></span>
                </span>
                <div>
                    <h3 class="font-bold">Hampir habis!</h3>
                    <div class="text-xs">Ada .. barang hampir habis</div>
                </div>
                <a href="{{ route('databarang') }}" class="btn btn-link border-none btn-sm">Lihat</a>
            </div>

            {{-- Stats --}}
            <div class="stats shadow my-5 bg-white text-gray-700">
                <div class="stat">
                    <div class="stat-figure text-teal-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title text-gray-700">Barang masuk</div>
                    <div class="stat-value text-teal-500">{{ $barangMasuk }}</div>
                    {{-- <div class="stat-desc text-gray-700">19 pegajuan telah disetujui</div> --}}
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-title text-gray-700">Barang keluar</div>
                    <div class="stat-value text-secondary">{{ $barangKeluar }}</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-purple-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-8 w-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-title text-gray-700">Item</div>
                    <div class="stat-value text-purple-700">{{ $barang }}</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <div class="avatar online">
                            <div class="w-16 rounded-full">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                            </div>
                        </div>
                    </div>
                    <div class="stat-value">{{ $user }}</div>
                    <div class="stat-title text-gray-700">Pengguna</div>
                    <div class="stat-desc text-secondary">31 tasks remaining</div>
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-3">

                {{-- Chart --}}
                <div class="col-span-2">
                    <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                            Barang Masuk dan Keluar
                        </h4>
                        <div style="width: 100%; margin: auto;">
                            <canvas id="itemChart" width="479" height="364"
                                style="display: block; width: 479px; height: 299px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>

                {{-- Tabel Pengadaan --}}
                <div class="w-full overflow-hidden rounded-box shadow-xs">
                    <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">

                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                            Pengadaan
                        </h4>
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Barang</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($pengadaan as $p)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-2">
                                                <div class="flex items-center text-sm">
                                                    <div>
                                                        <p class="font-semibold">RPL</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            {{ $p->pegawai->nama }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                @if ($p->status == 'menunggu')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                                        {{ $p->status }}
                                                    </span>
                                                @elseif ($p->status == 'disetujui')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-white dark:bg-green-600">
                                                        {{ $p->status }}
                                                    </span>
                                                @elseif ($p->status == 'ditolak')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-white dark:bg-re-600">
                                                        {{ $p->status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $p->created_at }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('operator.pengadaan') }}"
                                class=" btn mt-2 mb-2 px-2 py-2 border-none text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-box active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                style="width: 100%;">
                                Ke halamann
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabel Permintaan --}}
            <div class="w-full overflow-hidden rounded-box shadow-xs mb-6">
                <div class="min-w-0 p-4 bg-white rounded-box shadow-xs dark:bg-gray-800">

                    <div class="flex justify-between items-center">
                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                            Permintaan Terkini
                        </h4>
                        <label class="input input-bordered flex items-center gap-2 bg-white text-gray-700">
                            <input type="text" class="grow border-none input" placeholder="Search" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="h-4 w-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </label>

                    </div>
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Unit</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($permintaan as $p)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                        alt="" loading="lazy">
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">RPL</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        {{ $p->pegawai->nama }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @if ($p->status == 'menunggu')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                                    {{ $p->status }}
                                                </span>
                                            @elseif ($p->status == 'disetujui')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-white dark:bg-green-600">
                                                    {{ $p->status }}
                                                </span>
                                            @elseif ($p->status == 'ditolak')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-white dark:bg-re-600">
                                                    {{ $p->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $p->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        yg betul

        <script>
            const chartData = @json($chart);

            // Konfigurasi warna untuk dataset
            const colors = {
                primary: '#0694a2', // teal-500
                secondary: '#7e3af2' // purple-600
            };

            // Terapkan warna ke dataset
            chartData.datasets = chartData.datasets.map((dataset, index) => ({
                ...dataset,
                backgroundColor: index === 0 ? colors.primary : colors.secondary,
                borderColor: index === 0 ? colors.primary : colors.secondary,
                borderWidth: 1,
                borderRadius: 4,
            }));

            const ctx = document.getElementById('itemChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: chartData.datasets
                },
                options: {
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#4B5563', // gray-600
                                font: {
                                    size: 12
                                }
                            },
                            barPercentage: 0.7,
                            categoryPercentage: 0.7
                        },
                        y: {
                            grid: {
                                display: true,
                                color: 'rgba(75, 85, 99, 0.2)', // gray-600 with opacity
                                drawBorder: false
                            },
                            ticks: {
                                color: '#4B5563', // gray-600
                                font: {
                                    size: 12
                                },
                                padding: 10,
                                callback: function(value) {
                                    return value;
                                }
                            },
                            beginAtZero: true
                        }
                    },

                    plugins: {
                        legend: {
                            display: true // Sembunyikan legend bawaan
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleColor: '#fff',
                            titleFont: {
                                size: 14,
                                weight: 'normal'
                            },
                            bodyColor: '#fff',
                            bodyFont: {
                                size: 13
                            },
                            displayColors: false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            top: 5,
                            right: 10,
                            bottom: 0,
                            left: 10
                        }
                    }
                }
            });

            // Generate custom legend
            const legendContainer = document.getElementById('chartLegend');
            chartData.datasets.forEach((dataset, index) => {
                const legendItem = document.createElement('div');
                legendItem.className = 'flex items-center';

                const colorBox = document.createElement('span');
                colorBox.className = 'inline-block w-3 h-3 mr-1 rounded-full';
                colorBox.style.backgroundColor = index === 0 ? colors.primary : colors.secondary;

                const labelText = document.createElement('span');
                labelText.textContent = dataset.label;

                legendItem.appendChild(colorBox);
                legendItem.appendChild(labelText);
                legendContainer.appendChild(legendItem);
            });
        </script>
    </main>
@endsection
