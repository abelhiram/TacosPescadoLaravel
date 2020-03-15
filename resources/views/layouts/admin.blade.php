<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Usuario - {{ Auth::user()->name }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="https://colorlib.com/polygon/notika/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="https://colorlib.com/polygon/notika/css/font-awesome.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="https://colorlib.com/polygon/notika/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="https://colorlib.com/polygon/notika/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="https://colorlib.com/polygon/notika/style.css">

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="logo-area">
                <a href="#"><h3>uber2</h3></a>
            </div>
        </div>
        <ul class="nav nav-tabs notika-menu-wrap">
            <li><a href="{{ url('inicio') }}"><i class="notika-icon notika-house"></i> Home</a>
            </li>
            <li><a href="{{ url('register') }}"><i class="notika-icon notika-mail"></i> Email</a>
            </li>
            <li><a href="#Interface"><i class="notika-icon notika-edit"></i> Interface</a>
            </li>
            <li><a href="#Charts"><i class="notika-icon notika-bar-chart"></i> Charts</a>
            </li>
            @yield('pagina')
        </ul>

    </div>
    <!-- End Header Top Area --><br>
    <!-- Color area Start-->
    <div class="colr-area">
        <div class="container">
            <div class="row">
                @section('contenido') 
                    @show
                  @yield('otrocontenido') 
            </div>
        </div>
    </div>
    <!-- Color area End-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area" style="position: bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>