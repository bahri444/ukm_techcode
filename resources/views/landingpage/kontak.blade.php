@extends('layout.templatelandingpage')
@section('content')
    <div
        class="mx-auto mt-8 max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
            MASUKAN / SARAN
        </h5>
        <form method="post" action="/komentar" class="max-w-2xl mx-auto">
            @csrf
            <div>
                <label for="small-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input name="username" type="text" id="small-input" placeholder="masukkan username"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4 mt-5">
                <label for="teks_saran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saran</label>
                <textarea id="teks_saran" name="teks_saran" rows="4"
                    class="block p-2 w-full resize-none text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan saran anda ..."></textarea>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                    Kirim
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ms-2" enable-background="new 0 0 64 64"
                        viewBox="0 0 64 64" id="send" fill="currentColor">
                        <polygon points="20.9 30.6 21.7 56.4 64 9.5"></polygon>
                        <polygon points="0 11.2 20.1 28.7 63.3 7.6"></polygon>
                    </svg>
                </button>
            </div>
        </form>
    </div>
@endsection
