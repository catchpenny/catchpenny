@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <body ng-app="OmniBar"  >
    <div ng-controller="AppCtrl" >

    <md-content layout-fill layout="row">
        <div flex="20">
            <md-toolbar style="min-height: 50px; max-height: 50px; background-color: #009688;">
                <div class="md-toolbar-tools">
                            <span flex>
                                CatchPenny
                            </span>
                            <span flex>
                            </span>
                </div>
            </md-toolbar>
            <md-content layout-fill style="background-color: #eee;">
                <div flex>abcd</div>
                <div flex>abcd</div>
                <div flex>abcd</div>
                <div flex>abcd</div>
                <div flex>abcd</div>
            </md-content>
        </div>
        <div flex>
            <md-content layout="row">
                <div flex>
                    <md-toolbar style="min-height: 50px; max-height: 50px; background-color: #009688;">
                        <div class="md-toolbar-tools">
                            <span flex>
                                #general
                            </span>
                            <span flex>
                            </span>
                        </div>
                    </md-toolbar>
                    <md-card>
                        <md-card-content style="padding: 0px;">
                            <div layout="column" style="width:100%;">

                                <md-list>
                                    <md-list-item>
                                        #general share whatever you feel like
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                             class="md-avatar"
                                             alt="Washed Out">

                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>

                                            <p>Hi I think this is Awsome!!</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                             class="md-avatar"
                                             alt="Washed Out">

                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>

                                            <p>Hi I think this is Awsome!!</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                             class="md-avatar"
                                             alt="Washed Out">

                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>

                                            <p>Hi I think this is Awsome!!</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                             class="md-avatar"
                                             alt="Washed Out">

                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>

                                            <p>Hi I think this is Awsome!!</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                             class="md-avatar"
                                             alt="Washed Out">

                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>

                                            <p>Hi I think this is Awsome!!</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
                                             class="md-avatar"
                                             alt="Washed Out">

                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>

                                            <p>Hi I think this is Awsome!!</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="http://pre05.deviantart.net/602b/th/pre/i/2012/078/c/7/sherlock_in_profile_by_beth193-d4t924h.jpg"
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
                            <md-input-container>
                                <label>Message</label>
                                <input type="text">
                            </md-input-container>
                    </md-card>
                </div>
                <div flex="25">
                    <md-toolbar style="min-height: 50px; max-height: 50px; background-color: #009688;">
                        <div class="md-toolbar-tools">
                            <span flex></span>
                            <span>Sam Jackson</span>
                        </div>
                    </md-toolbar>
                    <md-card>
                        <md-autocomplete md-selected-item="selectedItem" md-search-text="searchText" md-items="item in getMatches(searchText)" md-item-text="item.display">
                            <span md-highlight-text="searchText">@{{item.display}}</span>
                        </md-autocomplete>
                    </md-card>

                    <md-content>
                        <div layout="row" layout-align="center start">
                            <div flex layout-padding>
                                <md-card>
                                    <md-toolbar style="min-height: 40px; max-height: 40px;">
                                        <div class="md-toolbar-tools">
                                            <h2 class="md-title">Domains</h2>
                                        </div>
                                    </md-toolbar>
                                    <md-card-content>
                                        <p>CatchPenny</p>
                                    </md-card-content>
                                </md-card>
                                <md-card>
                                    <md-toolbar style="min-height: 40px; max-height: 40px;">
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
    </md-content>
    </div>
    </body>

@endsection