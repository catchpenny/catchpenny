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
                    <md-card>
                        <md-toolbar>

                        </md-toolbar>
                        <md-card-content>
                            <md-list>
                                <md-subheader class="md-no-sticky">3 line item</md-subheader>
                                <md-list-item class="md-3-line">
                                    <img src="http://www.fanphobia.net/uploads/actors/2882/matt-ryan-actor-profile-picture.jpg" class="md-avatar" />
                                    <div class="md-list-item-text">
                                        <h3> item.who</h3>
                                        <p> item.notes </p>
                                    </div>
                                </md-list-item>
                                <md-divider ></md-divider>
                            </md-list>
                        </md-card-content>
                    </md-card>
                </md-content>
            </div>
            <div flex="20">abcd</div>
        </md-content>

    </md-content>
    </div>
    </body>

@endsection