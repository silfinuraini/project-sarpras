@extends('layouts.operator-main')

@section('content')
    <main class="h-full bg-gray-50 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            {{-- Alert --}}
            @if ($almostOut > 0)
                <div role="alert"
                    class="transition-all duration-200 alert shadow-md mt-3 bg-white text-gray-700 border border-gray-300">
                    <span class="relative flex h-3 w-3">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-warning opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-warning"></span>
                    </span>
                    <div>
                        <h3 class="font-bold">Hampir habis!</h3>
                        <div class="text-xs">Ada {{ $almostOut }} barang hampir habis</div>
                    </div>
                    <a href="{{ route('databarang') }}" class="btn btn-link border-none btn-sm">Lihat</a>
                </div>
            @endif

            {{-- Stats --}}
            <div class="stats shado-md shadow my-5 bg-white text-gray-700 border border-gray-300">
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

            {{-- Chart --}}
            <div class="min-w-0 p-4 bg-white rounded-box shadow-md border border-gray-300 dark:bg-gray-800">
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
                        style="display: block; width: 479px; height: 299px;" class="chartjs-render-monitor"></canvas>
                </div>
            </div>


            <div class="grid grid-cols-1 lg:grid-cols-2 my-5 gap-5">

                {{-- Pengadaan Section Start --}}
                <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-2">
                    <div class="w-full overflow-hidden rounded-lg mb-5">
                        <div class="flex justify-between mx-8">
                            <h4 class="font-semibold text-gray-700 text-center my-5">
                                Pengadaan
                            </h4>
                            <a href="{{ route('operator.pengadaan') }}"
                                class="link text-sm text-purple-700 text-center my-5">
                                Lebih lengkap
                            </a>
                        </div>
                        <div class="overflow-x-auto border border-gray-300 mx-5 rounded-box">
                            <table class="w-full whitespace-no-wrap" id="itemsTable">
                                <thead class="mx-5">
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Unit</th>
                                        <th class="px-4 py-3 text-center">Status</th>
                                        <th class="px-4 py-3 text-center">Tanggal</th>
                                        <th class="px-4 py-3"></th>
                                    </tr>
                                </thead>

                                @foreach ($pengadaan as $pgd)
                                    <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                        <tr class="text-gray-600 dark:text-gray-400">
                                            <td class="px-4 py-3">

                                                <p class="font-semibold flex gap-1">{{ $pgd->pegawai->nama }}
                                                </p>
                                                <p class="text-xs text-gray-800 dark:text-gray-400">
                                                    {{ $pgd->pegawai->nama }}
                                                </p>
                                            </td>
                                            <td class="px-4 py-3 text-xs text-center">
                                                @if ($pgd->status == 'menunggu')
                                                    <div class="badge badge-outline outline-orange-500 text-orange-500 text-sm">
                                                        {{ $pgd->status }}</div>
                                                @elseif ($pgd->status == 'disetujui')
                                                    <div
                                                        class="badge badge-outline outline-green-500 text-green-500 text-sm">
                                                        {{ $pgd->status }}</div>
                                                @elseif ($pgd->status == 'ditolak')
                                                    <div class="badge badge-outline outline-red-500 text-red-500 text-sm">
                                                        {{ $pgd->status }}</div>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-xs text-center">
                                                {{ $pgd->created_at }}
                                            </td>

                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Pengadaan Section End --}}

                {{-- Permintaan Section Start --}}
                <div class="flex items-center bg-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800 mt-2">
                    <div class="w-full overflow-hidden rounded-lg mb-5">
                        <div class="flex justify-between mx-8">
                            <h4 class="font-semibold text-gray-700 text-center my-5">
                                Permintaan
                            </h4>
                            <a href="{{ route('operator.permintaan') }}"
                                class="link text-sm text-purple-700 text-center my-5">
                                Lebih lengkap
                            </a>
                        </div>
                        <div class="overflow-x-auto border border-gray-300 mx-5 rounded-box">
                            <table class="w-full whitespace-no-wrap" id="itemsTable">
                                <thead class="mx-5">
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-600 uppercase border-b dark:border-gray-600  dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Unit</th>
                                        <th class="px-4 py-3 text-center">Status</th>
                                        <th class="px-4 py-3 text-center">Tanggal</th>
                                        <th class="px-4 py-3"></th>
                                    </tr>
                                </thead>

                                @foreach ($permintaan as $pm)
                                    <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-800">
                                        <tr class="text-gray-600 dark:text-gray-400">
                                            <td class="px-4 py-3">

                                                <p class="font-semibold flex gap-1">{{ $pm->pegawai->nama }}
                                                </p>
                                                <p class="text-xs text-gray-800 dark:text-gray-400">
                                                    {{ $pm->pegawai->nama }}
                                                </p>
                                            </td>
                                            <td class="px-4 py-3 text-xs text-center">
                                                @if ($pm->status == 'menunggu')
                                                    <div class="badge badge-outline outline-warning text-warning text-sm">
                                                        {{ $pm->status }}</div>
                                                @elseif ($pm->status == 'disetujui')
                                                    <div
                                                        class="badge badge-outline outline-green-500 text-green-500 text-sm">
                                                        {{ $pm->status }}</div>
                                                @elseif ($pm->status == 'ditolak')
                                                    <div class="badge badge-outline outline-red-500 text-red-500 text-sm">
                                                        {{ $pm->status }}</div>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-xs text-center">
                                                {{ $pm->created_at }}
                                            </td>

                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Permintaan Section End --}}


            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
