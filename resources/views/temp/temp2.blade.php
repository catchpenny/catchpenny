@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <link rel="import" href="{{ url('elements/omni-bar-tall.html') }}">
    <link rel="import" href="{{ url('elements/new-status.html') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <body ng-app="OmniBar" class="fullbleed layout vertical">
    <div ng-controller="AppCtrl">
        <md-content layout="row" class="mainBody" layout-fill>
            {{-- Main Area --}}
            <div flex>
                <md-toolbar style="background-color: #009688;">
                    <div class="md-toolbar-tools">
                        <h3 flex>
                            <span>CatchPenny</span>
                        </h3>
                        <span flex="20"></span>
                        <md-autocomplete flex="70" md-selected-item="selectedItem" md-search-text="searchText"
                                         md-items="item in getMatches(searchText)" md-item-text="item.display"
                                         style="width: 100%;">
                            <span md-highlight-text="searchText">@{{item.display}}</span>
                        </md-autocomplete>
                    </div>
                </md-toolbar>
                <md-content layout="row" layout-padding style="height: 90vh;">
                    <span flex></span>
                    <md-content flex="70">
                        <md-card>
                            <img src="{{ url('api/image/') }}/{{ $profile->coverBig }}" alt="Cover Picture" style="height: 350px"/>
                            <div id="widgets">
                                <img id="profilePic" src="{{ url('api/image/') }}/{{ $profile->photoSmall }}" alt="Profile Picture"/>

                                {{-- FAB NOT WORKING --}}

                                <md-fab-speed-dial md-open="true" md-direction="right" ng-class="md-fling">
                                <md-fab-trigger>
                                <md-button aria-label="menu" class="md-fab md-warn">
                                <i class="material-icons">menu</i>
                                </md-button>
                                </md-fab-trigger>
                                <md-fab-actions>
                                <md-button aria-label="twitter"
                                class="md-fab md-raised md-mini">
                                <i class="material-icons">add</i>
                                </md-button>
                                <md-button aria-label="facebook"
                                class="md-fab md-raised md-mini">
                                <i class="material-icons">remove</i>
                                </md-button>
                                <md-button aria-label="Google hangout"
                                class="md-fab md-raised md-mini">
                                <i class="material-icons">clear</i>
                                </md-button>
                                </md-fab-actions>
                                </md-fab-speed-dial>
                            </div>
                            <md-card-content>
                                <div layout="row">
                                    <h2 class="md-title">{{ $user->firstName . " " . $user->lastName }}</h2>
                                    <span flex></span>
                                    <a href="{{ url('profile/edit') }}">
                                        <md-button>Edit</md-button>
                                    </a>
                                </div>
                                <div layout="row">
                                    <div flex="30">
                                        <md-card>
                                            <md-card-content>
                                                <md-list-item ng-repeat="menu in items">
                                                    <p class="md-caption"> @{{ menu.name }} </p>
                                                    <md-divider></md-divider>
                                                </md-list-item>
                                            </md-card-content>
                                        </md-card>
                                    </div>
                                    <div layout="column" flex>
                                        <div layout-align>
                                            <md-card class="md-whiteframe-z2">
                                                <md-card-content>
                                                    <p class="md-body-2">Address</p>

                                                    <p class="md-body-1">{!! $profile->city . "<br>" . $profile->country !!}</p>
                                                </md-card-content>
                                            </md-card>
                                        </div>
                                        <div>
                                            <md-card class="md-whiteframe-z2">
                                                <md-card-content>
                                                    {!! $profile->aboutMe . "<br>" . $user->email !!}
                                                </md-card-content>
                                            </md-card>
                                        </div>
                                    </div>
                                </div>

                            </md-card-content>
                        </md-card>
                    </md-content>
                </md-content>
            </div>
            {{--Right SideBar--}}
            <div flex="20">
                <md-toolbar style="background-color: #009688;">
                    <div layout="column" class="md-toolbar-tools">
                        <span flex></span>
                        <span layout="row">
                            {{--<md-button class="md-icon-button md-accent" aria-label="Message">--}}
                            {{--<i class="material-icons">message</i>--}}
                            {{--</md-button>--}}
                            {{--<md-button class="md-icon-button md-accent" aria-label="Message">--}}
                            {{--<i class="material-icons">notifications</i>--}}
                            {{--</md-button>--}}
                            {{--Sam Jackson--}}
                            {{--<md-button class="md-icon-button md-accent" aria-label="Message">--}}
                            {{--<i class="material-icons">mood</i>--}}
                            {{--</md-button>--}}
                        </span>
                    </div>
                </md-toolbar>
                <md-content>
                    <div layout="row" layout-align="center start">
                        <div flex layout-padding>
                            <md-card>
                                <md-toolbar style="background-color: #009688;">
                                    <div class="md-toolbar-tools">
                                        <h2 class="md-title">Domains</h2>
                                    </div>
                                </md-toolbar>
                                <md-card-content>

                                </md-card-content>
                            </md-card>
                            <md-card>
                                <md-toolbar style="background-color: #009688;">
                                    <div class="md-toolbar-tools">
                                        <h2 class="md-title">Channels</h2>
                                    </div>
                                </md-toolbar>
                                <md-autocomplete md-selected-item="selectedItem" md-search-text="searchText"
                                                 md-items="item in getMatches(searchText)"
                                                 md-item-text="item.display" style="width: 100%;">
                                    <span md-highlight-text="searchText">@{{item.display}}</span>
                                </md-autocomplete>
                                <md-card-content>
                                    <p>
                                        #general
                                    </p>
                                </md-card-content>
                            </md-card>
                        </div>
                    </div>
                </md-content>
            </div>
        </md-content>
    </div>
    </body>

@endsection