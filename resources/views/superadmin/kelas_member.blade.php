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
    <!-- tombol tambah data kelas -->
    <button data-modal-target="modal-tambah" data-modal-toggle="modal-tambah"
        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 "
        type="button">
        Add {{ $title }}
    </button> <!-- awal tabel -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama user
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Metode pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Selesai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                @foreach ($data as $val)
                    @foreach ($val->joinToUser as $user)
                        @foreach ($val->joinToKelas as $kelas)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $nomor++ }}
                                </th>
                                <td class="px-6 py-4">
                                    <img src="{{ $user->foto }}" class="w-10 h-auto" alt="404">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->nama_lengkap }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $kelas->nama_kelas }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp. {{ $kelas->harga_kelas }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $val->metode_pembayaran }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $val->mulai ?? 'null' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $val->selesai ?? 'null' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $val->status_kelas }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-4">
                                        <!-- tombol edit data kelas -->
                                        <button data-modal-target="modal_edit{{ $val->kelas_member_uuid }}"
                                            data-modal-toggle="modal_edit{{ $val->kelas_member_uuid }}" type="button"
                                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-1 mb-1 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"
                                                fill="#f1f5f9" width="25" height="25" class="mx-auto mb-1 mt-1"
                                                id="edit">
                                                <path
                                                    d="M3.5,24h15A3.51,3.51,0,0,0,22,20.487V12.95a1,1,0,0,0-2,0v7.537A1.508,1.508,0,0,1,18.5,22H3.5A1.508,1.508,0,0,1,2,20.487V5.513A1.508,1.508,0,0,1,3.5,4H11a1,1,0,0,0,0-2H3.5A3.51,3.51,0,0,0,0,5.513V20.487A3.51,3.51,0,0,0,3.5,24Z">
                                                </path>
                                                <path
                                                    d="M9.455,10.544l-.789,3.614a1,1,0,0,0,.271.921,1.038,1.038,0,0,0,.92.269l3.606-.791a1,1,0,0,0,.494-.271l9.114-9.114a3,3,0,0,0,0-4.243,3.07,3.07,0,0,0-4.242,0l-9.1,9.123A1,1,0,0,0,9.455,10.544Zm10.788-8.2a1.022,1.022,0,0,1,1.414,0,1.009,1.009,0,0,1,0,1.413l-.707.707L19.536,3.05Zm-8.9,8.914,6.774-6.791,1.4,1.407-6.777,6.793-1.795.394Z">
                                                </path>
                                            </svg>
                                        </button>
                                        <!-- tombol validasi data user -->
                                        <button data-modal-target="modal_validasi{{ $val->kelas_member_uuid }}"
                                            data-modal-toggle="modal_validasi{{ $val->kelas_member_uuid }}" type="button"
                                            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-1 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                                stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd"
                                                viewBox="0 0 8 8" fill="#f1f5f9" width="25" height="25"
                                                class="mx-auto mb-1 mt-1" id="user-check">
                                                <path
                                                    d="M2.88.24c-.927 0-1.68.753-1.68 1.68 0 .927.753 1.68 1.68 1.68.927 0 1.68-.753 1.68-1.68 0-.927-.753-1.68-1.68-1.68zm0 .48c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zM5.28 3.12c-1.192 0-2.16.968-2.16 2.16 0 1.192.968 2.16 2.16 2.16 1.192 0 2.16-.968 2.16-2.16 0-1.192-.968-2.16-2.16-2.16zm0 .48c.927 0 1.68.753 1.68 1.68 0 .927-.753 1.68-1.68 1.68-.927 0-1.68-.753-1.68-1.68 0-.927.753-1.68 1.68-1.68z">
                                                </path>
                                                <path
                                                    d="M4.347 5.45l.509.509c.045.045.106.07.169.07.064 0 .125-.025.17-.07l1.018-1.018c.094-.094.094-.246 0-.34-.093-.093-.245-.093-.339 0l-.849.849c0 0-.339-.34-.339-.34-.094-.093-.246-.093-.339 0-.094.094-.094.246 0 .34zM.24 6.72l0 0c0 .191.076.374.211.509.135.135.318.211.509.211l0 0 2.174 0c.133 0 .24-.108.24-.24 0-.132-.107-.24-.24-.24l-2.174 0c-.064 0-.125-.025-.17-.07l-.001-.001c-.044-.045-.069-.106-.069-.169l0 0c0-1.095.813-1.999 1.869-2.141.131-.017.223-.138.205-.269-.017-.132-.138-.224-.269-.206-1.29.173-2.285 1.278-2.285 2.616z">
                                                </path>
                                            </svg>
                                        </button>
                                        <!-- tombol hapus data kelas -->
                                        <button data-modal-target="modal_hapus{{ $val->kelas_member_uuid }}"
                                            data-modal-toggle="modal_hapus{{ $val->kelas_member_uuid }}" type="button"
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-1 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f1f5f9"
                                                width="25" height="25" class="mx-auto" id="trash">
                                                <path
                                                    d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- akhir tabel -->


    <!-- modal tambah data user -->
    <div id="modal-tambah" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah {{ $title ?? '' }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal-tambah">
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
                    <form method="post" action="/addkelasmember" class="max-w-sm mx-auto">
                        @csrf
                        <div>
                            <label for="user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama member</label>
                            <select id="user" name="user_uuid"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>-- pilih member --</option>
                                @foreach ($data_user as $user)
                                    <option value="{{ $user->user_uuid }}">{{ $user->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kelas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama kelas</label>
                            <select id="kelas" name="kelas_uuid"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>-- pilih kelas --</option>
                                @foreach ($data_kelas as $kelas)
                                    <option value="{{ $kelas->kelas_uuid }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="metode-pembayaran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Metode pembayaran
                            </label>
                            <select id="metode-pembayaran" name="metode_pembayaran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>-- pilih metode pembayaran --</option>
                                <option value="cash">Cash</option>
                                <option value="cicil">Cicil</option>
                            </select>
                        </div>
                        <div>
                            <label for="small-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                            <input name="mulai" type="date" id="small-input"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="small-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                            <input name="selesai" type="date" id="small-input"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="status-kelas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Status kelas
                            </label>
                            <select id="status-kelas" name="status_kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>-- pilih status kelas --</option>
                                <option value="pending">Pending</option>
                                <option value="aktif">Aktif</option>
                            </select>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                            <button data-modal-hide="modal-tambah" type="button"
                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                Cancel
                            </button>
                            <button data-modal-hide="modal-tambah" type="submit"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end-modal tambah data user -->

    @foreach ($data as $rows)
        {{-- modal edit --}}
        <div id="modal_edit{{ $rows->kelas_member_uuid }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit {{ $title ?? '' }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="modal_edit{{ $rows->kelas_member_uuid }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form method="post" action="/updatekelasmember" class="max-w-sm mx-auto">
                            @csrf
                            <input type="hidden" name="kelas_member_uuid" value="{{ $rows->kelas_member_uuid }}">
                            <div>
                                <label for="user"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    member</label>
                                <select id="user" name="user_uuid"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($rows->joinToUser as $useruuid)
                                        <option value="{{ $rows->user_uuid }}" selected>
                                            {{ $useruuid->nama_lengkap }}
                                        </option>
                                    @endforeach
                                    @foreach ($data_user as $user)
                                        <option value="{{ $user->user_uuid }}">{{ $user->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="kelas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                <select id="kelas" name="kelas_uuid"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($rows->joinToKelas as $kelasuuid)
                                        <option value="{{ $rows->kelas_uuid }}" selected>{{ $kelasuuid->nama_kelas }}
                                        </option>
                                    @endforeach
                                    @foreach ($data_kelas as $kelas)
                                        <option value="{{ $kelas->kelas_uuid }}">{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="metode-pembayaran"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Metode pembayaran
                                </label>
                                <select id="metode-pembayaran" name="metode_pembayaran"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="{{ $rows->metode_pembayaran }}" selected>
                                        {{ $rows->metode_pembayaran }}</option>
                                    <option value="cash">Cash</option>
                                    <option value="cicil">Cicil</option>
                                </select>
                            </div>
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                                <input name="mulai" type="date" value="{{ $rows->mulai }}" id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                                <input name="selesai" type="date" value="{{ $rows->selesai }}" id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="status-kelas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Status kelas
                                </label>
                                <select id="status-kelas" name="status_kelas"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="{{ $rows->status_kelas }}" selected>{{ $rows->status_kelas }}</option>
                                    <option value="pending">Pending</option>
                                    <option value="aktif">Aktif</option>
                                </select>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                                <button data-modal-hide="modal_edit{{ $rows->kelas_member_uuid }}" type="button"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Cancel
                                </button>
                                <button data-modal-hide="modal_edit{{ $rows->kelas_member_uuid }}" type="submit"
                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end-modal edit --}}

        {{-- modal validasi --}}
        <div id="modal_validasi{{ $rows->kelas_member_uuid }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Validasi {{ $title ?? '' }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="modal_validasi{{ $rows->kelas_member_uuid }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form method="post" action="/validasikelasmember" class="max-w-sm mx-auto">
                            @csrf
                            <input type="hidden" name="kelas_member_uuid" value="{{ $rows->kelas_member_uuid }}">
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                                <input name="mulai" type="date" value="{{ $rows->mulai }}" id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="small-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                                <input name="selesai" type="date" value="{{ $rows->selesai }}" id="small-input"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="status-kelas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Status kelas
                                </label>
                                <select id="status-kelas" name="status_kelas"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="{{ $rows->status_kelas }}" selected>{{ $rows->status_kelas }}</option>
                                    <option value="pending">Pending</option>
                                    <option value="aktif">Aktif</option>
                                </select>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                                <button data-modal-hide="modal_validasi{{ $rows->kelas_member_uuid }}" type="button"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Cancel
                                </button>
                                <button data-modal-hide="modal_validasi{{ $rows->kelas_member_uuid }}" type="submit"
                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end-modal validasi --}}

        <!-- Modal hapus -->
        <div id="modal_hapus{{ $rows->kelas_member_uuid }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Hapus data
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="modal_hapus{{ $rows->kelas_member_uuid }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-2">
                        <p class="text-center text3xl">Yakin ingin menghapus data ini..?</p>
                        <!-- Modal footer -->
                        <div class="flex items-center p-2 md:p-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="modal_hapus{{ $rows->kelas_member_uuid }}" type="button"
                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                Tidak
                            </button>
                            <a href="/deletekelasmember/{{ $rows->kelas_member_uuid }}"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-1 mb-1">
                                Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-modal hapus -->
    @endforeach
@endsection
