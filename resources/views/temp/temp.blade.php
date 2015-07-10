@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')

    <body ng-app="OmniBar" class="fullbleed layout vertical">
    <div ng-controller="AppCtrl">
        <md-content layout="row" class="mainBody" layout-fill>

            {{-- Middle SideBar --}}
            <div flex>
                <md-toolbar style="background-color: #009688;">
                    <div class="md-toolbar-tools">

                    </div>
                </md-toolbar>
            </div>

        </md-content>
    </div>
    </body>

@endsection