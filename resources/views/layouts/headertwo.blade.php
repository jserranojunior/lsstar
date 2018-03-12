<html>
    <head>
        <title>VDLAP</title>

        <link rel="stylesheet" href="{{ URL::asset('/css/all.css') }}">
        <script src="{{URL::asset('/js/all.js')}}" type="text/javascript"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="pt-br">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
   <body class="hold-transition skin-blue sidebar-mini">
       
      
            @yield('content')

            <div id="rodape">

            </div>