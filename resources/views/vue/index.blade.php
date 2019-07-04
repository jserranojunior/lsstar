<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LS STAR</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />        <!-- Fontastic Custom icon font-->
        <link rel="stylesheet" href="tema/assets/css/fontastic.css">
        <!-- Google fonts - Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <!-- jQuery Circle-->
        <!-- <link rel="stylesheet" href="tema/assets/css/grasp_mobile_progress_circle-1.0.0.min.css"> -->
        <!-- Custom Scrollbar-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="tema/assets/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="tema/assets/css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/lsstar.png">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
        <body>
            <div id="appvue">
                <app></app>
            </div>
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> </script> -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
                <!-- <script src="tema/assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script> -->
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"> </script> -->
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
                <!-- <script src="tema/assets/js/charts-home.js"></script> -->
                <!-- Main File-->
                <!-- <script src="tema/assets/js/front.js"></script> -->

                <script>
                 $(document).ready(function () {
                    if ($(window).outerWidth() > 992) {
                        $("nav.side-navbar").mCustomScrollbar({
                            scrollInertia: 200
                        });
                    } 

                    // ToggleMenu Lateral
                $('#toggle-btn').on('click', function (e) {
                    e.preventDefault();
                    if ($(window).outerWidth() > 1194) {
                        $('nav.side-navbar').toggleClass('shrink');
                        $('.page').toggleClass('active');
                    } else {
                        $('nav.side-navbar').toggleClass('show-sm');
                        $('.page').toggleClass('active-sm');
                    }
                    });
                });

                
                </script>
               
            
            <!-- <script src="tema/assets/js/main.js"></script> -->
        <script src="{{ URL::asset('/js/newmain.js') }}"></script>
        </body>
</html>