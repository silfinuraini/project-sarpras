@extends('layouts.unit-main')

@section('content')
    <main class="h-full pb-16 overflow-y-auto p-4">
        <div class=" mx-4 text-sm breadcrumbs">
            <ul>
                <li><a href="kepala-unit-index.html" class="font-semibold text-purple-600">Home</a></li>
                <li>Diproses</li>
            </ul>
        </div>

        <div class="grid grid-cols-4 gap-4 px-4">
            @foreach ($barangKeluar as $bk)
                <div class="card w-full mt-2 bg-base-100 shadow-md">
                    <div class="card-body" style="padding: 1rem">
                        <div class="flex items-center">
                            <p class="font-bold text-md text-purple-700">{{ $bk->perihal }}</p>
                            <a href="{{ route('pengambilan', $bk->kode) }}"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete" fdprocessedid="mx3euh">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z">
                                    </path>
                                </svg>
                            </a>

                            <button onclick="my_modal_2.showModal()"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete" fdprocessedid="mx3euh">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                            </button>
                        </div>
                        <hr>
                        @if ($bk->status == 'diambil')
                            <div class="flex">
                                <p class="font-semibold text-xs items-center flex">{{ $bk->created_at }}</p>
                                <div class="badge badge-outline text-xs justify-between outline-green-600 text-green-600">
                                    Sudah diambil</div>
                            </div>
                        @else
                            <div class="flex">
                                <p class="font-semibold text-xs items-center flex">{{ $bk->created_at }}</p>
                                <div class="badge badge-outline text-xs justify-between outline-red-600 text-red-600">Belum
                                    diambil</div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection