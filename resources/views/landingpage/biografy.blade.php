@extends('layout.templatelandingpage')
@section('content')
    <div class="container mx-auto">
        <div class="container mx-auto mt-5 mb-5">
            <p class="text-slate-900 dark:text-white text-center md:text-3xl font-semi-bold tracking-tight">
                Biodata member
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 mt-5">
            @foreach ($data as $val)
                <div class="max-w-md mx-auto bg-white rounded-md shadow-md overflow-hidden md:max-w-2xl mr-2 ml-2 mt-3">
                    <div class="md:flex">
                        <div class="md:shrink-0">
                            <img class="md:w-32 md:h-auto object-cover" src="{{ $val['foto_member'] }}" alt="404" />
                        </div>
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-lg text-indigo-500 font-semibold">
                                {{ $val['nama_lengkap'] }}
                            </div>
                            <p class="block mt-1 text-sm leading-tight font-medium text-black hover:underline">
                                {{ $val['nama_profesi'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
