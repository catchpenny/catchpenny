@extends('material/template')

@section('title', 'CatchPenny | Home')

@section('content')
    <body ng-app="mainApp" layout="column">
    {{--Start Toolbar--}}
    <md-toolbar id="topToolbar" ng-controller="omniBarCtrl as ctrl" style="background-color: #009688;">
        <div class="md-toolbar-tools">
            <span flex="20">CatchPenny</span>
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
{{--                <span flex> @{{ $user->firstName}} @{{$user->lastName}} </span>--}}
                <span flex>
                    <md-menu md-offset="0 0">
                        <md-button ng-click="$mdOpenMenu()" class="md-icon-button" aria-label="Open sample menu">
                            {{--<md-icon>arrow_drop_down</md-icon>--}}
                            D
                        </md-button>
                        <md-menu-content width="3">
                            <md-menu-item><md-button ng-href=" {{ url('settings') }}">Settings</md-button></md-menu-item>
                            <md-menu-item><md-button ng-href=" {{ url('auth/logout') }}">Logout</md-button></md-menu-item>
                        </md-menu-content>
                    </md-menu>
                </span>
            </span>
        </div>
    </md-toolbar>
    {{--End Toolbar--}}

    {{--start main section--}}
    <md-content layout="row" style="background-color: #EEEEEE;">

        {{--left section start--}}
        <div flex="20" layout="column">
            <md-card>
                <md-card-content>
                    <md-list>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>dashboard</md-icon>
                                    </div>
                                    <div class="inset">Dashboard</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>domains</md-icon>
                                    </div>
                                    <div class="inset">Domains</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>people</md-icon>
                                    </div>
                                    <div class="inset">Friends</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>message</md-icon>
                                    </div>
                                    <div class="inset">Messages</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>folder</md-icon>
                                    </div>
                                    <div class="inset">Files</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>photo</md-icon>
                                    </div>
                                    <div class="inset">Photos</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>pages</md-icon>
                                    </div>
                                    <div class="inset">Pages</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>whatshot</md-icon>
                                    </div>
                                    <div class="inset">Whats Hot</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>group</md-icon>
                                    </div>
                                    <div class="inset">Groups</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                        <md-divider></md-divider>
                        <md-list-item>
                            <a>
                                <md-item-content md-ink-ripple layout="row" layout-align="start center">
                                    <div class="inset">
                                        <md-icon>settings</md-icon>
                                    </div>
                                    <div class="inset">Settings</div>
                                </md-item-content>
                            </a>
                        </md-list-item>
                    </md-list>
                </md-card-content>
            </md-card>
        </div>
        {{--left section end--}}

        {{--//middle section start--}}
        <div flex layout="column">
            <md-card>
                <md-card-content>

                </md-card-content>
            </md-card>
        </div>
        {{--middle section end--}}

        {{--right section start--}}
        <div flex="25">

        </div>
        {{--right section end--}}

    </md-content>
    {{--end main section--}}
    </body>
@endsection