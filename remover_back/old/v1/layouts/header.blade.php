<!DOCTYPE html>
<html>

<head>
    <title>LS STAR</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{{ url('/img/lsstar.png') }}}">

    <!-- {{--  CSS  --}} -->
    @extends('includes.styles')
    <!-- {{--  CSS  --}} -->

    

     <!-- JS -->
     @extends('includes.scripts')
     <!-- JS -->
    

    <!-- {{--  <script src="{{URL::asset('/js/all.js')}}" type="text/javascript"></script>  --}} -->
</head>

<body class="skin-blue">   
    
    <div class="myappvue" id="myappvue">       


        <div class="wrapper">
            
            <sidebar-menu-top></sidebar-menu-top>
          
            
                        @extends('layouts.sidebar')
                
            
            <!-- FIM BARRA LATERAL -->
    
            <div class="content-wrapper" id="">
                <div class="content">
                    @yield('content')
                    <div id="rodape">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="{{ URL::asset('/js/main.js') }}"></script>
   
</body>
</html>