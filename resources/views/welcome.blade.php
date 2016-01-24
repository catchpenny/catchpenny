<!DOCTYPE html>
<html>
<head>
    <title> CatchPenny Project </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--OFFLINE SOURCE--}}
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-theme.min.css') }}">
    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
            width: 100%;
            color: #B0BEC5;
            font-weight: 100;
            font-family: 'Lato';
            margin: 0;
            padding: 0;
        }

        /*.navbar-custom {*/
            /*border-color: rgba(34,34,34,.05);*/
            /*font-family: 'Open Sans','Helvetica Neue',Arial,sans-serif;*/
            /*background-color: #fff;*/
            /*-webkit-transition: all .35s;*/
            /*-moz-transition: all .35s;*/
            /*transition: all .35s;*/
        /*}*/

        .navbar-custom {
            border-color: transparent !important;
            font-family: 'Open Sans','Helvetica Neue',Arial,sans-serif;
            background-color: #fff;
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
            transition: all .35s;
        }

        .navbar-custom .navbar-header .navbar-brand {
            text-transform: uppercase;
            font-family: 'Open Sans','Helvetica Neue',Arial,sans-serif;
            font-weight: 700;
            color: #f05f40;
        }

        .navbar-custom .navbar-header .navbar-brand:hover,
        .navbar-custom .navbar-header .navbar-brand:focus {
            color: #eb3812;
        }

        .navbar-custom .nav > li>a,
        .navbar-custom .nav>li>a:focus {
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            color: #222;
        }

        .navbar-custom .nav > li>a:hover,
        .navbar-custom .nav>li>a:focus:hover {
            color: #f05f40;
        }

        .navbar-custom .nav > li.active>a,
        .navbar-custom .nav>li.active>a:focus {
            color: #f05f40!important;
            background-color: transparent;
        }

        .navbar-custom .nav > li.active>a:hover,
        .navbar-custom .nav>li.active>a:focus:hover {
            background-color: transparent;
        }

        @media(min-width:768px) {
            .navbar-custom {
                border-color: rgba(255,255,255,.3);
                background-color: transparent;
            }

            .navbar-custom .navbar-header .navbar-brand {
                color: rgba(255,255,255,.7);
            }

            .navbar-custom .navbar-header .navbar-brand:hover,
            .navbar-custom .navbar-header .navbar-brand:focus {
                color: #fff;
            }

            .navbar-custom .nav > li>a,
            .navbar-custom .nav>li>a:focus {
                color: rgba(255,255,255,.7);
            }

            .navbar-custom .nav > li>a:hover,
            .navbar-custom .nav>li>a:focus:hover {
                color: #fff;
            }

            .navbar-custom.affix {
                border-color: rgba(34,34,34,.05);
                background-color: #fff;
            }

            .navbar-custom.affix .navbar-header .navbar-brand {
                font-size: 14px;
                color: #f05f40;
            }

            .navbar-custom.affix .navbar-header .navbar-brand:hover,
            .navbar-custom.affix .navbar-header .navbar-brand:focus {
                color: #eb3812;
            }

            .navbar-custom.affix .nav > li>a,
            .navbar-custom.affix .nav>li>a:focus {
                color: #222;
            }

            .navbar-custom.affix .nav > li>a:hover,
            .navbar-custom.affix .nav>li>a:focus:hover {
                color: #f05f40;
            }
        }

        header{
            text-align: center;
            background-color: rgba(0,0,0,0.5);
            height: 100%;
        }

        .header-content{
            position: relative;
            top: 40%;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .quote {
            font-size: 30px;
        }

        section{
            height: 100%;
            background-color: #F89D0E;
            color: white;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            text-align: center;
        }

        #background {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            background: url(polina.jpg) no-repeat;
            background-size: cover;
        }

        .typed-cursor{
            opacity: 1;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }
        @keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-webkit-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-moz-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }


    </style>


</head>
<body>

<nav id="mainNav" class="navbar navbar-fixed-top navbar-custom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> CatchPenny </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/auth/login">Login</a>
                </li>
                <li>
                    <a href="/auth/register">Register</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


<header>
    <video autoplay loop muted poster="screenshot.jpg" id="background">
        <source src="/video/video.mp4" type="video/mp4">
    </video>
    <div class="header-content  ">
        <div class="quote">Coming Soon</div>
        <div class="title">CatchPenny Project</div>
        <div class="quote typed"></div>
    </div>
</header>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Hi there, Meet CatchPenny</h1>
                <h3>Your New Best Friend</h3>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #1BAEE4">

</section>
<section style="background-color: #F35F72">

</section>
<section style="background-color: #435196">

</section>
</div>
</body>

    <script src="{{ url('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ url('js/typed.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>

    <script>
        $(function(){
            $(".typed").typed({
                strings: [
                    'When there is no desire, all things are at peace. - Laozi ^1000',
                    'Simplicity is the ultimate sophistication. - Leonardo da Vinci ^1000',
                    'Simplicity is the essence of happiness. - Cedric Bledsoe ^1000',
                    'Smile, breathe, and go slowly. - Thich Nhat Hanh ^1000',
                    'Simplicity is an acquired taste. - Katharine Gerould ^1000',
                    'Well begun is half done. - Aristotle ^1000',
                    'He who is contented is rich. - Laozi ^1000',
                    'Very little is needed to make a happy life. - Marcus Antoninus ^1000',
                ],
                typeSpeed: 50,
                startDelay: 1000,
                backSpeed: 50,
            });
        });


    </script>
</html>
