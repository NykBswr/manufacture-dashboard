<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Manufacture Dashboard</title>
    {{-- CSS Tailwind --}}
    @vite('resources/css/app.css')
    <!-- End layout styles -->

    <link rel="icon" href="{{ asset('img/LogoWhite.svg') }}" />

</head>

<body class="h-auto w-screen bg-white">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    @yield('container')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
