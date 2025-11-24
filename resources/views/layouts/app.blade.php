<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        
        @include('layouts.sidebar')

        <div class="p-4 sm:ml-64">
            <header class="mb-4 bg-white shadow rounded-lg p-4 flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{-- Menangkap Header dari slot, kalau tidak ada pakai default --}}
                    {{ $header ?? 'SIM Inventaris' }}
                </h2>
                <div class="text-sm text-gray-500">
                    Hi, {{ Auth::user()->name }}
                </div>
            </header>

            <main>
                @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
        <p class="font-bold">Sukses</p>
        <p>{{ session('success') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
        <p class="font-bold">Terjadi Kesalahan</p>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                {{ $slot }}
            </main>
        </div>
    </body>
</html>