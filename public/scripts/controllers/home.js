/**
 * Created by nhuthep on 12/15/15.
 */

'use strict';

angular.module('ThepDungApp')
    .controller('HomeCtrl', function ($scope, $rootScope, $http) {
        $http.get('products').then(function(data) {
           $scope.products = data.data;
        });
    });
