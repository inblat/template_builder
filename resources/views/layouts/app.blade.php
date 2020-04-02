<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ $page->title }}</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" media="screen">
        <meta charset="utf-8">
        <meta name="robots" content="index, follow">
        <meta name="description" content="{{ $page->keywords }}">
        <meta name="description" content="✓ {{ $page->description }}► ¡!">
        @include('components.head_meta')
        {{--<link media="print" rel="stylesheet" href="{{asset('css/print.css')}}" type="text/css">--}}
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="propeller" content="b01b4f0c3999504db9a5dd3ffc7990cb">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        @if (env('APP_ENV') === 'prod')
        <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130172618-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-130172618-1');
            </script>
        @endif
    </head>
    <body class="bg-light">
        @include('components.navbar')






        <div role="main" class="container" id="app">

            @yield('content')
            <div class="clearfix"></div>
        </div>
        <div role="main" class="container">
            @yield('view')
        </div>
        @include('components.footer')
        <script src="{{asset('js/app.js')}}"></script>
        {{--<script type="text/javascript" src="//dolohen.com/apu.php?zoneid=2495302" async data-cfasync="false"></script>--}}
        {{--<script src="//epu.sh/ntfc.php?p=2495308" data-cfasync="false" async></script>--}}
    </body>
</html>
