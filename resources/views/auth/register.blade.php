<!-- resources/views/auth/register.blade.php -->
@extends('material/template')

@section('title', 'Registration')

@section('content')
    <body ng-app="Register">
    <div ng-controller="AppCtrl" layout="column">
        <md-content layout-padding layout="row" layout-sm="column" layout-align="center center">
            <form method="POST" action="register">
                {!! csrf_field() !!}
                <div layout layout-sm="column">
                    <md-input-container flex>
                        <label>First name</label>
                        <input name="firstName" type="text">
                    </md-input-container>
                    <md-input-container flex>
                        <label>Last Name</label>
                        <input name="lastName" type="text">
                    </md-input-container>
                </div>
                <div layout layout-sm="column">
                    <md-input-container flex>
                        <label>Email</label>
                        <input name="email" type="email">
                    </md-input-container>
                </div>
                <div layout layout-sm="column">
                    <md-input-container flex>
                        <label>Password</label>
                        <input name="password" type="password">
                    </md-input-container>
                </div>
                <div layout layout-sm="column">
                    <md-input-container flex>
                        <label>Confirm Password</label>
                        <input name="password_confirmation" type="password">
                    </md-input-container>
                </div>
                <div layout layout-sm="column" layout-align="center">
                    <md-radio-group name="gender" layout="row">
                        <md-radio-button name="gender" value="Male" required>Male</md-radio-button>
                        <md-radio-button name="gender" value="Female" required>Female</md-radio-button>
                    </md-radio-group>
                </div>
                <div layout layout-sm="column">
                    <md-input-container flex>
                        <label>Birthday</label>
                        <input name="dateOfBirth" type="date">
                    </md-input-container>
                </div>
                <div layout layout-sm="column" layout-align="center">
                    <md-button class="md-raised" type="submit">Submit</md-button>
                </div>
                {{--<md-button class="md-raised md-warn" style="min-width: 10em;">Login</md-button>--}}
            </form>
            @if(count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            @endif
        </md-content>
    </div>
@endsection