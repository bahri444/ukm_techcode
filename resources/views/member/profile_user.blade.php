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
                <div class="grid lg:grid-cols-2 lg:gap-2">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Email : {{ $val->email }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Role : {{ $val->role }}
                    </p>
                </div>
                <div class="grid lg:grid-cols-2 lg:gap-2">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Gender : {{ $val->gender }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Tgl. lahir : {{ $val->tanggal_lahir }}
                    </p>
                </div>
                <div class="grid lg:grid-cols-2 lg:gap-2">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Alamat : {{ $val->alamat }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $val->github }}
                    </p>
                </div>
                <div class="grid lg:grid-cols-2 lg:gap-2">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Status : {{ $val->status_anggota }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Jenis anggota : {{ $val->jenis_anggota }}
                    </p>
                </div>
                <div class="grid lg:grid-cols-2 lg:gap-2">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Angkatan : {{ $val->angkatan }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Kode member : {{ $val->kode_member }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
