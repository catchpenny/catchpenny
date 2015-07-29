@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <body ng-app="mainApp" layout="column" style="overflow: hidden;">

    <md-toolbar id="topToolbar" ng-controller="omniBarCtrl as ctrl">
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
            <span flex="20" layout="row">
                <span flex="5"></span>
                <span flex>
                    <md-icon>notifications</md-icon>
                    <md-icon>whatshot</md-icon>
                    <md-icon>school</md-icon>
                    <md-icon>domain</md-icon>
                </span>
                <span flex>Sam Jackson</span>
            </span>
        </div>
    </md-toolbar>

    <md-content layout="row">
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
            </md-list>
        </md-content>
        <md-content flex layout="column">
            <md-content>
                <md-card>
                    <md-card-item>
                        <md-list>
                            <md-list-item class="md-2-line">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg"
                                     class="md-avatar"/>

                                <div class="md-list-item-text">
                                    <h3>Sam Jackson</h3>

                                    <p>Life is Beautiful</p>
                                </div>
                            </md-list-item>
                            <md-list-item class="md-2-line">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg"
                                     class="md-avatar"/>

                                <div class="md-list-item-text">
                                    <h3>Sam Jackson</h3>

                                    <p>Life is Beautiful</p>
                                </div>
                            </md-list-item>
                            <md-list-item class="md-2-line">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg"
                                     class="md-avatar"/>

                                <div class="md-list-item-text">
                                    <h3>Sam Jackson</h3>

                                    <p>Life is Beautiful</p>
                                </div>
                            </md-list-item>
                            <md-list-item class="md-2-line">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg"
                                     class="md-avatar"/>

                                <div class="md-list-item-text">
                                    <h3>Sam Jackson</h3>

                                    <p>Life is Beautiful</p>
                                </div>
                            </md-list-item>
                            <md-list-item class="md-2-line">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg"
                                     class="md-avatar"/>

                                <div class="md-list-item-text">
                                    <h3>Sam Jackson</h3>

                                    <p>Life is Beautiful</p>
                                </div>
                            </md-list-item>
                            <md-list-item class="md-2-line">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg"
                                     class="md-avatar"/>

                                <div class="md-list-item-text">
                                    <h3>Sam Jackson</h3>

                                    <p>Life is Beautiful</p>
                                </div>
                            </md-list-item>
                            <md-list-item class="md-2-line">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg"
                                     class="md-avatar"/>

                                <div class="md-list-item-text">
                                    <h3>Sam Jackson</h3>

                                    <p>Life is Beautiful</p>
                                </div>
                            </md-list-item>
                            <md-list-item class="md-2-line">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg"
                                     class="md-avatar"/>

                                <div class="md-list-item-text">
                                    <h3>Sam Jackson</h3>

                                    <p>Life is Beautiful</p>
                                </div>
                            </md-list-item>
                        </md-list>
                    </md-card-item>
                </md-card>
            </md-content>

            <md-content layout="column" ng-controller="channelCtrl as ctrl" style="overflow: hidden;">
                <form ng-submit="" method="post" ng-submit="createNewPost(post)">
                    <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
                    <md-autocomplete
                            md-selected-item="ctrl.selectedItem"
                            md-autofocus="false"
                            md-autoselect="false"
                            md-search-text-change="ctrl.searchTextChange(ctrl.post)"
                            md-search-text="ctrl.post"
                            md-selected-item-change="ctrl.selectedItemChange(item)"
                            md-items="item in ctrl.createNewPost(ctrl.post)"
                            md-item-text="item.firstName"
                            md-min-length="0"
                            placeholder="Search">
                        <md-item-template>
                                <span md-highlight-text="ctrl.searchText"
                                      md-highlight-flags="^i">@{{item.firstName + ' ' + item.lastName}}</span>
                        </md-item-template>
                        <input type="submit" hidden>
                    </md-autocomplete>
                </form>
            </md-content>
        </md-content>
        <md-content flex="20">
            <md-card ng-controller="channelCtrl">
                <md-toolbar id="tool-bar">
                    <div class="md-toolbar-tools">
                        <h2 class="md-title">Channels</h2>
                    </div>
                </md-toolbar>
                {{--<md-autocomplete md-selected-item="selectedItem" md-search-text="searchText"--}}
                {{--md-items="item in getMatches(searchText)"--}}
                {{--md-item-text="item.display">--}}
                {{--<span md-highlight-text="searchText">@{{item.display}}</span>--}}
                {{--</md-autocomplete>--}}
                <md-card-content>
                    <div style="max-height: 150px; overflow: auto">
                        @foreach($channels as $channel)
                            <p>
                                <a href=" {{ url('channel') }}/{{ $channel->id }} ">
                                    {{ $channel->name }}
                                </a>
                            </p>
                        @endforeach
                    </div>

                </md-card-content>
            </md-card>
            </md-con    tent>
        </md-content>
    </body>
@endsection