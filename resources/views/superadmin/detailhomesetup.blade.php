@extends('layout.templateadmin')
@section('content')
    @foreach ($data as $val)
        <div class="mx-auto mt-10 max-w-3xl bg-white">
            <img class="mx-auto mt-5 h-auto max-w-lg rounded-lg dark:shadow-gray-800" src="{{ $val->banner }}"
                alt="404" />
            <h5 class="mb-2 mt-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                {{ $val->title }}
            </h5>
            <h4 class="text-center text-xl font-bold tracking-tight text-gray-900 dark:text-white">VISI</h4>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
                {{ $val->deskripsi }}
            </p>
        </div>
    @endforeach
@endsection
