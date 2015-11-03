<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--OFFLINE SOURCE--}}
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-theme.min.css') }}">
    <script src="{{ url('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>

    <title>Document</title>
</head>

<script>

    $(document).ready(function(){
        $('.auto-overflow').height($(window).height() - 50);
    });

    $(window).resize(function(){
        $('.auto-overflow').height($(window).height() - 50);
    });

</script>

<style>
    .no-margin{
        margin: 0px !important;
    }
    .white-font{
        color: white;
    }
    .auto-overflow{
        overflow: auto;
    }
    /* Let's get this party started */
    ::-webkit-scrollbar {
        width: 6px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        /*        -webkit-border-radius: 10px;
                border-radius: 10px;*/
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        /*        -webkit-border-radius: 10px;
                border-radius: 10px;*/
        background:#ddd;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
    }
    ::-webkit-scrollbar-thumb:window-inactive {
        background: #ddd;
    }

    .form-wrap{
        position: absolute;
        bottom: 0px;
        right: 0;
        left: 0;
        margin: auto;
        width: 90%;
    }
    .manual-width-75{
        width: 75px;
    }

    .no-padding{
        padding: 0px !important;
    }

    .manual-box-50{
        width: 65px;
        height: 65px;
        /*display:block;*/
        /*margin-top: 5px;*/
        /*margin-right: auto;*/
        /*margin-left: auto;*/
        margin: 5px;
        border-radius: 5px;
        background-color: rgba(255,255,255,0.5);
    }
    .manual-box-selected{
        background-color: rgba(0,0,255,0.5) !important;
    }

</style>


<body>

{{--<nav class="navbar navbar-default">--}}
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('home') }}"> CatchPenny <sup>beta</sup></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('domain/create') }}">Create Domain</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{  $currentUser->firstName  }} {{  $currentUser->lastName  }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('u/' . $currentUser->id) }}">Profile</a></li>
                        <li><a href="{{ url('settings') }}">Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
{{--</nav>--}}

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 white-font manual-width-75 auto-overflow no-padding" style="background-color:rgba(0,0,0,0.5);">
            <div class="manual-box-50 manual-box-selected">
                <div style="
                    padding-top: 15px;
                " align="center">
                    <i class="glyphicon glyphicon-home" style="font-size: 35px;" ></i>
                </div>
            </div>
            <div class="manual-box-50">
            </div>
            <div class="manual-box-50">
            </div>
            <div class="manual-box-50">
            </div>
            <div class="manual-box-50">
            </div>
            <div class="manual-box-50">
            </div>
            <div class="manual-box-50">
            </div>
            <div class="manual-box-50">
            </div>
            <div class="manual-box-50">
            </div>
            <div class="manual-box-50">
            </div>

        </div>
        <div class="col-md-2 white-font  auto-overflow" style="background-color: #000000;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
        </div>
        <div class="col-md-9 auto-overflow" style="background-color: #f0f0f0;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolore doloribus, exercitationem fugit harum iusto omnis praesentium vitae voluptas! A dolorem perspiciatis quod sint, suscipit tempore! Numquam, praesentium voluptates! <br>

            <div class="form-wrap">
                <form action="fire" method="POST" name="form1" id="form1">
                    <div class="send-wrap">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_jwttoken" value="">
                        <textarea class="form-control send-message" rows="3" placeholder="Write a reply..." id="m" name="m" autocomplete="off"></textarea>
                    </div>
                    <div class="btn-panel">
                        <a href="" class=" col-lg-3 btn   send-message-btn " role="button"><i class="fa fa-cloud-upload"></i> Add Files</a>
                        <button class=" col-lg-4 text-right btn   send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> Send Message</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>