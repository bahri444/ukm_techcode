@extends('layout.templateadmin')
@section('content')
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
    <h1 class="font-normal text-lg text-center text-blue-800">
        Selamat datang kembali {{ Auth::user()->nama_lengkap }},
        semoga aktifitas belajar anda menyenangkan
    </h1>
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 px-2 md:grid-cols-4 gap-4">
            @foreach ($data as $val)
                @foreach ($val->joinToKelas as $kelas)
                    <div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow">
                        <div class="p-5">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                {{ $kelas->nama_kelas }}
                            </h5>
                            <div class="grid lg:grid-cols-2 lg:gap-2">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Kelas {{ $kelas->jenis_kelas }}
                                </p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Rp. {{ $kelas->harga_kelas }}
                                </p>
                            </div>
                            @if ($val->status_kelas == 'aktif')
                                <a href="kooridor_kelas{{ $val->kelas_member_uuid }}"
                                    class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-1 mb-1">
                                    Belajar
                                </a>
                            @else
                                <p class="mb-3 font-bold text-sm text-green-700 dark:text-green-400 text-center">
                                    kelas dalam proses validasi
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
