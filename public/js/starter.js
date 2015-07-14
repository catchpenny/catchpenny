
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
    }]);

    var domain = angular.module('domain', ['ngMaterial']);

    domain.config(['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
    }]);

    domain.controller('domainCtrl', ['$scope','$http','$mdDialog','$mdToast','$q',
        function($scope,$http,$mdDialog,$mdToast,$q){


///////////////////////////////////////////////////////////////////////////////
///////////////////////////Domain Dialog///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
            $scope.showDialog = function(ev) {
                $mdDialog.show({
                    controller: DialogController,
                    templateUrl: 'domain/create',
                    parent: angular.element(document.body),
                    targetEvent: ev
                })
                    .then(function(answer) {
                        console.log(answer);
                    }, function() {
                        console.log("exit form");
                    });
            };

            function DialogController($scope, $mdDialog) {
                $scope.nameError = '';
                $scope.mustHide = true;
                $scope.hide = function() {
                    $mdDialog.hide();
                };
                $scope.cancel = function() {
                    $mdDialog.cancel();
                };
                $scope.domainCreateSubmit = function(data) {
                    $scope.mustHide = false;
                    var promise = domainCreateSubmitFormAjax(data);
                    promise.then(function(res){
                        //console.log(JSON.stringify(res));
                        appendToDomains(res);
                        $mdDialog.hide('successfully exiting');
                        $scope.mustHide = true;
                    },function(res){
                        $scope.nameError = res.name;
                        $scope.descriptionError = res.description;
                        $scope.mustHide = true;
                    });
                };
            }

            appendToDomains =  function(data){

                var myEl = angular.element( document.querySelector( '#domains' ) );
                myEl.append('<p>'+ data.name +'<p>');
            };

            domainCreateSubmitFormAjax = function(data){

                    var deferred = $q.defer();
                    var promise = $http.post('domain/create',data)
                        .success(function(res){
                            deferred.resolve(res);
                        }).error(function(res) {
                            deferred.reject(res);
                        });
                    return deferred.promise;
            };
///////////////////////////////////////////////////////////////////////////////
///////////////////////////Domain Dialog///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
    }]);

}());

