
(function(){

    var omniBarApp = angular.module('OmniBar', ['ngMaterial']);

    omniBarApp.config(['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
    }]);

    omniBarApp.controller('AppCtrl', ['$scope','$http','$timeout','$q','$log','$mdDialog', function($scope, $http, $timeout, $q, $log, $mdDialog){

///////////////////////////////////////////////////////////////////////////////
//////////////////////////////////Search///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
        var self = this;
        self.simulateQuery = false;
        self.isDisabled    = false;
        self.querySearch   = querySearch;
        self.selectedItemChange = selectedItemChange;
        self.searchTextChange   = searchTextChange;

        function querySearch (query) {

            var promise      = $http.get('http://localhost/html/catchpenny/public/search/'+query);
            self.results = promise.then(function(response){
                return response.data;
            });

            if (self.simulateQuery) {
                deferred = $q.defer();
                $timeout(function () { deferred.resolve( self.results ); }, Math.random() * 1000, false);
                return deferred.promise;
            } else {
                return self.results;
            }
        }

        function searchTextChange(text) {
            $log.info('Text changed to ' + text);
        }
        function selectedItemChange(item) {
            $log.info('Item changed to ' + JSON.stringify(item));

        }
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////////Search///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

        //$http({
        //    method  : 'POST',
        //    url     : '/shop',
        //    data    :  $scope.itemEntry,  // pass in data as strings
        //    headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
        //});


    }]);
}());
