@extends('material/template')

@section('title', 'CatchPenny | Home')

@section('content')
    <body ng-app="mainApp" layout="column" style="overflow: hidden;">

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
                <span flex="5"></span>
                <span flex>
                    <md-icon>notifications</md-icon>
                    <md-icon>school</md-icon>
                </span>
                <span flex>Sam Jackson</span>
            </span>
        </div>
    </md-toolbar>

    <md-content layout="row" layout-fill>
        {{--<div flex="5"></div>--}}
        <md-content flex="20">
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
                            <div class="inset">Connect Account</div>
                        </md-item-content>
                    </a>
                </md-list-item>
                <md-list-item>
                    <a>
                        <md-item-content md-ink-ripple layout="row" layout-align="start center">
                            <div class="inset">
                                <md-icon>settings</md-icon>
                            </div>
                            <div class="inset">Apps</div>
                        </md-item-content>
                    </a>
                </md-list-item>
                <md-list-item>
                    <a>
                        <md-item-content md-ink-ripple layout="row" layout-align="start center">
                            <div class="inset">
                                <md-icon>settings</md-icon>
                            </div>
                            <div class="inset">Services</div>
                        </md-item-content>
                    </a>
                </md-list-item>
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
        </md-content>
        <md-content flex layout="column">
            <md-card>
                <md-card-content>
                    <md-input-container>
                        <input type="text">
                    </md-input-container>
                    <span layout="row" layout-align="end center">
                        <md-button class="md-raised">Send</md-button>
                    </span>
                </md-card-content>
            </md-card>
        </md-content>
        <md-content flex="15">
            <md-card>
                <md-card-content>

                </md-card-content>
            </md-card>
        </md-content>
        <md-content flex="15" layout="row">
            <md-card>
                <md-card-content>
                </md-card-content>
            </md-card>
        </md-content>
    </md-content>
    </body>
@endsection