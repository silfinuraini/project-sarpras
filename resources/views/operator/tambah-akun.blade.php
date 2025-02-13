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
                        Tambah Akun
                    </li>
                </ul>
            </div>
            {{-- Breadcrumb Section End --}}



            {{-- Form Section Start --}}
            <form action="{{ route('akun.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST" id="methodField">
                <input type="hidden" name="id">

                <div
                    class="px-4 py-3 mb-6 bg-white text-white border border-gray-300 rounded-box shadow-md dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-800">
                        Tambah Akun
                    </h4>

                    <div class="flex gap-2">
                        <label class="form-control w-full text-gray-700 max-w-lg">
                            <div class="label">
                                <span class="label-text">Pegawai</span>
                            </div>
                            <select name="nip" class="select select-bordered">
                                <option disabled selected>Nama pegawai</option>
                                @foreach ($pegawai as $p)
                                    <option value="{{ $p->nip }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="form-control w-full text-gray-700 max-w-xs">
                            <div class="label">
                                <span class="label-text">Role</span>
                            </div>
                            <select name="role" class="select select-bordered">
                                <option value="unit">Unit</option>
                                <option value="pengawas">Pengawas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </label>
                    </div>

                    <div class="divider"></div>

                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Username</span>
                        </div>
                        <input name="username" type="text" placeholder="admin@localhost"
                            class="input input-bordered w-full text-gray-700" />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input name="password" type="text" placeholder="password"
                            class="input input-bordered w-full text-gray-700" />
                    </label>

                    <div class="">
                        <button type="submit" id="submitButton"
                            class="mt-4 ml-auto flex min-w-xs px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Tambahkan
                        </button>
                    </div>
                </div>
            </form>
            {{-- Form Section End --}}


        </div>
    </main>
@endsection
