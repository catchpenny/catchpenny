<!-- resources/views/auth/register.blade.php -->
@extends('material/template')

@section('title', 'Omnibar')

@section('content')
    <div ng-controller="AppCtrl">
        <md-content>
            <md-toolbar>
                <div class="md-toolbar-tools">
                    <md-button class="md-icon-button" aria-label="Settings">
                        <md-icon md-font-icon="icon-home"></md-icon>
                    </md-button>
                        <md-autocomplete
                                ng-disabled="ctrl.isDisabled"
                                md-no-cache="ctrl.noCache"
                                md-selected-item="ctrl.selectedItem"
                                md-search-text-change="ctrl.searchTextChange(ctrl.searchText)"
                                md-search-text="ctrl.searchText"
                                md-selected-item-change="ctrl.selectedItemChange(item)"
                                md-items="item in ctrl.querySearch(ctrl.searchText)"
                                md-item-text="item.display"
                                md-min-length="0"
                                placeholder="What is your favorite US state?">
                            <md-item-template>
                                <span md-highlight-text="ctrl.searchText"
                                      md-highlight-flags="^i">@{{item.display}}</span>
                            </md-item-template>
                            <md-not-found>
                                No matches found for "@{{ctrl.searchText}}".
                            </md-not-found>
                        </md-autocomplete>
                    <md-button class="md-icon-button" aria-label="Favorite">
                        <md-icon md-svg-icon="img/icons/favorite.svg" style="color: greenyellow;"></md-icon>
                    </md-button>
                    <md-button class="md-icon-button" aria-label="More">
                        <md-icon md-svg-icon="img/icons/more_vert.svg"></md-icon>
                    </md-button>
                </div>
            </md-toolbar>
        </md-content>
    </div>
@endsection