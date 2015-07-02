@extends('material/template')

@section('title', 'CatchPenny Project')

@section('content')
    <div ng-controller="AppCtrl">
        <div layout="column" layout-fill>
            <md-toolbar>
                <div class="md-toolbar-tools">
                    <span>CatchPenny Project</span>
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

                                        <form action="" method="post" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <div layout="column">
                                                <label class="md-primary md-raised md-button" md-ink-ripple for="profilePhoto">
                                                    <span>Select Profile Photo</span>
                                                </label>
                                                <input id="profilePhoto" ng-file-select="onFileSelect($files)" name="profilePhoto" type="file" style=" display: none; ">
                                                <label class="md-primary md-raised md-button" md-ink-ripple for="coverPhoto">
                                                    <span>Select Cover Photo</span>
                                                </label>
                                                <input id="coverPhoto" ng-file-select="onFileSelect($files)" name="coverPhoto" type="file" style=" display: none; ">
                                            </div>
                                            <md-input-container>
                                                <label>About Me</label>
                                                <input type="text" name="aboutMe" value="{{ $profile->aboutMe }}"/>
                                            </md-input-container>
                                            <md-input-container>
                                                <label>Relationship Status</label>
                                                <input type="text" name="relationshipStatus" value="{{ $profile->relationshipStatus }}"/>
                                            </md-input-container>
                                            <md-input-container>
                                                <label>Contact</label>
                                                <input type="text" name="contactNumber" value="{{ $profile->contactNumber }}"/>
                                            </md-input-container>
                                            <md-input-container>
                                                <label>City</label>
                                                <input type="text" name="city" value="{{ $profile->city }}"/>                                            </md-input-container>
                                            <md-input-container>
                                                <label>Country</label>
                                                <input type="text" name="country" value="{{ $profile->country }}"/>
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