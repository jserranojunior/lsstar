<!DOCTYPE html>
<html>

<head>
    <title>LS STAR</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(url('/img/lsstar.png')); ?>">

    <!--  -->
    
    <!--  -->

    

     <!-- JS -->
     
     <!-- JS -->
    

    <!--  -->
</head>

<body class="skin-blue">   
    
    <div class="myappvue" id="myappvue">       


        <div class="wrapper">
            
            <sidebar-menu-top></sidebar-menu-top>
          
            
                        
                
            
            <!-- FIM BARRA LATERAL -->
    
            <div class="content-wrapper" id="">
                <div class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                    <div id="rodape">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="<?php echo e(URL::asset('/js/main.js')); ?>"></script>
   
</body>
</html>
<?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>