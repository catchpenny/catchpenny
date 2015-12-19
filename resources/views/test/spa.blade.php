<!doctype html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--OFFLINE SOURCE--}}
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-theme.min.css') }}">
    <script src="{{ url('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>


    <title>Document</title>
</head>

<script>

    $(document).ready(function(){
        $('.auto-overflow').height($(window).height() - 50);
    });

    $(window).resize(function(){
        $('.auto-overflow').height($(window).height() - 50);
    });


    var app = angular.module('myApp',  ['ngRoute']);
    app.config(function($routeProvider) {
        $routeProvider

            // route for the home page
                .when('/', {
                    templateUrl : 'spa/getDomains',
                    controller  : 'mainController'
                })

            // route for the about page
                .when('/about', {
                    templateUrl : 'pages/about.html',
                    controller  : 'aboutController'
                })

            // route for the contact page
                .when('/contact', {
                    templateUrl : 'pages/contact.html',
                    controller  : 'contactController'
                });
    });

    app.controller('mainController',function($scope, $http){
        $http.get("/spa/getDomainsAjax")
                .success(function(response) {$scope.domains = response;});
    });

    app.controller('RightSideMenu', function($scope) {

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
    .manual-width-50{
        width: 50px;
    }

    .no-padding{
        padding: 0px !important;
    }

    .manual-box-50{
        width: 40px;
        height: 40px;
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
        <div class="col-md-1 auto-overflow no-padding" style="background-color:#D5D7D3;" ng-controller="RightSideMenu">
            <div class="list-group" align="center">
                <a href="#" class="list-group-item">
                    <p class="list-group-item-heading">Home</p>
                </a>
                <a href="#" class="list-group-item">
                    <p class="list-group-item-heading">Home</p>
                </a>
                <a href="#" class="list-group-item">
                    <p class="list-group-item-heading">Home</p>
                </a>
                <a href="#" class="list-group-item">
                    <p class="list-group-item-heading">Home</p>
                </a>
                <a href="#" class="list-group-item">
                    <p class="list-group-item-heading">Home</p>
                </a>
            </div>
        </div>
        <div ng-view>

        </div>
        {{--<div class="col-md-3 white-font  auto-overflow" style="background-color: #000000;">--}}
            {{--<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTA4MzEwOThmOSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MDgzMTA5OGY5Ij48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjYxMjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class=""--}}
                 {{--style="--}}
                    {{--width: 100%;--}}
                     {{--margin-top: 50px;--}}
                 {{--"/>--}}
        {{--</div>--}}
        {{--<div class="col-md-8 auto-overflow" style="background-color: #f0f0f0;">--}}
        {{--</div>--}}
    </div>
</div>

</body>
</html>