@extends('material/template')

@section('title', 'CatchPenny Project - Login')

@section('content')
<div ng-controller="AppCtrl" layout="column">
    <md-content>
        <div layout-fill layout="row" layout-align="center center">
            <div flex hide-sm></div>
            <div flex>


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
                            <input type="password" name="password" ng-model="password" required minlength="6">
                            <div ng-messages="loginForm.password.$error" ng-show="loginForm.password.$dirty">
                                <div ng-message="required">This is required!</div>
                            </div>
                        </md-input-container>
                        <md-input-container>
                            <md-checkbox md-no-ink aria-label="Remember Me" ng-model="rememberMe" class="md-primary">
                                <input type="checkbox" name="remember" ng-model="rememberMe" hide>
                                Remember Me
                            </md-checkbox>
                        </md-input-container>
                        <md-input-container>
                            <md-button class="md-raised md-primary">Login</md-button>
                        </md-input-container>
                    </form>

            </div>
            <div flex hide-sm></div>
        </div>
    </md-content>
</div>
@endsection