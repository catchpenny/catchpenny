<html lang="en" ng-app="StarterApp">
<head>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.css">


</head>
<body layout="row" ng-controller="AppCtrl">

<div layout="column" class="relative" layout-fill role="main">

    <md-toolbar ng-show="!showSearch">
        <div class="md-toolbar-tools">
            <md-button ng-click="toggleSidenav('left')" hide-gt-md aria-label="Menu">
                <ng-md-icon icon="menu"></ng-md-icon>
            </md-button>
            <h3>
                Dashboard
            </h3>
            <span flex></span>
            <md-button aria-label="Search" ng-click="showSearch = !showSearch">
                <ng-md-icon icon="search"></ng-md-icon>
            </md-button>

        </div>

    </md-toolbar>
    <md-content flex md-scroll-y>
        <ui-view layout="column" layout-fill layout-padding>
            <div class="inset" hide-sm></div>
            <ng-switch on="data.selectedIndex" class="tabpanel-container">
                <div role="tabpanel"
                     id="tab1-content"
                     aria-labelledby="tab1"
                     ng-switch-when="0"
                     md-swipe-left="next()"
                     md-swipe-right="previous()"
                     layout="row" layout-align="center center">
                    <md-card flex-gt-sm="90" flex-gt-md="80">
                        <md-card-content>
                            <h2>Activity</h2>
                            <md-list>
                                <md-item ng-repeat="item in activity | filter:search">
                                    <md-item-content>
                                        <div class="md-tile-left inset" hide-sm>
                                            <user-avatar></user-avatar>
                                        </div>
                                        <div class="md-tile-content">
                                            <h3>@{{item.what}}</h3>
                                            <h4>@{{item.who}}</h4>
                                            <p>
                                                @{{item.notes}}
                                            </p>
                                        </div>
                                    </md-item-content>
                                    <md-divider md-inset hide-sm ng-if="!$last"></md-divider>
                                    <md-divider hide-gt-sm ng-if="!$last"></md-divider>
                                </md-item>
                                <md-divider></md-divider>
                                <md-item layout class="inset">
                                    <md-button layout layout-align="start center" flex class="md-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg> More
                                    </md-button>
                                </md-item>
                            </md-list>
                        </md-card-content>
                    </md-card>
                </div>
            </ng-switch>

        </ui-view>
    </md-content>
</div>
<!-- Angular Material Dependencies -->
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular-animate.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular-aria.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.js"></script>

<script src="//cdn.jsdelivr.net/angular-material-icons/0.4.0/angular-material-icons.min.js"></script>
<script>
    var app = angular.module('StarterApp', ['ngMaterial', 'ngMdIcons']);

    app.controller('AppCtrl', ['$scope', '$mdBottomSheet','$mdSidenav', '$mdDialog', function($scope, $mdBottomSheet, $mdSidenav, $mdDialog){

    }]);
</script>
</body>
</html>