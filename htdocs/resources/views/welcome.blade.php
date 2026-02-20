<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    
    <title>SIMANG - IKPP Perawang</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-50 text-gray-800 font-sans">

    <nav class="bg-white shadow-sm fixed w-full z-50 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                
                <div class="flex-shrink-0 flex items-center gap-2 overflow-hidden">
                    {{-- Logo IKPP --}}
                    <img src="{{ asset('images/logo ikpp.png') }}" alt="Logo IKPP" class="h-8 md:h-10 w-auto">
                    {{-- Logo Simang --}}
                    <img src="{{ asset('images/logo simang.png') }}" alt="Logo Simang" class="h-8 md:h-10 w-auto">
                    {{-- Teks Judul (Disembunyikan di HP biar gak penuh, Muncul di Laptop) --}}
                    <span class="hidden md:block font-bold text-xl tracking-tight text-blue-900 ml-2">SIMANG IKPP</span>
                </div>

                <div class="hidden md:flex md:items-center space-x-4">
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-900 px-3 py-2 rounded-md text-sm font-bold transition border-b-2 border-transparent hover:border-blue-900">
                        Tentang Kami
                    </a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="text-blue-900 font-bold px-3 py-2">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-900 px-3 py-2 font-semibold">Masuk</a>
                            <a href="{{ route('register') }}" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm font-semibold shadow-md">Daftar</a>
                        @endauth
                    @endif
                </div>
                
                </div>
        </div>
    </nav>

    <div class="relative pt-24 pb-16 md:pt-32 md:pb-24 flex content-center items-center justify-center min-h-screen">
        
        <div class="absolute top-0 w-full h-full bg-center bg-cover" 
             style="background-image: url('{{ asset('images/ikpp.jpg') }}');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-gradient-to-br from-blue-900 to-gray-900"></span>
        </div>
        
        <div class="container relative mx-auto px-4">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-8/12 px-4 ml-auto mr-auto text-center">
                    
                    <h1 class="text-white font-bold text-4xl md:text-6xl drop-shadow-lg leading-tight">
                        Sistem Informasi Magang
                    </h1>
                    <h2 class="mt-4 text-xl md:text-2xl text-blue-200 font-semibold drop-shadow-md">
                        PT. Indah Kiat Pulp & Paper - Perawang
                    </h2>
                    <p class="mt-4 text-base md:text-lg text-gray-300 max-w-2xl mx-auto">
                        Platform terintegrasi untuk pendaftaran, pengelolaan, dan pelaporan kegiatan magang mahasiswa secara digital, transparan, dan efisien.
                    </p>
                    
                    <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4 px-4 w-full">
                        @auth
                            <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="w-full sm:w-auto bg-white text-blue-900 font-bold px-8 py-4 rounded shadow-lg hover:bg-gray-100 transition duration-300 text-center">
                                Buka Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="w-full sm:w-auto bg-blue-600 text-white font-bold px-8 py-4 rounded shadow-lg hover:bg-blue-500 transition duration-300 text-center">
                                Daftar Sekarang
                            </a>
                            <a href="{{ route('login') }}" class="w-full sm:w-auto bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded shadow-lg hover:bg-white hover:text-blue-900 transition duration-300 text-center">
                                Login Masuk
                            </a>
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="pb-20 bg-gray-100 -mt-16 relative z-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center">
                
                <div class="w-full md:w-4/12 px-4 text-center mb-8 md:mb-0">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full shadow-xl rounded-lg transform hover:-translate-y-2 transition duration-300">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <h6 class="text-xl font-semibold">Registrasi Mudah</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Mahasiswa dapat mendaftar akun secara mandiri & cepat.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-4/12 px-4 text-center mb-8 md:mb-0">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full shadow-xl rounded-lg transform hover:-translate-y-2 transition duration-300 mt-0 md:-mt-10">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <h6 class="text-xl font-semibold">Administrasi Digital</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Pemberkasan & laporan magang full online (Paperless).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full shadow-xl rounded-lg transform hover:-translate-y-2 transition duration-300">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h6 class="text-xl font-semibold">Terverifikasi</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Data aman dan tervalidasi oleh sistem perusahaan.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="bg-gray-200 py-6 mt-10">
        <div class="container mx-auto px-4 text-center">
            <div class="text-sm text-gray-600 font-semibold">
                Copyright © {{ date('Y') }} SIMANG - PT Indah Kiat Pulp & Paper Tbk.
            </div>
        </div>
    </footer>

</body>
</html>