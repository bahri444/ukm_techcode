@extends('layout.templatelandingpage')
@section('content')
    <div class="mx-auto mt-8 max-w-2xl p-6 bg-blue-50 border border-gray-200 rounded-lg shadow">
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
        <!-- ICON SVG -->
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" data-name="Layer 2" viewBox="0 0 48 48"
                stroke="currentColor" width="100" height="100" class="text-blue-600 mx-auto" id="graduate">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M30.877 32.005a3.4 3.4 0 0 0-1.743-.355 3.072 3.072 0 0 0-.95.25l3.039 1.227a29.512 29.512 0 0 0-2.454 3.386A12.315 12.315 0 0 0 27.5 39.156a5.219 5.219 0 0 0-.321 2.324c1.45-.324 2.984-1.92 3.975-3.83a7.353 7.353 0 0 0 .978-4.018A2.218 2.218 0 0 0 30.877 32.005zM10.372 16.634v4.915L27.235 27.56h.01a33.269 33.269 0 0 0 3.861-.22c3.287-.48 5.416-1.4 5.416-2.368v-8.1L26.17 20.38z">
                </path>
                <polygon points="22.32 6.46 0 12.575 10.372 15.027 26.097 18.753 36.522 15.226 48 11.333 22.32 6.46">
                </polygon>
                <path
                    d="M25.7,39.768c.021-.1.042-.219.062-.344s.063-.271.115-.417l.032-.094A15.359,15.359,0,0,1,27.433,35.7a16.88,16.88,0,0,1,1.252-1.826.419.419,0,0,0,.042-.063l-2.056-.824a7.6,7.6,0,0,0-1.221,1.7,13.808,13.808,0,0,0-1.114,2.423L.532,26.5l-.146.637c-.2.981-.146,2.024.491,2.285L25.983,41.375C25.638,41.114,25.555,40.54,25.7,39.768Z">
                </path>
                <polygon points=".045 24.569 .047 24.565 .041 24.562 .045 24.569"></polygon>
                <path
                    d="M24.058 33.967c1.418-2.731 3.907-4.3 5.823-3.791l-.075-.028L3.581 20.786c-.975-.415-2.372.689-3.141 2.5a6.193 6.193 0 0 0-.393 1.28L23.579 35.052A9.347 9.347 0 0 1 24.058 33.967zM45.256 17.646V13.921l-1.566.522v3.2a1.881 1.881 0 0 0-1.116 1.722v1.325a1.894 1.894 0 1 0 3.788 0V19.368A1.872 1.872 0 0 0 45.256 17.646z">
                </path>
            </svg>
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-slate-900">
                SIGN IN <br />
                UKM TECHCODE
            </h2>
        </div>
        <!-- END ICON SVG -->
        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/postlogin" method="POST">
                @csrf
                <!-- INPUT EMAIL -->
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-slate-900">Username</label>
                    <div class="mt-2">
                        <input id="email" name="kode_member" type="text" autocomplete="email" required
                            placeholder="masukkan username"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-slate-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            autofocus />
                    </div>
                </div>
                <!-- INPUT PASSWORD -->
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-slate-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            placeholder="masukkan password"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-slate-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
                <!-- BUTTON SUBMIT -->
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gradient-to-r from-cyan-500 to-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Sign in
                    </button>
                </div>
            </form>
            <!-- LINK FORGOT AND REGISTER -->
            <div>
                <div class="mt-5 text-sm text-slate-500 flex items-center justify-between">
                    <div class="mx-auto text-center">
                        <p>
                            Dont have an account?
                            <a href="/register"
                                class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register</a>
                        </p>
                    </div>
                </div>
                {{-- <div class="text-sm text-center">
                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
