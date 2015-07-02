var app = angular.module('OmniBar', ['ngMaterial']);
var app1 = angular.module('Register', ['ngMaterial']);

app.controller('AppCtrl', ['$scope', function($scope){}]);
app1.controller('AppCtrl', ['$scope', function($scope){}]);

var app = angular
    .module('MyApp', ['ngMaterial'])
    .controller('AppCtrl', function($scope) {});

//angular.module('whiteframeBasicUsage', ['ngMaterial']);
var app = angular.module('MyApp', ['ngMaterial']);

    app.controller('AppCtrl', function($scope) {
        function click() {
            $element.find('input')[0].click();
        }
    });
