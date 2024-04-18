@extends('layout.templateadmin')
@section('content')
    @foreach ($data as $val)
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
        </div>
    @endforeach
@endsection
