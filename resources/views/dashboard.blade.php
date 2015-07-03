@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <link rel="import" href="{{ url('elements/omni-bar-tall.html') }}">
    <link rel="import" href="{{ url('elements/new-status.html') }}">
    <body ng-app="OmniBar" class="fullbleed layout vertical">
    <div ng-controller="AppCtrl">
        <omni-bar>
            <paper-icon-button src="{{ url('api/image/') }}/{{ $profile->photoSmall }}"></paper-icon-button>
            <div layout="column" layout-fill>
                <md-content class="md-padding">
                    <div layout="row">
                        <div flex="20" hide-sm>
                            <md-whiteframe class="md-whiteframe-z1" layout>
                                <span>.md-whiteframe-z2</span>
                            </md-whiteframe>
                        </div>
                        <div flex>
                            <div layout="column" layout-fill>
                                <new-status></new-status>
                                <md-whiteframe class="md-whiteframe-z1" layout layout-align="center center">

                                    <div layout="column" style="width:100%;">
                                        <md-list>
                                            <md-list-item class="md-2-line">
                                                <img ng-src="http://www.worthwild.com/assets/img-mas-02-73410a2b7c925f01866e68f4651510a0.jpg"
                                                     class="md-avatar" alt="@{{todos[0].who}}"/>

                                                <div class="md-list-item-text">
                                                    <h3>Sam Jackson</h3>

                                                    <p>just now</p>

                                                    <p>Hey Guys I am New To CatchPenny Project</p>
                                                </div>
                                            </md-list-item>
                                        </md-list>

                                    </div>
                                </md-whiteframe>
                            </div>
                        </div>
                        <div flex="20" hide-sm>
                            <md-whiteframe class="md-whiteframe-z2" layout>
                                <span>.md-whiteframe-z2</span>
                            </md-whiteframe>
                        </div>
                    </div>
                </md-content>
            </div>
        </omni-bar>
    </div>
    </body>

@endsection