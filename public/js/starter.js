
(function(){

    var omniBarApp = angular.module('OmniBar', ['ngMaterial']);
    var app1 = angular.module('Register', ['ngMaterial']);

    //var app = angular
    //    .module('MyApp', ['ngMaterial'])
    //    .controller('AppCtrl', function($scope) {});
    //
    //omniBarApp.config(['$httpProvider', function ($httpProvider) {
    //    //$httpProvider.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
    //}]);

    omniBarApp.controller('AppCtrl', ['$scope','$http', function($scope, $http){
        $scope.items = [
            { name: 'Overview'},
            { name: 'Work and Education'},
            { name: 'Contact and Basic Info'},
            { name: 'Details'}
        ];

        //var promise      = $http.get('http://localhost/html/catchpenny/public/api/profile');
        //promise.then(function(response){
        //    $scope.data = response.data;
        //});
        //promise.error(function(reason){
        //    $scope.error = "Could Not fetch the user";
        //});

    }]);

    app1.controller('AppCtrl', ['$scope', function($scope){}]);

   /*
    *   Profile App Model and Controller
    */
    var profileModel = angular.module('profileModel', ['ngMaterial']);
        profileModel.controller('profileCtrl', ['$scope','$http', function($scope, $http){

            //var promise      = $http.get('http://localhost/html/catchpenny/public/api/profile');
            //promise.then(function(response){
            //    $scope.data = response.data;
            //});
            //promise.error(function(reason){
            //    $scope.error = "Could Not fetch the user";
            //});

    }]);

    /*
     *   Domain App Controller
     */
    var domain = angular.module('domain', ['ngMaterial']);
    domain.controller('domainCtrl', ['$scope','$mdDialog', function($scope,$mdDialog){
        $scope.showDialog = function(ev) {
            $mdDialog.show({
                controller: DialogController,
                templateUrl: 'domain/create',
                parent: angular.element(document.body),
                targetEvent: ev
            })
                .then(function(answer) {
                    $scope.alert = 'You said the information was "' + answer + '".';
                }, function() {
                    $scope.alert = 'You cancelled the dialog.';
                });
        };
    }]);

    function DialogController($scope, $mdDialog) {
        $scope.hide = function() {
            $mdDialog.hide();
        };
        $scope.cancel = function() {
            $mdDialog.cancel();
        };
        $scope.answer = function(answer) {
            $mdDialog.hide(answer);
        };
    }

}());