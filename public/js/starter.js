(function(){

    var app = angular.module('MyApp', ['ngMaterial']);

    app.config(['$httpProvider', function ($httpProvider) {
        //$httpProvider.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
    }]);

    app.controller('AppCtrl', function($scope, $http) {

        var promise      = $http.get('http://localhost/html/catchpenny/public/api/profile');
        promise.then(function(response){
            $scope.data = response.data;
        });
        promise.error(function(reason){
            $scope.error = "Could Not fetch the user";
        });

    });

}());