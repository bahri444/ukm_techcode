@extends('layout.templatelandingpage')
@section('content')
    <div class="container mx-auto bg-sky-100 rounded-lg mt-10">
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
        @foreach ($data as $val)
            <div class="md:flex py-1.5">
                <div class="mt-2 md:mt-0 md:mr-6 py-8 mr-8">
                    <h1 class="text-3xl font-semibold text-slate-800 md:text-2xl">
                        {{ $val->title }}
                    </h1>
                    <p class="mt-2 text-slate-700 text-justify lg:w-5/6 md:w-2/3">
                        {{ $val->deskripsi }}
                    </p>
                </div>
                <div class="md:flex-shrink-0 mx-auto">
                    <img class="h-auto max-w-sm rounded-lg" src="{{ $val->banner }}" alt="Woman paying for a purchase" />
                </div>
            </div>
        @endforeach
    </div>
@endsection
