@extends('layout.templatelandingpage')
@section('content')
    @foreach ($data as $val)
        <div class="mx-auto mt-10 max-w-2xl bg-white">
            <img class="mx-auto mt-5 h-auto w-auto rounded-lg shadow-xl dark:shadow-gray-800" src="{{ $val->foto_kegiatan }}"
                alt="404" />
            <div class="p-5">
                <h5 class="mb-3 mt-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    {{ $val->nama_kegiatan }}
                </h5>
                <p class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400 text-justify">
                    {{ $val->deskripsi }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Bertempatkan di {{ $val->tempat }}, yang dilaksanakan sejak tanggal, {{ $val->tanggal_mulai }}.
                    sampai dengan tanggal, {{ $val->tanggal_selesai }}
                </p>
            </div>
        </div>
    @endforeach
@endsection
