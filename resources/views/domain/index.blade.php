@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <body ng-app="mainApp">

        <md-content style="height: 100%;">
            <div style="height: 10%;" ng-controller="omniBarCtrl as ctrl">
                <md-toolbar id="topToolbar">
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
                {{--Left Column--}}
                {{--<div flex="20">abcd</div>--}}
                {{--End Left Column--}}

                <div flex layout-padding ng-controller="channelPostsCtrl as ctrl">
                    <md-content>
                        <md-card style="height: 90%;">
                            <md-toolbar id="tool-bar">
                                <div class="md-toolbar-tools">
                                    <h2 class="md-title">CatchePenny #general</h2>
                                </div>
                            </md-toolbar>
                            <md-card-content style="height: 90%; overflow: auto; background-color: #E8EAF6;">
                                <md-list>
                                    <md-list-item class="md-2-line">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg" class="md-avatar"/>
                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>
                                            <p>Life is Beautiful</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg" class="md-avatar"/>
                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>
                                            <p>Life is Beautiful</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg" class="md-avatar"/>
                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>
                                            <p>Life is Beautiful</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg" class="md-avatar"/>
                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>
                                            <p>Life is Beautiful</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg" class="md-avatar"/>
                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>
                                            <p>Life is Beautiful</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg" class="md-avatar"/>
                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>
                                            <p>Life is Beautiful</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg" class="md-avatar"/>
                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>
                                            <p>Life is Beautiful</p>
                                        </div>
                                    </md-list-item>
                                    <md-list-item class="md-2-line">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Benedict_Cumberbatch_filming_Sherlock_cropped.jpg" class="md-avatar"/>
                                        <div class="md-list-item-text">
                                            <h3>Sam Jackson</h3>
                                            <p>Life is Beautiful</p>
                                        </div>
                                    </md-list-item>
                                </md-list>
                            </md-card-content>
                            <form method="post" ng-submit="createNewPost(post)">
                                <input type="hidden" ng-model="_token" name="_token" value="<?php echo csrf_token(); ?>">
                                <md-input-container>
                                    <label>Post</label>
                                    <input type="text" name="post" ng-model="post" >
                                </md-input-container>
                            </form>
                        </md-card>
                    </md-content>
                </div>

                {{--Right Column--}}
                <div flex="20" ng-controller="domainCtrl">
                    <div layout="row" layout-align="center start">
                        <div flex layout-padding>
                            <md-card>
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
                                        <p> #general </p>
                                        <p> #random </p>
                                    </div>

                                </md-card-content>
                            </md-card>
                            <md-card>
                                <md-toolbar id="tool-bar">
                                    <div class="md-toolbar-tools">
                                        <h2 class="md-title">Domains</h2>
                                    </div>
                                </md-toolbar>
                                <md-card-content style="max-height: 150px; overflow: auto">


                                    @foreach($domains as $domain)
                                        <p>{{ $domain->name }}</p>
                                    @endforeach
                                        <p id="domains"></p>

                                </md-card-content>
                                <md-divider></md-divider>
                                <div layout="row" layout-align="end end">
                                    <md-button ng-click="showDialog($event)">Add New</md-button>
                                </div>
                            </md-card>
                        </div>
                    </div>
                </div>
                {{--End Right Column--}}
            </md-content>

        </md-content>
    </body>
@endsection