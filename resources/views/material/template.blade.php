<html lang="en">
<head>

    <!-- Angular Material CSS now available via Google CDN; version 0.10 used here -->
    {{--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.css">--}}
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ url('css/angular-material.min.css') }}">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">--}}
    <title> @yield('title') </title>
</head>

@yield('content')

        <!-- Angular Material Dependencies -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>--}}

{{--<!-- Angular Material Javascript now available via Google CDN; version 0.10 used here -->--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.js"></script>--}}

{{--<script src="{{ url('bower_components/webcomponentsjs/webcomponents-lite.min.js') }}"></script>--}}

{{--Using local files for offline testing--}}
<link rel="stylesheet" href="{{ url('css/starter.css') }}">
<script src="{{ url('js/angular.min.js') }}"></script>
<script src="{{ url('js/angular-animate.min.js') }}"></script>
<script src="{{ url('js/angular-aria.min.js') }}"></script>
<script src="{{ url('js/angular-material.min.js') }}"></script>
<script src="{{ url('js/starter.js') }}"></script>

</html>