<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <!-- css -->
    <x-auth.css />

    <!--style-->
    @stack('style')

</head>

<body>
    <div id="app">
        <section class="section">

            <!-- content -->
            {{ $slot }}

        </section>

        <!--modal-->
        @stack('modal')

    </div>

    <!-- js -->
    <x-auth.js />

    <!-- custom script -->
    @stack('script')

</body>

</html>
