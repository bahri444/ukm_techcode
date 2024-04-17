@extends('layout.templatelandingpage')
@section('content')
    <div class="container mx-auto">
        @foreach ($data as $val)
            <div class="rounded-lg">
                <div class="md:flex-shrink-0 mx-auto">
                    <img src="{{ $val->logo }}" class="rounded-full w-96 h-96 mx-auto" alt="Woman paying for a purchase" />
                </div>
                <div class="text-center mt-5 mx-auto">
                    <h1 class="text-2xl font-semibold text-slate-800 md:text-xl">
                        {{ $val->nama }}
                    </h1>
                </div>
                <div class="text-center mt-5 mx-auto">
                    <h1 class="text-xl font-semibold text-slate-800">
                        VISI
                    </h1>
                    <p class="mt-2 text-slate-700 lg:text-center md:text-justify lg:w-full md:w-5/3">
                        {{ $val->visi }}
                    </p>
                </div>
                <div class="text-center mt-5 mx-auto">
                    <h1 class="text-xl font-semibold text-slate-800">
                        MISI
                    </h1>
                    <p class="mt-2 text-slate-700 lg:text-center md:text-justify lg:w-full md:w-5/3">
                        {{ $val->misi }}
                    </p>
                </div>
                <div class="text-center mt-5 mx-auto">
                    <h1 class="text-xl font-semibold text-slate-800">
                        TUJUAN
                    </h1>
                    <p class="mt-2 text-slate-700 lg:text-center md:text-justify lg:w-full md:w-5/3">
                        {{ $val->tujuan }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
