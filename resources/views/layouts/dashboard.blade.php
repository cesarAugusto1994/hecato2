<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="">
        <meta name="author" content="Cesar Augusto">
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        {!! HTML::style('https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,400,100,300,600,700', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
        {!! HTML::style(asset('https://fonts.googleapis.com/icon?family=Material+Icons'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
        @yield('template_linked_fonts')

        {{-- MDL CSS Library --}}
        @if (Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null')
            <link rel="stylesheet" type="text/css" href="{{ asset('css/mdl-themes/' . $theme->link) }}" id="user_theme_link">
        @else
            <link rel="stylesheet" type="text/css" href="{{ asset('css/mdl-themes/material.min.css') }}" id="user_theme_link">
        @endif

        {{-- Custom App Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/material-datetime-picker.css') }}" rel="stylesheet">

        @yield('template_linked_css')

        <!--<link href="{{ asset('css/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/_materialFullCalendar.css') }}" rel="stylesheet">
      -->
        <link href="{{ asset('css/getmdl-select.css') }}" rel="stylesheet">
        <link href="{{ asset('css/material-datetime-picker.css') }}" rel="stylesheet">

        <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.3.0/fullcalendar.min.css" rel="stylesheet">


        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

            .mdl-button--file {
                input {
                  cursor: pointer;
                  height: 100%;
                  right: 0;
                  opacity: 0;
                  position: absolute;
                  top: 0;
                  width: 300px;
                  z-index: 4;
                }
              }

              .mdl-textfield--file {
                .mdl-textfield__input {
                  box-sizing: border-box;
                  width: calc(100% - 32px);
                }
                .mdl-button--file {
                  right: 0;
                }
              }

        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @yield('head')



    </head>
    <body class="mdl-color--grey-100">

        <div id="app" class="demo-layout dashboard-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            @include('partials.form-status')
            @yield('template-form-status')

            <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                <div class="mdl-layout__header-row">

                    <span class="mdl-layout-title">

                        @yield('header')

                    </span>

                    <div class="mdl-layout-spacer"></div>

                    {{--
                        @include('partials.search-bar')
                    --}}

                    @include('partials.header-nav')

                </div>
            </header>

            @include('partials.drawer-nav')

            <main class="mdl-layout__content mdl-color--grey-100">

                <nav class="breadcrumb">
                    <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                        @yield('breadcrumbs')
                    </ul>
                </nav>

                <div class="mdl-grid margin-top-0 padding-top-0">

                    @yield('content')

                </div>
            </main>
        </div>

        {{-- Scripts --}}
        {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', array('type' => 'text/javascript')) !!}
        {!! HTML::script('//code.getmdl.io/1.1.3/material.min.js', array('type' => 'text/javascript')) !!}
        {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.4/dialog-polyfill.min.js', array('type' => 'text/javascript')) !!}

        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ mix('/js/mdl.js') }}"></script>

        {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.js', array('type' => 'text/javascript')) !!}
        {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js', array('type' => 'text/javascript')) !!}
        {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js', array('type' => 'text/javascript')) !!}

        {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.3.0/fullcalendar.min.js', array('type' => 'text/javascript')) !!}

        <script async src="{{ asset('/js/material-datetime-picker.js') }}"></script>

        <script>

            $(function() {
              $('.date').mask('00/00/0000');
              $('.datetime').mask('00/00/0000 00:00');
            })

        </script>

        <script>
            $('div.message').not('.alert-important').delay(3000).fadeOut(350);
        </script>

        <script src="//maps.googleapis.com/maps/api/js?key={{ env('GOOGLEMAPS_API_KEY') }}&libraries=places&dummy=.js"></script>

        @yield('footer_scripts')

    </body>
</html>
