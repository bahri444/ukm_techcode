@extends('layout.templateadmin')
@section('content')
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
    <h1>Halo {{ Auth::user()->nama_lengkap }}, selamat datang</h1>
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 px-2 md:grid-cols-4 gap-4">
            @foreach ($data as $val)
                <div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow">
                    <div class="p-5">
                        <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            {{ $val->nama_kelas }}
                        </h5>
                        <div class="grid lg:grid-cols-2 lg:gap-2">
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                Kelas {{ $val->jenis_kelas }}
                            </p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                Rp. {{ $val->harga_kelas }}
                            </p>
                        </div>

                        <!-- tombol hapus data kelas -->
                        <button data-modal-target="modalCheckOut{{ $val->kelas_uuid }}"
                            data-modal-toggle="modalCheckOut{{ $val->kelas_uuid }}" type="button"
                            class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-1 mb-1">
                            Beli kelas
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($data as $row)
        <!-- modal edit data kelas -->
        <div id="modalCheckOut{{ $row->kelas_uuid }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Checkout kelas {{ $row->nama_kelas }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="modalCheckOut{{ $row->kelas_uuid }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form method="post" action="/checkoutkelas" class="max-w-sm mx-auto">
                            @csrf
                            <input type="hidden" name="kelas_uuid" value="{{ $row->kelas_uuid }}">
                            <input type="hidden" name="user_uuid" value="{{ Auth::user()->user_uuid }}">
                            <div>
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Metode pembayaran
                                </label>
                                <select id="countries" name="metode_pembayaran"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>-- pilih metode pembayaran --</option>
                                    <option value="cash">Cash</option>
                                    <option value="cicil">Cicil</option>
                                </select>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="modalCheckOut{{ $row->kelas_uuid }}" type="button"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Cancel
                                </button>
                                <button data-modal-hide="modalCheckOut{{ $row->kelas_uuid }}" type="submit"
                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
