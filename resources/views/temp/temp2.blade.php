@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <body ng-app="OmniBar"  >
    <div ng-controller="AppCtrl" >

    <md-content style="height: 100%;">
        <div style="height: 10%;">
            <md-toolbar>
                <div class="md-toolbar-tools">
                    <span flex="20">CatchPenny</span>
                    <span flex>
                        <md-autocomplete>

                        </md-autocomplete>
                    </span>
                    <span flex="20">Sam Jackson</span>
                </div>
            </md-toolbar>
        </div>
        <md-content style="height: 90%" layout="row">
            <div flex="20">abcd</div>
            <div flex>
                <md-content>
                </md-content>
            </div>
            <div flex="20">abcd</div>
        </md-content>

    </md-content>
    </div>
    </body>

@endsection