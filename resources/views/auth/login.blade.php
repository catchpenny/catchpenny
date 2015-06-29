<!-- resources/views/auth/login.blade.php -->
<html ng-app="App">
<head>

    <!-- Angular Material CSS now available via Google CDN; version 0.10 used here -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.css">

</head>
<body ng-controller="AppCtrl">

<div layout="column" layout-fill>
    <md-toolbar>
        <div class="md-toolbar-tools">
            <span>CatchPenny Project &nbsp;</span>
            <!-- fill up the space between left and right area -->
            <span flex>

                <md-autocomplete md-selected-item="selectedItem" md-search-text="searchText" md-items="item in getMatches(searchText)" md-item-text="item.display">
                    <span md-highlight-text="searchText"></span>
                </md-autocomplete>

            </span>
            <md-button>
                Right Bar Button
            </md-button>
        </div>
    </md-toolbar>
    <md-content>
        <div layout-fill layout="row" layout-align="center center">
            <form name="loginForm" action="" method="post">
                {!! csrf_field() !!}
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <md-input-container>
                    <label>Email</label>
                    <input type="email" name="email" ng-model="email" required value="{{ old('email') }}">
                    <div ng-messages="loginForm.email.$error" ng-show="loginForm.email.$dirty">
                        <div ng-message="required">This is required!</div>
                    </div>
                </md-input-container>
                <md-input-container>
                    <label>Password</label>
                    <input name="password" ng-model="password" required minlength="6">
                    <div ng-messages="loginForm.password.$error" ng-show="loginForm.password.$dirty">
                        <div ng-message="required">This is required!</div>
                    </div>
                </md-input-container>
                <md-input-container>
                    <div>
                        <input type="checkbox" name="remember"> Remember Me
                    </div>
                </md-input-container>
                <md-input-container>
                    <md-button class="md-raised md-primary">Login</md-button>
                </md-input-container>
            </form>
        </div>
    </md-content>

    <!--  Footer Section -->
    <div layout="row" layout-align="center end">
        <md-content>
            Hey
        </md-content>
    </div>

</div>





<!-- Angular Material Dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.10 used here -->
<script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.js"></script>
<!-- Local Scripts -->
<script src="/html/ui/js/app.js"></script>
</body>
</html>