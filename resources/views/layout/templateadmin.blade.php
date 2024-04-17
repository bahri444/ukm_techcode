<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'no title' }}</title>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/flowbite.min.css">
</head>

<body>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-blue-500 rounded-lg sm:hidden hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-200 dark:text-blue-400 dark:hover:bg-blue-700 dark:focus:ring-blue-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-blue-50 dark:bg-blue-800">
            <ul class="space-y-2 font-medium">
                @if (Auth::user()->role == 'superadmin')
                    <li>
                        <a href="/dashboard"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/ukm"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 19"
                                class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 group-hover:text-blue-900">
                                <path d="M12 2L2 12h3v8h4v-6h4v6h4v-8h3L12 2zm3 16v-6h-6v6h-3l6-6 6 6h-3z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Data ukm</span>
                        </a>
                    </li>
                    <li>
                        <a href="/homesetup"
                            class="flex items-center p-2 text-blue-900 rounded-lg hover:bg-blue-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 19"
                                class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 group-hover:text-blue-900">
                                <path d="M12 2L2 12h3v8h4v-6h4v6h4v-8h3L12 2zm3 16v-6h-6v6h-3l6-6 6 6h-3z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Home setup</span>
                        </a>
                    </li>
                    <li>
                        <a href="/saran"
                            class="flex items-center p-2 text-blue-900 rounded-lg hover:bg-blue-100 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" width="23" height="23" id="comment"
                                fill="currentColor">
                                <path
                                    d="M20 20h-4c-.6 0-1-.4-1-1s.4-1 1-1h4c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h4c.6 0 1 .4 1 1s-.4 1-1 1H4c-2.2 0-4-1.8-4-4V4c0-2.2 1.8-4 4-4h16c2.2 0 4 1.8 4 4v12c0 2.2-1.8 4-4 4z">
                                </path>
                                <path
                                    d="M12 23c-.3 0-.5-.1-.7-.3l-4-4c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l3.3 3.3 3.3-3.3c.4-.4 1-.4 1.4 0s.4 1 0 1.4l-4 4c-.2.2-.4.3-.7.3zm6-17H6c-.6 0-1-.4-1-1s.4-1 1-1h12c.6 0 1 .4 1 1s-.4 1-1 1zm-5 4H6c-.6 0-1-.4-1-1s.4-1 1-1h7c.6 0 1 .4 1 1s-.4 1-1 1zm3 4H6c-.6 0-1-.4-1-1s.4-1 1-1h10c.6 0 1 .4 1 1s-.4 1-1 1z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Saran</span>
                        </a>
                    </li>
                    <li>
                        <a href="/users"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kelas"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kategorimodul"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"
                                viewBox="0 0 512 512" fill="currentColor" id="books">
                                <path d="M157.7,452.5c-32,0-64.1,0-96.1,0c-7.3,0-14.6,0-21.9,0c-4.8,0-9.9,0.6-13.5-3.4c-4.1-4.7-2.5-14.4-2.5-20.2
                            c0-32.9,0-65.8,0-98.7c0-41.2,0-82.3,0-123.5c0-20.2-1-40.7,0-60.9c0.4-7.4,6.2-10.1,12.7-10.1c6.1,0,12.3,0,18.4,0
                            c20.3,0,40.6,0,60.8,0c13.6,0,27.3-0.3,40.9,0c11,0.2,11.1,9.5,11.1,17.6c0,29.9,0,59.8,0,89.7c0,41.8,0,83.6,0,125.4
                            c0,24.4,0.2,48.8,0,73.2C167.5,447.4,164,452.2,157.7,452.5c-9.6,0.4-9.7,15.4,0,15c13.9-0.5,24.5-11.1,24.9-25.1
                            c0.1-2.2,0-4.4,0-6.6c0-12.1,0-24.3,0-36.4c0-41.2,0-82.4,0-123.5c0-36.6,0-73.2,0-109.9c0-6.6,0.2-13.3,0-19.9
                            c-0.4-14.2-11.3-25.1-25.5-25.5c-3.9-0.1-7.9,0-11.8,0c-36.3,0-72.5,0-108.8,0c-16.5,0-27.7,11.1-27.7,27.6c0,9.8,0,19.7,0,29.5
                            c0,39.4,0,78.9,0,118.3c0,39,0,77.9,0,116.9c0,9.2,0,18.4,0,27.6c0,7.1,1.9,13.8,6.9,19.1c6,6.3,13.8,7.8,22,7.8
                            c36.7,0,73.4,0,110.1,0c3.3,0,6.7,0,10,0C167.3,467.5,167.3,452.5,157.7,452.5z"></path>
                                <path d="M254,452.5c-15.7,0-31.4,0-47.2,0c-5.2,0-12.8,1.3-17.8-0.7c-4.8-1.9-6.4-6.3-6.5-11c-0.1-22,0-44,0-66
                            c0-40.1,0-80.1,0-120.2c0-38.7,0-77.5,0-116.2c0-12.7,0-25.4,0-38c0-4.8-0.3-9.7,0-14.5c0.6-8.7,7.7-9.8,14.7-9.8
                            c9.2,0,18.4,0,27.6,0c8.6,0,17.1,0,25.7,0c6.8,0,12.9,2.7,13.3,10.5c0.8,18.4,0,37,0,55.4c0,39,0,78.1,0,117.1
                            c0,39.9,0,79.8,0,119.7c0,21,0.2,42,0,63C263.8,447.5,260.1,452.3,254,452.5c-9.6,0.4-9.7,15.4,0,15c13.9-0.5,24.5-11.1,24.9-25
                            c0.1-1.8,0-3.7,0-5.5c0-10.2,0-20.5,0-30.7c0-37.8,0-75.5,0-113.3c0-42.5,0-84.9,0-127.4c0-25.3,0-50.5,0-75.8
                            c0-2.9,0-5.7-0.6-8.7c-2.6-12.9-14.4-20-26.8-20c-18.2,0-36.3,0-54.5,0c-10.2,0-19.9,2.4-25.7,11.7c-2.9,4.6-3.7,9.8-3.7,15.1
                            c0,8.4,0,16.7,0,25.1c0,35.8,0,71.7,0,107.5c0,43.1,0,86.2,0,129.3c0,28.4,0,56.9,0,85.3c0,2.3-0.1,4.5,0,6.8
                            c0.3,10.7,6.3,20.3,16.6,24.1c6.5,2.4,14.3,1.5,21.1,1.5c10.5,0,21.1,0,31.6,0c5.7,0,11.5,0,17.2,0
                            C263.6,467.5,263.6,452.5,254,452.5z"></path>
                                <path d="M322.1,452.5c-7.6,0-15.3,0-22.9,0c-7.2,0-17.5,1.7-20-7.4c-1.2-4.5-0.4-10.1-0.4-14.6c0-27.7,0-55.5,0-83.2
                            c0-40.4,0-80.7,0-121.1c0-36.4,0-72.7,0-109.1c0-15.7-0.8-31.7,0-47.4c0.5-10.5,10.3-10.1,18.1-10.1c8.2,0,16.4-0.3,24.6,0
                            c10.5,0.3,10.4,9.3,10.4,16.9c0,25.1,0,50.3,0,75.4c0,39.6,0,79.1,0,118.7c0,37.8,0,75.6,0,113.4c0,19.3,0.2,38.5,0,57.8
                            C331.9,447.6,328.2,452.3,322.1,452.5c-9.6,0.4-9.7,15.4,0,15c13.9-0.5,24.4-11,24.9-25c0-1.6,0-3.2,0-4.8c0-9.4,0-18.9,0-28.3
                            c0-35.4,0-70.9,0-106.3c0-42.2,0-84.4,0-126.6c0-30.5,0-61,0-91.5c0-5.1,0.2-10.2,0-15.3c-0.4-14.1-11.2-24.7-25.3-25.1
                            c-8.2-0.2-16.5,0-24.8,0c-11,0-21.5,0.8-28.5,10.8c-3.3,4.8-4.5,10.3-4.5,16c0,7.5,0,15,0,22.5c0,33.3,0,66.6,0,99.9
                            c0,42.3,0,84.7,0,127c0,33,0,66,0,99.1c0,7.1-0.1,14.2,0,21.3c0,6.9,2.1,13.5,6.9,18.6c7.8,8.3,18.1,7.8,28.5,7.8
                            c7.6,0,15.3,0,22.9,0C331.7,467.5,331.7,452.5,322.1,452.5z"></path>
                                <path d="M402.4,452.5c-13.7,0-27.4,0-41.2,0c-6.9,0-13.9-1.6-14.3-10.1c-0.1-1.1,0-2.1,0-3.2c0-20.9,0-41.8,0-62.8
                            c0-35.5,0-70.9,0-106.4c0-33.2,0-66.4,0-99.6c0-10.7,0-21.4,0-32.1c0-4.3-0.5-8.9,0.1-13.1c1.1-8.1,8.6-8.7,15-8.7
                            c8.5,0,17,0,25.4,0c9.3,0,24.7-2.7,24.9,11c0.2,18.2,0,36.4,0,54.6c0,34.5,0,69,0,103.5c0,34.5,0,68.9,0,103.4
                            c0,17.6,0.2,35.3,0,52.9C412.2,447.8,408.4,452.3,402.4,452.5c-9.6,0.4-9.7,15.4,0,15c13.8-0.5,24.4-11,24.9-24.9
                            c0-1.3,0-2.7,0-4c0-8.5,0-17,0-25.5c0-32.5,0-65.1,0-97.6c0-37.5,0-75.1,0-112.6c0-23.8,0-47.5,0-71.3c0-1.6,0-3.2,0-4.8
                            c-0.3-11.4-7.7-21.7-19.1-24.5c-6.3-1.5-13.5-0.7-19.9-0.7c-8.9,0-17.8,0-26.7,0c-9.4,0-18.1,1.7-24.3,9.5
                            c-3.9,4.9-5.4,10.7-5.5,16.8c-0.1,6.8,0,13.7,0,20.5c0,30.6,0,61.1,0,91.7c0,37.9,0,75.8,0,113.7c0,26.4,0,52.8,0,79.2
                            c0,7.8-0.6,15.6,3.8,22.6c5.5,8.9,14.8,11.9,24.7,11.9c8.4,0,16.8,0,25.2,0c5.6,0,11.2,0,16.8,0
                            C412.1,467.5,412.1,452.5,402.4,452.5z"></path>
                                <path
                                    d="M478.2 452.5c-10.5 0-21.1 0-31.6 0-8.2 0-19 .8-19.3-10.5-.4-13.4 0-26.9 0-40.3 0-51.6 0-103.3 0-154.9 0-8 0-16 0-24 0-4-.7-9.2 1.4-12.8 2.7-4.7 7.4-5 12.2-5 6 0 12 0 18 0 5.7 0 11.4 0 17.1 0 5.2 0 10 1.4 11.9 6.8 1.2 3.5.6 8.2.6 11.8 0 8.2 0 16.4 0 24.7 0 25.3 0 50.7 0 76 0 26.3 0 52.7 0 79 0 12.9.5 26 0 38.9C488.1 447.9 484.1 452.3 478.2 452.5c-9.6.4-9.7 15.4 0 15 15.1-.6 25.1-12.3 25.2-27 0-6.2 0-12.4 0-18.6 0-24.9 0-49.9 0-74.8 0-43.8.6-87.6 0-131.3-.2-15.1-11.7-25.8-26.6-25.9-12-.1-23.9 0-35.9 0-6.9 0-13.3 1-19 5.5-6.2 4.9-9.3 12.1-9.6 20-.1 4.5 0 9 0 13.4 0 52.3 0 104.6 0 156.9 0 17.9 0 35.9 0 53.8 0 12.1 6 23.6 18.5 27 4.8 1.3 10 .9 15 .9 6.9 0 13.8 0 20.7 0 3.9 0 7.8 0 11.7 0C487.9 467.5 487.9 452.5 478.2 452.5zM117.9 311.4c-12.9 0-25.9 0-38.8 0-6.1 0-12.5.4-15.8-6-1.7-3.2-1.3-6.8-1.3-10.3 0-30 0-59.9 0-89.9 0-7.6-2.6-21.8 4.5-27 4.3-3.2 10.9-2.2 16-2.2 8.1 0 16.2 0 24.4 0 4.8 0 11.2-1 15.7 1 5.3 2.4 6.5 7.5 6.5 12.7 0 12.3 0 24.5 0 36.8 0 16.7 0 33.4 0 50 0 5.9 0 11.8 0 17.7 0 2.9.4 6.5-.5 9.3C127.1 308.3 122.8 311.2 117.9 311.4c-9.6.4-9.7 15.4 0 15 14.6-.5 25.8-11.6 26.2-26.3.1-3 0-6 0-9 0-16.5 0-32.9 0-49.4 0-15.8 0-31.5 0-47.3 0-4 .2-8-.5-11.9-2.2-12.7-13.6-21.2-26.1-21.5-14.3-.4-28.7-.1-43 0-11.3.1-21.4 5.9-25.7 16.7-1.9 4.8-1.9 9.7-1.9 14.7 0 32.2 0 64.4 0 96.5 0 3.6-.1 7.3 0 10.9.3 12.2 8.5 23.4 20.8 25.9 6.2 1.2 12.9.6 19.1.6 8.7 0 17.4 0 26.1 0 1.6 0 3.3 0 4.9 0C127.6 326.4 127.6 311.4 117.9 311.4zM58.5 373.6c24.7 0 49.4 0 74.2 0 9.7 0 9.7-15 0-15-24.7 0-49.4 0-74.2 0C48.8 358.6 48.8 373.6 58.5 373.6L58.5 373.6zM58.5 400.3c24.7 0 49.4 0 74.2 0 9.7 0 9.7-15 0-15-24.7 0-49.4 0-74.2 0C48.8 385.3 48.8 400.3 58.5 400.3L58.5 400.3zM58.5 427c24.7 0 49.4 0 74.2 0 9.7 0 9.7-15 0-15-24.7 0-49.4 0-74.2 0C48.8 412 48.8 427 58.5 427L58.5 427zM200.3 224.5c15.2 0 30.5 0 45.7 0 9.7 0 9.7-15 0-15-15.2 0-30.5 0-45.7 0C190.7 209.5 190.6 224.5 200.3 224.5L200.3 224.5zM200.3 251.2c15.2 0 30.5 0 45.7 0 9.7 0 9.7-15 0-15-15.2 0-30.5 0-45.7 0C190.7 236.2 190.6 251.2 200.3 251.2L200.3 251.2zM200.3 277.9c15.2 0 30.5 0 45.7 0 9.7 0 9.7-15 0-15-15.2 0-30.5 0-45.7 0C190.7 262.9 190.6 277.9 200.3 277.9L200.3 277.9zM297.9 80.2c0 46.1 0 92.2 0 138.2 0 6.5 0 13 0 19.4 0 9.7 15 9.7 15 0 0-46.1 0-92.2 0-138.2 0-6.5 0-13 0-19.4C312.9 70.6 297.9 70.6 297.9 80.2L297.9 80.2zM297.9 270.4c0 14.1 0 28.2 0 42.3 0 9.7 15 9.7 15 0 0-14.1 0-28.2 0-42.3C312.9 260.8 297.9 260.7 297.9 270.4L297.9 270.4zM297.9 358.8c0 18.8 0 37.6 0 56.4 0 9.7 15 9.7 15 0 0-18.8 0-37.6 0-56.4C312.9 349.1 297.9 349.1 297.9 358.8L297.9 358.8zM419.8 147c-26.8 0-53.6 0-80.4 0-9.7 0-9.7 15 0 15 26.8 0 53.6 0 80.4 0C429.5 162 429.5 147 419.8 147L419.8 147z">
                                </path>
                                <path
                                    d="M419.8 181.3c-26.8 0-53.6 0-80.4 0-9.7 0-9.7 15 0 15 26.8 0 53.6 0 80.4 0C429.5 196.3 429.5 181.3 419.8 181.3L419.8 181.3zM366.4 346.9c8.8 0 17.6 0 26.4 0 9.7 0 9.7-15 0-15-8.8 0-17.6 0-26.4 0C356.8 331.9 356.8 346.9 366.4 346.9L366.4 346.9z">
                                </path>
                                <g>
                                    <path
                                        d="M366.4,373.6c8.8,0,17.6,0,26.4,0c9.7,0,9.7-15,0-15c-8.8,0-17.6,0-26.4,0C356.8,358.6,356.8,373.6,366.4,373.6 L366.4,373.6z">
                                    </path>
                                </g>
                                <g>
                                    <path
                                        d="M366.4,400.3c8.8,0,17.6,0,26.4,0c9.7,0,9.7-15,0-15c-8.8,0-17.6,0-26.4,0C356.8,385.3,356.8,400.3,366.4,400.3 L366.4,400.3z">
                                    </path>
                                </g>
                                <g>
                                    <path
                                        d="M495.9 222.4c-25.4 0-50.7 0-76.1 0-9.7 0-9.7 15 0 15 25.4 0 50.7 0 76.1 0C505.5 237.4 505.5 222.4 495.9 222.4L495.9 222.4zM495.9 256.8c-25.4 0-50.7 0-76.1 0-9.7 0-9.7 15 0 15 25.4 0 50.7 0 76.1 0C505.5 271.8 505.5 256.8 495.9 256.8L495.9 256.8z">
                                    </path>
                                </g>
                                <g>
                                    <path
                                        d="M495.9 358.6c-25.4 0-50.7 0-76.1 0-9.7 0-9.7 15 0 15 25.4 0 50.7 0 76.1 0C505.5 373.6 505.5 358.6 495.9 358.6L495.9 358.6zM495.9 393c-25.4 0-50.7 0-76.1 0-9.7 0-9.7 15 0 15 25.4 0 50.7 0 76.1 0C505.5 408 505.5 393 495.9 393L495.9 393z">
                                    </path>
                                </g>
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Kategori modul</span>
                        </a>
                    </li>
                    <li>
                        <a href="/modul"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"
                                viewBox="0 0 512 512" id="book"
                                class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white">
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10"
                                    d="M52.655 360.043c37.609 3.443 76.534 13.048 115.294 28.813V429.4L9 401.127V64.931l43.655 7.758V360.043zM255.904 436.516v8.526l-31.946-5.684v-23.275c10.714 6.078 21.345 12.643 31.883 19.686v.83C255.862 436.568 255.883 436.547 255.904 436.516z">
                                </path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10"
                                    d="M257.099 117.709v318.893l-.598-.105-.344-.06-.179-.03-.075-.015-.06-.015V119.205c.015-.03.045-.06.06-.09v-1.616l.09.015.165.03.344.06.404.075L257.099 117.709zM83.761 326.553c24.644-.529 54.349 7.883 84.189 25.235v37.069c-38.76-15.765-77.686-25.37-115.294-28.813V41.159c10.279.933 20.661 2.344 31.105 4.211C83.761 45.37 83.761 326.553 83.761 326.553zM255.841 434.701v1.068c-10.538-7.043-21.169-13.608-31.883-19.686v-20.194C235.17 407.391 245.905 420.335 255.841 434.701z">
                                </path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10" d="
                            M257.099,117.709v318.893c-0.09-0.06-0.165-0.119-0.254-0.165c-0.119-0.09-0.224-0.165-0.344-0.24
                            c-0.09-0.06-0.179-0.119-0.27-0.165c-0.105-0.09-0.224-0.165-0.329-0.224c-0.015-0.015-0.045-0.03-0.06-0.045V119.205
                            c0.015-0.03,0.045-0.06,0.06-0.09v-1.721c-0.195-0.3-0.389-0.598-0.613-0.883c0.21,0.119,0.403,0.254,0.613,0.403
                            c0.194,0.119,0.403,0.254,0.598,0.389c0.119,0.075,0.224,0.149,0.344,0.24c0.03,0.015,0.075,0.045,0.105,0.06
                            C256.995,117.65,257.055,117.68,257.099,117.709z"></path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10"
                                    d="
                            M255.904,117.392v1.722c-0.021,0.031-0.041,0.062-0.062,0.093V434.7c-9.936-14.365-20.671-27.309-31.883-38.812
                            c-17.871-18.338-36.966-33.045-56.008-44.101c-29.84-17.352-59.545-25.764-84.189-25.235V9.151
                            c47.949-1.006,115.076,31.811,165.1,98.44c2.178,2.904,4.335,5.881,6.431,8.92C255.509,116.801,255.707,117.092,255.904,117.392z">
                                </path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10" d="
                            M257.16,119.205v317.396c-0.015-0.03-0.045-0.06-0.06-0.09c-0.03-0.03-0.045-0.075-0.075-0.105
                            c-0.09-0.119-0.165-0.254-0.254-0.374c-0.09-0.135-0.179-0.254-0.27-0.374c-0.195-0.299-0.389-0.583-0.598-0.868
                            c0-0.03-0.03-0.06-0.06-0.09V119.205c0.015-0.03,0.045-0.06,0.06-0.09v-1.721c0.045,0.045,0.075,0.075,0.09,0.119
                            c0.03,0.03,0.045,0.06,0.06,0.09c0.03,0.03,0.045,0.045,0.045,0.075c0.149,0.195,0.284,0.389,0.403,0.584
                            c0.21,0.284,0.403,0.568,0.598,0.853C257.114,119.145,257.144,119.175,257.16,119.205z">
                                </path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10" d="
                            M504,64.927V401.13l-246.901,43.91v-8.528c0.015,0.03,0.045,0.06,0.06,0.09v-0.838c66.397-44.389,136.848-69.643,203.185-75.717
                            V72.691L504,64.927z"></path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10" d="
                            M257.16,119.205v317.172l-0.06,0.015l-0.075,0.015l-0.179,0.03l-0.344,0.06l-0.598,0.105V117.709l0.194-0.03l0.403-0.075
                            l0.344-0.06l0.165-0.03l0.09-0.015v1.616C257.114,119.145,257.144,119.175,257.16,119.205z">
                                </path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10" d="
                            M460.344,41.154v318.893c-66.337,6.074-136.788,31.328-203.185,75.717v-1.062c50.598-73.174,121.857-109.215,172.081-108.153
                            V45.373C439.683,43.503,450.066,42.096,460.344,41.154z"></path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10" d="
                            M257.099,119.115c0.015,0.03,0.045,0.06,0.06,0.09v316.558c-0.015,0.015-0.045,0.03-0.06,0.045
                            c-0.105,0.06-0.224,0.135-0.329,0.224c-0.09,0.045-0.179,0.105-0.27,0.165c-0.119,0.075-0.224,0.149-0.344,0.24
                            c-0.09,0.045-0.165,0.105-0.254,0.165V117.709c0.045-0.03,0.105-0.06,0.149-0.105c0.03-0.015,0.075-0.045,0.105-0.06
                            c0.119-0.09,0.224-0.165,0.344-0.24c0.195-0.135,0.403-0.27,0.598-0.389c0.21-0.149,0.404-0.284,0.613-0.403
                            c-0.224,0.284-0.419,0.583-0.613,0.883v1.72H257.099z"></path>
                                <path fill="currentColor" stroke="#ffffff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10"
                                    d="M429.24 9.152v317.396c-50.224-1.062-121.483 34.978-172.081 108.153V119.205c-.015-.03-.045-.06-.06-.09v-1.721c.195-.3.389-.598.613-.883 2.11-3.037 4.249-6.015 6.448-8.917C314.175 40.96 381.291 8.15 429.24 9.152zM223.958 395.889v107.982l-28.004-28.004-28.004 28.004V351.787C186.993 362.844 206.087 377.551 223.958 395.889z">
                                </path>
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Modul</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kelasmember"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="group-class"
                                fill="currentColor">
                                <path
                                    d="M11 9a3 3 0 1 1 3-3 3 3 0 0 1-3 3Zm13-3a3 3 0 1 0-3 3 3 3 0 0 0 3-3ZM9.27 12.28a10 10 0 0 1 1.91.66A10.24 10.24 0 0 1 16 17.69c.06-.13.13-.26.2-.39a10.24 10.24 0 0 1 6.53-5 9.71 9.71 0 0 1 2.33-.3h.52A5 5 0 0 0 16 14a5 5 0 0 0-9.58-2h.52a9.71 9.71 0 0 1 2.33.28Zm13.69 1a9.19 9.19 0 0 0-5.88 4.52 9 9 0 0 0-.78 2c1.51-1.78 4.26-3.1 7.68-3.56a18.79 18.79 0 0 1 2.59-.24H28v-3h-2.94a9.08 9.08 0 0 0-2.06.25ZM8 16.18c3.42.46 6.17 1.78 7.69 3.56a9.18 9.18 0 0 0-4.94-5.89 8.77 8.77 0 0 0-1.75-.6A9.08 9.08 0 0 0 6.94 13H4v3h1.43a18.54 18.54 0 0 1 2.57.18Zm18.57.82a17.67 17.67 0 0 0-2.45.17c-4.27.58-7.54 2.63-8 5.16A3.42 3.42 0 0 0 16 23a3.42 3.42 0 0 0-.07-.71c-.51-2.53-3.78-4.58-8-5.16a17.67 17.67 0 0 0-2.5-.13H2v13h28V17Z"
                                    data-name="11-group class"></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Kelas member</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kategorikegiatan"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="activity">
                                <rect width="256" height="256" fill="none"></rect>
                                <polyline fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="24"
                                    points="24.002 128 56.002 128 96.002 40 160.002 208 200.002 128 232.002 128">
                                </polyline>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Kategori kegiatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kegiatan"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="activity">
                                <rect width="256" height="256" fill="none"></rect>
                                <polyline fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="24"
                                    points="24.002 128 56.002 128 96.002 40 160.002 208 200.002 128 232.002 128">
                                </polyline>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Kegiatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/bidang"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 50 50"
                                viewBox="0 0 50 50" id="graduation" fill="currentColor">
                                <path
                                    d="M29.2211 28.939h-2.5022c.3372.5874.6854 1.1858 1.0335 1.7733-.5222.6201-1.0553 1.2619-1.5775 1.9038h-2.1758c-.5875-.6528-1.1641-1.2837-1.7733-1.9365.3699-.5874.6963-1.1641 1.0444-1.7406h-2.4804c-5.5375 0-10.5636 2.2411-14.1863 5.8747-3.6337 3.6337-5.8747 8.6489-5.8747 14.1864h48.5426C49.2713 37.9252 40.296 28.939 29.2211 28.939zM24.9782 46.5632v.0326c-1.1314-1.5557-2.252-3.1005-3.3834-4.6345.7833-3.0352 1.5557-6.0705 2.3281-9.1058h2.0779c.805 3.0461 1.5993 6.0815 2.4043 9.1276C27.2629 43.517 26.1206 45.0401 24.9782 46.5632zM15.906 17.3827c.1803 4.8732 4.1769 8.7713 9.0941 8.7713s8.9138-3.8981 9.0941-8.7713H15.906zM33.7032 13.5111">
                                </path>
                                <path
                                    d="M25.0227,1.0002L8.1602,8.4342l8.25,3.6717L16.386,14.599h17.0371l-0.105-2.5838l6.482-2.7238v9.3422
                            c-1.5055,0.4667-2.6064,1.8538-2.6064,3.5127v3.3318h7.3887v-3.3318c0-1.659-1.1009-3.046-2.6064-3.5127V8.4455">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Bidang</span>
                        </a>
                    </li>
                    <li>
                        <a href="/profesi"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 50 50"
                                viewBox="0 0 50 50" id="graduation" fill="currentColor">
                                <path
                                    d="M29.2211 28.939h-2.5022c.3372.5874.6854 1.1858 1.0335 1.7733-.5222.6201-1.0553 1.2619-1.5775 1.9038h-2.1758c-.5875-.6528-1.1641-1.2837-1.7733-1.9365.3699-.5874.6963-1.1641 1.0444-1.7406h-2.4804c-5.5375 0-10.5636 2.2411-14.1863 5.8747-3.6337 3.6337-5.8747 8.6489-5.8747 14.1864h48.5426C49.2713 37.9252 40.296 28.939 29.2211 28.939zM24.9782 46.5632v.0326c-1.1314-1.5557-2.252-3.1005-3.3834-4.6345.7833-3.0352 1.5557-6.0705 2.3281-9.1058h2.0779c.805 3.0461 1.5993 6.0815 2.4043 9.1276C27.2629 43.517 26.1206 45.0401 24.9782 46.5632zM15.906 17.3827c.1803 4.8732 4.1769 8.7713 9.0941 8.7713s8.9138-3.8981 9.0941-8.7713H15.906zM33.7032 13.5111">
                                </path>
                                <path
                                    d="M25.0227,1.0002L8.1602,8.4342l8.25,3.6717L16.386,14.599h17.0371l-0.105-2.5838l6.482-2.7238v9.3422
                            c-1.5055,0.4667-2.6064,1.8538-2.6064,3.5127v3.3318h7.3887v-3.3318c0-1.659-1.1009-3.046-2.6064-3.5127V8.4455">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Profesi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/logout"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 18 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                        </a>
                    </li>
                @elseif (Auth::user()->role == 'member')
                    <li>
                        <a href="/index"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/myprofile"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">My profile</span>
                        </a>
                    </li>
                    @if (Auth::user()->status_anggota == 'aktif')
                        <li>
                            <a href="/mykelas"
                                class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="group-class"
                                    fill="currentColor">
                                    <path
                                        d="M11 9a3 3 0 1 1 3-3 3 3 0 0 1-3 3Zm13-3a3 3 0 1 0-3 3 3 3 0 0 0 3-3ZM9.27 12.28a10 10 0 0 1 1.91.66A10.24 10.24 0 0 1 16 17.69c.06-.13.13-.26.2-.39a10.24 10.24 0 0 1 6.53-5 9.71 9.71 0 0 1 2.33-.3h.52A5 5 0 0 0 16 14a5 5 0 0 0-9.58-2h.52a9.71 9.71 0 0 1 2.33.28Zm13.69 1a9.19 9.19 0 0 0-5.88 4.52 9 9 0 0 0-.78 2c1.51-1.78 4.26-3.1 7.68-3.56a18.79 18.79 0 0 1 2.59-.24H28v-3h-2.94a9.08 9.08 0 0 0-2.06.25ZM8 16.18c3.42.46 6.17 1.78 7.69 3.56a9.18 9.18 0 0 0-4.94-5.89 8.77 8.77 0 0 0-1.75-.6A9.08 9.08 0 0 0 6.94 13H4v3h1.43a18.54 18.54 0 0 1 2.57.18Zm18.57.82a17.67 17.67 0 0 0-2.45.17c-4.27.58-7.54 2.63-8 5.16A3.42 3.42 0 0 0 16 23a3.42 3.42 0 0 0-.07-.71c-.51-2.53-3.78-4.58-8-5.16a17.67 17.67 0 0 0-2.5-.13H2v13h28V17Z"
                                        data-name="11-group class"></path>
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Kelas saya</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="/logout"
                            class="flex items-center p-2 text-blue-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-blue-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-500 transition duration-75 dark:text-blue-400 group-hover:text-blue-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 18 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        @yield('content')
    </div>

    <script src="{{ asset('assets') }}/js/flowbite.min.js"></script>
</body>

</html>
