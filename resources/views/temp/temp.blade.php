@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')

    <body ng-app="OmniBar" class="fullbleed layout vertical">
    <div ng-controller="AppCtrl">
        <md-content layout="row" class="mainBody" layout-fill>
            {{-- Left SideBar --}}
            <div flex="15">
                <md-toolbar>
                    <div class="md-toolbar-tools" style="background-color: #455A64  ;">
                        <h3>
                            <span>CatchPenny</span>
                        </h3>
                    </div>
                </md-toolbar>

                <md-input-container>
                    <md-button>Home</md-button>
                    <md-button>Home</md-button>
                    <md-button>Home</md-button>
                    <md-button>Home</md-button>
                    <md-button>Home</md-button>
                    <md-button>Home</md-button>
                    <md-button>Home</md-button>
                </md-input-container>
            </div>
            {{-- Middle SideBar --}}
            <div flex>
                <md-toolbar style="background-color: #009688;">
                    <div class="md-toolbar-tools">
                        <md-autocomplete md-selected-item="selectedItem" md-search-text="searchText"
                                         md-items="item in getMatches(searchText)" md-item-text="item.display"
                                         style="width: 100%;">
                            <span md-highlight-text="searchText">@{{item.display}}</span>
                        </md-autocomplete>
                    </div>
                </md-toolbar>
                <md-content>

                    <div layout="row" layout-align="center start">
                        <div flex>
                            <md-card>
                                <md-toolbar style="background-color: #009688;">
                                    <div class="md-toolbar-tools">
                                        <h2 class="md-title">CatchPenny</h2>
                                    </div>
                                </md-toolbar>
                                <md-card-content id="wrapper">
                                    <div layout="column" style="width:100%;">
                                        <md-list>
                                            <md-subheader class="md-no-sticky">Today</md-subheader>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item><md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item><md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item><md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item><md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item><md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item><md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                        </md-list>
                                    </div>
                                </md-card-content>
                            </md-card>
                            {{--<md-card>--}}
                                {{--<md-autocomplete md-selected-item="selectedItem" md-search-text="searchText"--}}
                                                 {{--md-items="item in getMatches(searchText)" md-item-text="item.display"--}}
                                                 {{--style="width: 100%;">--}}
                                    {{--<span md-highlight-text="searchText">@{{item.display}}</span>--}}
                                {{--</md-autocomplete>--}}
                            {{--</md-card>--}}
                        </div>
                    </div>
                </md-content>
            </div>
            {{-- Right SideBar --}}
            <div flex="20">
                <md-toolbar style="background-color: #009688;">
                    <div class="md-toolbar-tools">
                        <span flex></span>
                        <span>Sam Jackson</span>
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