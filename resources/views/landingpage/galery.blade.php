@extends('layout.templatelandingpage')
@section('content')
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 px-2 md:grid-cols-4 gap-4">
            @foreach ($data as $val)
                <a href="/galery/{{ $val->kegiatan_uuid }}">
                    <img class="h-56 max-w-full rounded-lg mx-auto" src="{{ $val->foto_kegiatan }}" alt="">
                </a>
            @endforeach
        </div>
    </div>
@endsection
