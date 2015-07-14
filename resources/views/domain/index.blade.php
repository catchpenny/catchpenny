@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <body ng-app="domain">
    <div ng-controller="domainCtrl">

        <md-content style="height: 100%;">
            <div style="height: 10%;">
                <md-toolbar id="topToolbar">
                    <div class="md-toolbar-tools">
                        <span flex="20">CatchPenny</span>
                    <span flex>
                        {{--<md-autocomplete md-selected-item="selectedItem" md-search-text="searchText"--}}
                                         {{--md-items="item in getMatches(searchText)"--}}
                                         {{--md-item-text="item.display">--}}
                            {{--<span md-highlight-text="searchText">@{{item.display}}</span>--}}
                        {{--</md-autocomplete>--}}
                    </span>
                        <span flex="20">Sam Jackson</span>
                    </div>
                </md-toolbar>
            </div>
            <md-content style="height: 90%" layout="row">
                {{--Left Column--}}
                <div flex="20">abcd</div>
                {{--End Left Column--}}

                <div flex>
                    <md-content>
                        <md-card>
                            {{--@foreach($domains as $domain)--}}
                                {{--<h2>{{ $domain->name }}</h2>--}}
                                {{--<p>{{ $domain->description }}</p>--}}
                            {{--@endforeach--}}
                        </md-card>
                    </md-content>
                </div>

                {{--Right Column--}}
                <div flex="20">
                    <div layout="row" layout-align="center start">
                        <div flex layout-padding>
                            <md-card>
                                <md-toolbar id="tool-bar">
                                    <div class="md-toolbar-tools">
                                        <h2 class="md-title">Domains</h2>
                                    </div>
                                </md-toolbar>
                                <md-card-content>
                                    @foreach($domains as $domain)
                                        <p>{{ $domain->name }}</p>
                                    @endforeach
                                    <div id="domains"></div>
                                </md-card-content>
                                <md-divider></md-divider>
                                <div layout="row" layout-align="end end">
                                    <md-button ng-click="showDialog($event)">Add New</md-button>
                                </div>
                            </md-card>
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
                                    <p>
                                        #general
                                    </p>
                                </md-card-content>
                            </md-card>
                        </div>
                    </div>
                </div>
                {{--End Right Column--}}
            </md-content>

        </md-content>
    </div>
    </body>
@endsection