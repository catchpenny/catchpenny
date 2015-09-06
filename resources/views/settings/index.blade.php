@extends('material/template')

@section('title', 'CatchPenny | Home')

@section('content')
    <body ng-app="mainApp" layout="column">
    {{--Start Toolbar--}}
    <md-toolbar id="topToolbar" ng-controller="omniBarCtrl as ctrl" style="background-color: #009688;">
        <div class="md-toolbar-tools">
            <span flex="20"><a href="{{ url('home') }}">CatchPenny</a></span>
                    <span flex>
                        <md-autocomplete
                                md-selected-item="ctrl.selectedItem"
                                md-autofocus="false"
                                md-autoselect="false"
                                md-search-text-change="ctrl.searchTextChange(ctrl.searchText)"
                                md-search-text="ctrl.searchText"
                                md-selected-item-change="ctrl.selectedItemChange(item)"
                                md-items="item in ctrl.querySearch(ctrl.searchText)"
                                md-item-text="item.firstName"
                                md-min-length="0"
                                placeholder="Search">
                            <md-item-template>
                                <span md-highlight-text="ctrl.searchText"
                                      md-highlight-flags="^i">@{{item.firstName + ' ' + item.lastName}}</span>
                            </md-item-template>
                            <md-not-found>
                                No matches found for "@{{ctrl.searchText}}".
                            </md-not-found>
                        </md-autocomplete>
                    </span>
            <span flex="25" layout="row">
                <span flex></span>
                <span flex layout="row">
                    <span flex> My Name </span>
                    <span flex>
                    <md-menu md-position-mode="target-right target">
                        <md-button ng-click="$mdOpenMenu()" class="md-icon-button" aria-label="Open sample menu">
                            <md-icon>arrow_drop_down</md-icon>
                        </md-button>
                        <md-menu-content width="3">
                            <md-menu-item><md-button ng-href=" {{ url('settings') }}">Settings</md-button></md-menu-item>
                            <md-menu-item><md-button ng-href=" {{ url('auth/logout') }}">Logout</md-button></md-menu-item>
                        </md-menu-content>
                    </md-menu>
                    </span>
                </span>
            </span>
        </div>
    </md-toolbar>
    {{--End Toolbar--}}

    {{--start main section--}}
    <div layout="row">

        {{--left section start--}}
        <div flex="20" layout="column">
            <md-card>
                <md-card-content>
                <md-list>
                    <md-list-item>
                        Profile
                    </md-list-item>
                </md-list>
                </md-card-content>
            </md-card>
        </div>
        {{--left section end--}}

        {{--//middle section start--}}
        <div flex layout="column">
            <md-card>
                <md-subheader>Profile</md-subheader>
            <md-card-content>
                <md-list>
                    <md-list-item>
                        Profile
                    </md-list-item>
                </md-list>
            </md-card-content>
            </md-card>
        </div>
        {{--middle section end--}}

        {{--right section start--}}
        <div flex="25">

        </div>
        {{--right section end--}}

    </div>
    {{--end main section--}}
    </body>
@endsection