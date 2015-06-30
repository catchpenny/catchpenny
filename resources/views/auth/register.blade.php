@extends('material/template')

@section('title', 'CatchPenny Project - Login')

@section('content')
    <div ng-controller="AppCtrl" layout="column">
        <div layout-fill>
            <md-content>
                <div layout-fill layout="row" layout-align="center center">
                    <div flex hide-sm></div>
                    <div flex>
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
                                <md-radio-group layout="row" ng-model="gender">
                                    <md-radio-button name="gender" value="Male" aria-label="gender">Male</md-radio-button>
                                    <md-radio-button name="gender" value="Female" aria-label="gender">Female</md-radio-button>
                                    <input type="text" name="gender" ng-model="gender" style="display:none;"/>
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
                    </div>
                    <div flex hide-sm></div>
                </div>
            </md-content>
        </div>
    </div>
    @endsection


