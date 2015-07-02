@extends('material/template')



@section('title', 'Welcome')

@section('content')
    <body ng-app="OmniBar" class="fullbleed layout vertical">
    <div ng-controller="AppCtrl" layout="column">
        <md-content>
            <div layout-fill layout="row" layout-align="center center">
                <div flex hide-sm></div>
                <div flex>


                    <form name="newStatus" action="{{ url('api/post/'.$user->id) }}" method="post">
                        {!! csrf_field() !!}
                        @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <md-whiteframe class="md-whiteframe-z2" layout layout-align="center center">

                            <div layout="column">
                                <md-input-container>
                                    <label>Email</label>
                                    <input type="text" name="status" ng-model="status" required
                                           value="{{ old('status') }}">

                                    <div ng-messages="newStatus.status.$error" ng-show="newStatus.status.$dirty">
                                        <div ng-message="required">This is required!</div>
                                    </div>
                                </md-input-container>
                                <md-input-container>
                                    <md-button class="md-raised md-primary">Post</md-button>
                                </md-input-container>
                            </div>
                        </md-whiteframe>
                    </form>

                </div>
                <div flex hide-sm></div>
            </div>
        </md-content>
    </div>
    </body>

@endsection