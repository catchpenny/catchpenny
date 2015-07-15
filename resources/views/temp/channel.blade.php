@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <body ng-app="mainApp">
    <md-card style="margin: 0px;">
        <md-toolbar>

        </md-toolbar>
        <md-card-content style=" padding: 0px;" layout="row">

            <div flex>
                <md-card style="margin: 0px; padding: 0px;">
                    <md-toolbar style="background-color: white;">
                    </md-toolbar>
                    <md-card-content style="background-color: #EEEEEE; height: 450px;">

                    </md-card-content>
                    <md-autocomplete md-selected-item="selectedItem" md-search-text="searchText" md-items="item in getMatches(searchText)" md-item-text="item.display">
                        <span md-highlight-text="searchText">@{{item.display}}</span>
                    </md-autocomplete>
                </md-card>
            </div>
            <div flex="20">
                <md-card style="margin: 0px; padding: 0px;">
                    <md-toolbar style="background-color: white;">
                    </md-toolbar>
                    <md-card-content style="background-color: #F5F5F5;">

                    </md-card-content>
                </md-card>
            </div>

        </md-card-content>
    </md-card>
    </body>
@endsection