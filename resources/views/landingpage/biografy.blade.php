@extends('layout.templatelandingpage')
@section('content')
    <div class="container mx-auto">
        <div class="container mx-auto mt-5 mb-5">
            <p class="text-slate-900 dark:text-white text-center md:text-3xl font-semi-bold tracking-tight">
                Biodata member
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 mt-5">
            <div class="max-w-md mx-auto bg-white rounded-md shadow-md overflow-hidden md:max-w-2xl mr-2 ml-2">
                <div class="md:flex">
                    <div class="md:shrink-0">
                        <img class="lg:h-48 lg:w-48 object-cover md:h-48 md:w-48"
                            src="{{ asset('assets') }}/images/bahri.jpeg" alt="Modern building architecture" />
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-lg text-indigo-500 font-semibold">
                            SAEPUL BAHRI
                        </div>
                        <a href="#"
                            class="block mt-1 text-sm leading-tight font-medium text-black hover:underline">Back-end
                            enginer</a>
                        <p class="mt-2 text-slate-500 text-sm">
                            Retaslah ketidaktahuanmu dengan belajar, akan tetapi belajar akan
                            membuatmu semakin merasa bodoh
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
