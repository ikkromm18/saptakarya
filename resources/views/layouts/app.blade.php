<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="{{ $metaDescription ?? 'Saptakarya — Solusi Cetak & Sablon Berkualitas dengan Harga Terjangkau. Cetak banner, brosur, stiker, undangan, dan sablon kaos.' }}">
    <title>{{ $title ?? 'Saptakarya' }} | Solusi Cetak & Sablon Berkualitas</title>

    {{-- Preconnect for fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 antialiased">

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

</body>

</html>
