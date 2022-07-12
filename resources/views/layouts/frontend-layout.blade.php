<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | {{ $title }}</title>

    <!--css-->
    <x-frontend.css />

    <!--style-->
    @stack('style')

</head>

<body>

    <!--Header-->
    <x-frontend.header />

    <!--hero-->
    @isset($hero)
        {{ $hero }}
    @endisset

    <main id="main">

        {{ $slot }}

    </main>

    <!--Footer-->
    @isset($footer)
        {{ $footer }}
    @endisset

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!--JS-->
    <x-frontend.js />

    <!--script-->
    @stack('script')

</body>

</html>
