@extends('layout.templateadmin')
@section('content')
    <h1 class="text-center text-blue-700 py-5 text-2xl">{{ $title ?? '' }}</h1>
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
    <div class="mx-auto mt-10 max-w-3xl bg-white">
        <form method="post" action="/postaddmodul" class="max-w-full mx-auto" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="countries" class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">
                    Kategori modul
                </label>
                <select id="countries" name="kategori_uuid"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>-- pilih kategori modul --</option>
                    @foreach ($data as $val)
                        <option value="{{ $val->kategori_uuid }}">{{ $val->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="small-input"
                    class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <input name="judul" type="text" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="materi"
                    class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Materi</label>
                <textarea id="materi" rows="4" name="materi"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="input your teks here..."></textarea>
            </div>
            <div>
                <label for="kode" class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Kode</label>
                <textarea id="kode" rows="4" name="kode"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="input your kode here..."></textarea>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                <a href="/modul"
                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                    Back
                </a>
                <button data-modal-hide="modal-tambah" type="submit"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
