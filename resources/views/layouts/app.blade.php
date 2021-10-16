<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="url" content="{{ url('') }}">

        <title>{{ config('app.name', 'SchoolQuiz') }}</title>
        <link rel="icon" href="{!! url('images/school_quiz1.png') !!}" type = "image/x-icon">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="{{ url('bootstrap4.6.0/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="{{ url('css/admin.css') }}">
        <link rel="stylesheet" href="{{ url('css/user.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->
        <script src="{{ url('bootstrap4.6.0/js/bootstrap.min.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $('meta[name=url]').attr('content');
        </script>
        <script src="{{ url('/js/home.js') }}"></script>
        <script src="{{ url('/js/contact-us.js') }}"></script>
        <script src="{{ url('/js/quiz-admin.js') }}"></script>
        <script src="{{ url('/js/quiz-user.js') }}"></script>

    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen">

            <!-- loading -->
            <div class="loading">
                <img class="w-40 m-auto" src="{{ url('images/loading.gif') }}" alt="loading">
            </div>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow position-relative">
                    <div class="max-w-7xl mx-auto py-3 px-4">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="position-relative">
                {{ $slot }}
            </main>

        </div>
        <footer class="position-relative bg-dark p-3 px-5 w-100 text-right shadow footer">
            <i class="fas fa-phone-alt text-white mr-2"></i>
            <a href="/home/contact-page" class="text-white">Contact us</a>
        </footer>
        @stack('modals')

        @livewireScripts
    </body>
</html>
