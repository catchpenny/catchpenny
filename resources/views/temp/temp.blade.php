@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <link rel="import" href="{{ url('elements/omni-bar-tall.html') }}">
    <link rel="import" href="{{ url('elements/new-status.html') }}">
    <body ng-app="OmniBar" class="fullbleed layout vertical">
    <div ng-controller="AppCtrl">
        <md-content layout="row" class="mainBody" layout-fill>
            {{-- Left SideBar --}}

            <div flex="20">
                <md-toolbar>
                    <div class="md-toolbar-tools" style="background-color: #006064;">
                        <h3>
                            <span>CatchPenny</span>
                        </h3>
                    </div>
                </md-toolbar>
                <md-content style=" background-color: #006064;" layout-fill>

                    <div layout-fill layout="row" layout-align="center start">
                        <div flex layout-padding>
                            <md-button>Home</md-button>
                            <md-card style="background-color: #00838F;">
                                <md-card-content>

                                </md-card-content>
                            </md-card>

                            <md-card style="background-color: #00838F;">
                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                     alt=""/>
                                <md-card-content>
                                    <h2 class="md-title">Sam Jackson</h2>
                                </md-card-content>
                            </md-card>
                        </div>
                    </div>

                </md-content>
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
                <md-content layout-fill>

                    <div layout-fill layout="row" layout-align="center start">
                        <div flex layout-padding>

                            <div flex layout="row">
                                <div flex>
                                    <md-card>
                                        <md-toolbar style="background-color: #009688;">
                                            <div class="md-toolbar-tools">
                                                <h2 class="md-title">CatchPenny</h2>
                                            </div>
                                        </md-toolbar>
                                        <md-card-content>
                                            <div layout="column" style="width:100%;">
                                                <md-list>
                                                    <md-subheader class="md-no-sticky">15 Unread Post</md-subheader>
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
                                                </md-list>
                                            </div>
                                        </md-card-content>
                                    </md-card>
                                </div>
                                <div flex>
                                    <md-card>
                                        <md-toolbar style="background-color: #009688;">
                                            <div class="md-toolbar-tools">
                                                <h2 class="md-title">CatchPenny</h2>
                                            </div>
                                        </md-toolbar>
                                        <md-card-content>
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
                                                    <md-divider></md-divider>
                                                    <md-list-item class="md-2-line">
                                                        <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                             class="md-avatar"
                                                             alt="Washed Out">

                                                        <div class="md-list-item-text">
                                                            <h3>Sam Jackson</h3>

                                                            <p>Hi I think this is Awsome!!</p>
                                                        </div>
                                                    </md-list-item>
                                                    <md-divider></md-divider>
                                                    <md-list-item class="md-2-line">
                                                        <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                             class="md-avatar"
                                                             alt="Washed Out">

                                                        <div class="md-list-item-text">
                                                            <h3>Sam Jackson</h3>

                                                            <p>Hi I think this is Awsome!!</p>
                                                        </div>
                                                    </md-list-item>
                                                    <md-divider></md-divider>
                                                    <md-list-item class="md-2-line">
                                                        <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                             class="md-avatar"
                                                             alt="Washed Out">

                                                        <div class="md-list-item-text">
                                                            <h3>Sam Jackson</h3>

                                                            <p>Hi I think this is Awsome!!</p>
                                                        </div>
                                                    </md-list-item>
                                                    <md-divider></md-divider>
                                                    <md-list-item class="md-2-line">
                                                        <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                             class="md-avatar"
                                                             alt="Washed Out">

                                                        <div class="md-list-item-text">
                                                            <h3>Sam Jackson</h3>

                                                            <p>Hi I think this is Awsome!!</p>
                                                        </div>
                                                    </md-list-item>
                                                    <md-divider></md-divider>
                                                    <md-list-item class="md-2-line">
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
                                </div>
                            </div>
                            <md-card>
                                <md-toolbar style="background-color: #009688;">
                                    <div class="md-toolbar-tools">
                                        <h2 class="md-title">CatchPenny</h2>
                                    </div>
                                </md-toolbar>
                                <md-card-content>
                                    <div layout="column" style="width:100%;">
                                        <md-list>
                                            <md-subheader class="md-no-sticky">15 Unread Post</md-subheader>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-divider></md-divider>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-divider></md-divider>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                                     class="md-avatar"
                                                     alt="Washed Out">

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>Hi I think this is Awsome!!</p>
                                                </div>
                                            </md-list-item>
                                            <md-divider></md-divider>
                                            <md-list-item class="md-2-line">
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
                            <md-card>
                                <md-toolbar style="background-color: #009688;">
                                    <div class="md-toolbar-tools">
                                        <h2 class="md-title">CatchPenny</h2>
                                    </div>
                                </md-toolbar>
                                <md-card-content>
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
                                        </md-list>
                                    </div>
                                </md-card-content>
                            </md-card>
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