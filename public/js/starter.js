
(function(){

    var app = angular.module('OmniBar', ['ngMaterial']);
    var app1 = angular.module('Register', ['ngMaterial']);

    //var app = angular
    //    .module('MyApp', ['ngMaterial'])
    //    .controller('AppCtrl', function($scope) {});

    app.config(['$httpProvider', function ($httpProvider) {
        //$httpProvider.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
    }]);

    app.controller('AppCtrl', ['$scope','$http', function($scope, $http){

        var promise      = $http.get('http://localhost/html/catchpenny/public/api/profile');
        promise.then(function(response){
            $scope.data = response.data;
        });
        promise.error(function(reason){
            $scope.error = "Could Not fetch the user";
        });

    }]);

    app1.controller('AppCtrl', ['$scope', function($scope){}]);



}());
