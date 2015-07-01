<html lang="en" ng-app="MyApp">
<head>

    <!-- Angular Material CSS now available via Google CDN; version 0.10 used here -->
    {{--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.css">--}}
    <meta name="viewport" content="initial-scale=1" />
    <title> @yield('title') </title>
    <style>
        @font-face {
            font-family:"icomoon";
            src:url("https://cdn.rawgit.com/angular/material/master/docs/app/fonts/icomoon.eot");
            font-weight:normal;
            font-style:normal;
        }
        @font-face {
            font-family: 'icomoon';
            src:url('https://rawgit.com/angular/material/master/docs/app/fonts/icomoon.eot?-cmq1um');
            src:url('https://cdn.rawgit.com/angular/material/master/docs/app/fonts/icomoon.eot?#iefix-cmq1um') format('embedded-opentype'),
            url('https://cdn.rawgit.com/angular/material/master/docs/app/fonts/icomoon.woff?-cmq1um') format('woff'),
            url('https://cdn.rawgit.com/angular/material/master/docs/app/fonts/icomoon.ttf?-cmq1um') format('truetype'),
            url('https://cdn.rawgit.com/angular/material/master/docs/app/fonts/icomoon.svg?-cmq1um#icomoon') format('svg');
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>
<body>

    @yield('content')

<!-- Angular Material Dependencies -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>--}}

<!-- Angular Material Javascript now available via Google CDN; version 0.10 used here -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.js"></script>--}}

    {{--Using local files for offline testing--}}
    <link rel="stylesheet" href="{{ url('css/starter.css') }}">
    <link rel="stylesheet" href="{{ url('css/angular-material.min.css') }}">
    <script src="{{ url('js/angular.min.js') }}"></script>
    <script src="{{ url('js/angular-animate.min.js') }}"></script>
    <script src="{{ url('js/angular-aria.min.js') }}"></script>
    <script src="{{ url('js/angular-material.min.js') }}"></script>
    <script src="{{ url('js/starter.js') }}"></script>

</body>
</html>