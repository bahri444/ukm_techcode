@extends('layout.templateadmin')
@section('content')
    @foreach ($data as $val)
        <div>
            @if (session('success'))
                <p class="alert alert-success"></p>

                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            @if (is_object($errors) && $errors->any())
                @foreach ($errors->all() as $err)
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">{{ $err }}</span>
                    </div>
                @endforeach
            @endif
        </div>
        <div
            class="mx-auto mt-10 max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <img class="rounded-t-lg mx-auto" src="{{ $val->foto }}" alt="404" />
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    {{ $val->nama_lengkap }}
                </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    ID : {{ $val->kode_member }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ $val->role }} {{ $val->jenis_anggota }} angkatan ke-{{ $val->angkatan }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Gender : {{ $val->gender }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Tgl. lahir : {{ $val->tanggal_lahir }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Alamat : {{ $val->alamat }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Email, {{ $val->email }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Github, {{ $val->github }}
                </p>
                @if ($val->status_anggota == 'aktif')
                    <p class="mb-3 font-normal text-green-700 dark:text-green-400">
                        Status anggota : {{ $val->status_anggota }}
                    </p>
                @else
                    <p class="mb-3 font-normal text-red-700 dark:text-red-400">
                        Status anggota : {{ $val->status_anggota }}
                    </p>
                @endif
            </div>
            {{-- modal --}}
            <div class="mb-3 pl-5">
                <!-- tombol edit foto -->
                <button data-modal-target="edit_foto{{ $val->user_uuid }}"
                    data-modal-toggle="edit_foto{{ $val->user_uuid }}" type="button"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-1 mb-1 ">
                    Update foto
                </button>
                <!-- tombol validasi foto -->

                <!-- tombol edit biodata -->
                <button data-modal-target="edit_biodata{{ $val->user_uuid }}"
                    data-modal-toggle="edit_biodata{{ $val->user_uuid }}" type="button"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-1 mb-1 ">
                    Update biodata
                </button>
                <!-- tombol validasi biodata -->
            </div>
            {{-- end-modal --}}
        </div>

        {{-- form modal biodata --}}
        <div id="edit_biodata{{ $val->user_uuid }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit {{ $title ?? '' }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="edit_biodata{{ $val->user_uuid }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form method="post" action="/updatebiodata" class="max-w-sm mx-auto">
                            @csrf
                            <input type="hidden" name="user_uuid" value="{{ $val->user_uuid }}">
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    lengkap</label>
                                <input name="nama_lengkap" type="text" value="{{ $val->nama_lengkap }}" id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input name="email" type="email" value="{{ $val->email }}" id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    lahir</label>
                                <input name="tanggal_lahir" type="date" value="{{ $val->tanggal_lahir }}"
                                    id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Gender
                                </label>
                                <select id="countries" name="gender"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="{{ $val->gender }}" selected>{{ $val->gender }}
                                    </option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input name="alamat" type="text" value="{{ $val->alamat }}" id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Github</label>
                                <input name="github" type="text" value="{{ $val->github }}" id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="edit_biodata{{ $val->user_uuid }}" type="button"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Cancel
                                </button>
                                <button data-modal-hide="edit_biodata{{ $val->user_uuid }}" type="submit"
                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end-form modal biodata --}}

        {{-- form modal foto --}}
        <div id="edit_foto{{ $val->user_uuid }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit {{ $title ?? '' }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="edit_foto{{ $val->user_uuid }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form method="post" action="/updatefoto" class="max-w-sm mx-auto"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_uuid" value="{{ $val->user_uuid }}">
                            <div class="col-span-full">
                                <label for="my_foto" class="block text-sm font-medium leading-6 text-slate-900">Foto
                                    formal</label>
                                <div class="mt-2">
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="my_foto" type="file" name="foto">
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="edit_foto{{ $val->user_uuid }}" type="button"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Cancel
                                </button>
                                <button data-modal-hide="edit_foto{{ $val->user_uuid }}" type="submit"
                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end-form modal foto --}}
    @endforeach
@endsection
