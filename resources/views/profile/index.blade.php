@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <div ng-controller="AppCtrl">
        <div layout="column" layout-fill>
            <md-toolbar>
                <div class="md-toolbar-tools">
                    <span>CatchPenny Project</span>
                    <!-- fill up the space between left and right area -->
                    <span flex></span>
                    <span flex="50">
                        <md-autocomplete md-selected-item="selectedItem" md-search-text="searchText" md-items="item in getMatches(searchText)" md-item-text="item.display">
                            <md-item-template>
                                <span md-highlight-text="searchText">@{{item.display}}</span>
                            </md-item-template>
                            <md-not-found>
                                No matches found.
                            </md-not-found>
                        </md-autocomplete>
                    </span>
                    <span flex></span>
                    <md-button>
                        Right Bar Button
                    </md-button>
                </div>
            </md-toolbar>
            <md-content class="md-padding">

                <div layout="column" id="testmargin">
                    <md-card layout>
                        <img ng-src="{{ url('img/img.jpg') }}" class="md-card-image" alt="Washed Out" style="height: 350px;">
                        <md-card-content>
                            <h2 class="md-title">{{ $user->firstName }} {{ $user->lastName }}</h2>
                            <p>
                                {{ $profile->aboutMe }}
                            </p>
                            <p>
                                {{ $user->dateOfBirth }}
                                {{ $user->gender }}
                                {{ $profile->relationshipStatus }}
                                {{ $profile->contactEmail }}
                                {{ $profile->contactNumber }}
                                {{ $profile->city }}
                                {{ $profile->country }}
                            </p>
                        </md-card-content>
                        <div class="md-actions" layout="row" layout-align="end center">
                            <a href="{{ url('profile/edit') }}"><md-button>Edit</md-button></a>
                        </div>
                        </md-card>
                </div>
                <div layout="row">
                    <div flex="20" hide-sm>
                        <md-whiteframe class="md-whiteframe-z1" layout>
                            <span>.md-whiteframe-z2</span>
                        </md-whiteframe>
                    </div>
                    <div flex>
                        <div layout="column" layout-fill>
                            <md-whiteframe class="md-whiteframe-z1" layout layout-align="center center">
                                <div layout="column" style="width:100%;">
                                    <span>
                                    <md-input-container>
                                        <label>Whats on your mind..</label>
                                        <input ng-model="user.status">
                                    </md-input-container>
                                    </span>
                                    <div layout="row" layout-align="end center">
                                        <md-input-container>
                                            <md-button class="md-raised md-primary">Post</md-button>
                                        </md-input-container>
                                    </div>
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
    </div>
@endsection