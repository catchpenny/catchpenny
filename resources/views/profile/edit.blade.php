@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <body ng-app="OmniBar" class="fullbleed layout vertical">
    <div ng-controller="AppCtrl">
        <md-content layout="row" class="mainBody" layout-fill>
            {{-- Left SideBar --}}

            <div flex="20">
                <md-toolbar>
                    <div class="md-toolbar-tools" style="background-color: #009688;">
                        <h3>
                            <span>CatchPenny</span>
                        </h3>
                    </div>
                </md-toolbar>
                <md-whiteframe class="md-whiteframe-z1" layout>
                    <span>.md-whiteframe-z2</span>
                </md-whiteframe>
            </div>

            {{-- Middle SideBar --}}
            <div flex>
                <md-toolbar style="background-color: #009688;">
                    <div class="md-toolbar-tools">
                        <md-autocomplete md-selected-item="selectedItem" md-search-text="searchText"
                                         md-items="item in getMatches(searchText)" md-item-text="item.display"
                                         style="width: 100%;">
                            <span md-highlight-text="searchText">@{{item.display}}</span>
                        </md-autocomplete>
                    </div>
                </md-toolbar>
                <md-content layout-fill>
                    <div layout="column" layout-fill>
                        <md-whiteframe class="md-whiteframe-z1" layout layout-align="center center">
                            <div layout="column" style="width:100%;">
                                    <span>

                                        <form action="" method="post" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <div layout="column">
                                                <div layout="row" layout-align="center center">
                                                    <label class="md-primary md-raised md-button" md-ink-ripple
                                                           for="profilePhoto">
                                                        <span>Select Profile Photo</span>
                                                    </label>
                                                    <input id="profilePhoto" ng-file-select="onFileSelect($files)"
                                                           name="profilePhoto" type="file" style=" display: none; ">
                                                    <label class="md-primary md-raised md-button" md-ink-ripple
                                                           for="coverPhoto">
                                                        <span>Select Cover Photo</span>
                                                    </label>
                                                    <input id="coverPhoto" ng-file-select="onFileSelect($files)"
                                                           name="coverPhoto" type="file" style=" display: none; ">
                                                </div>
                                            </div>
                                            <md-input-container>
                                                <label>About Me</label>
                                                <input type="text" name="aboutMe" ng-model="data.profile.aboutMe"/>
                                            </md-input-container>
                                            <md-input-container>
                                                <label>Relationship Status</label>
                                                <input type="text" name="relationshipStatus"
                                                       ng-model="data.profile.relationshipStatus"
                                                       value="{{ $profile->relationshipStatus }}"/>
                                            </md-input-container>
                                            <md-input-container>
                                                <label>Contact</label>
                                                <input type="text" name="contactNumber"
                                                       ng-model="data.profile.contactNumber"
                                                       value="{{ $profile->contactNumber }}"/>
                                            </md-input-container>
                                            <md-input-container>
                                                <label>City</label>
                                                <input type="text" name="city" ng-model="data.profile.city"
                                                       value="{{ $profile->city }}"/></md-input-container>
                                            <md-input-container>
                                                <label>Country</label>
                                                <input type="text" name="country" ng-model="data.profile.country"
                                                       value="{{ $profile->country }}"/>
                                            </md-input-container>
                                            <md-input-container>
                                                <md-button class="md-raised md-primary">Save Changes</md-button>
                                            </md-input-container>
                                        </form>
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </span>
                            </div>
                        </md-whiteframe>
                    </div>
                </md-content>
            </div>
            {{-- Right SideBar --}}
            <div flex="20">
                <md-toolbar style="background-color: #009688;">
                    <div class="md-toolbar-tools">
                        <span flex></span>
                        <span>{{ $user->firstName . " " . $user->lastName }}</span>
                    </div>
                </md-toolbar>
                <md-whiteframe class="md-whiteframe-z2" layout>
                    <span>.md-whiteframe-z2</span>
                </md-whiteframe>
            </div>
        </md-content>
    </div>
    </body>
@endsection