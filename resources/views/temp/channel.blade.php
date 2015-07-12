@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <body ng-app="OmniBar"  >
    <div ng-controller="AppCtrl as ctrl" >

        <md-content style="height: 100%;">
            <div style="height: 10%;">
                <md-toolbar>
                    <div class="md-toolbar-tools">
                        <span flex="20">CatchPenny</span>
                    <span flex>
                        <md-autocomplete
                                md-selected-item="ctrl.selectedItem"
                                md-search-text-change="ctrl.searchTextChange(ctrl.searchText)"
                                md-search-text="ctrl.searchText"
                                md-selected-item-change="ctrl.selectedItemChange(item)"
                                md-items="item in ctrl.querySearch(ctrl.searchText)"
                                md-item-text="item.firstName"
                                md-min-length="0"
                                placeholder="Search">
                            <md-item-template>
                                <span md-highlight-text="ctrl.searchText" md-highlight-flags="^i">@{{item.firstName + ' ' + item.lastName}}</span>
                            </md-item-template>
                            <md-not-found>
                                No matches found for "@{{ctrl.searchText}}".
                            </md-not-found>
                        </md-autocomplete>
                    </span>
                        <span flex="20">Sam Jackson</span>
                    </div>
                </md-toolbar>
            </div>
            <md-content style="height: 90%" layout="row">
                <div flex="20">
                    abvd
                </div>
                <div flex>
                    <md-card>
                        <md-toolbar style="min-height: 40px; max-height: 40px;">
                            <div class="md-toolbar-tools">
                                <h2 class="md-title">CatchPenny #general</h2>
                            </div>
                        </md-toolbar>
                        <md-card-contentmd-input- style="padding: 0px;">
                            <div layout="column" style="width:100%;">
                                <md-list>
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
                <div flex="20">
                    <md-content>
                        <div layout="row" layout-align="center start">
                            <div flex>
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
                                    {{--<md-autocomplete md-selected-item="selectedItem" md-search-text="searchText"--}}
                                                     {{--md-items="item in getMatches(searchText)"--}}
                                                     {{--md-item-text="item.display" style="width: 100%;">--}}
                                        {{--<span md-highlight-text="searchText">@{{item.display}}</span>--}}
                                    {{--</md-autocomplete>--}}
                                    <md-card-content>
                                        <p>
                                            #general
                                        </p>
                                        <md-progress-circular class="md-hue-2" md-mode="indeterminate"></md-progress-circular>
                                    </md-card-content>
                                </md-card>
                            </div>
                        </div>
                    </md-content>
                </div>
            </md-content>

        </md-content>
    </div>
    </body>

@endsection