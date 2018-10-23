<html>
    <head>
        <title>VDLAP</title>

        @extends('includes.styles')
        
        @extends('includes.scripts')



        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{{ url('/img/lsstar.png') }}}">
    </head>
   <body class="hold-transition skin-blue sidebar-mini">
       
      
            @yield('content')

            <div id="rodape">

            </div>