@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')

    <body layout="column" ng-app="mainApp" ng-controller="appCtrl" style="overflow: hidden;">

    <md-toolbar>
        <div class="md-toolbar-tools" layout="row">Header</div>
    </md-toolbar>
    <md-content layout="row">
        <md-content flex="20">

        </md-content>
        <md-content flex>
                <md-card>
                    <md-card-content>
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
                        <md-content layout="column">
                            <div flex>
                                <md-input-container>
                                    <label> Input </label>
                                    <input type="text">
                                </md-input-container>
                            </div>
                        </md-content>
                    </md-card-content>
                </md-card>
        </md-content>
        <md-content flex="20" ng-controller="domainCtrl">
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


                            {{--@foreach($domains as $domain)--}}
                                {{--<p>{{ $domain->name }}</p>--}}
                            {{--@endforeach--}}
                            <p id="domains"></p>

                        </md-card-content>
                        <md-divider></md-divider>
                        <div layout="row" layout-align="end end">
                            <md-button ng-click="showDialog($event)">Add New</md-button>
                        </div>
                    </md-card>
                </div>
            </div>
        </md-content>
    </md-content>


    </body>

@endsection