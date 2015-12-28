/**
 * Created by Nhu Thep on 12/27/2015.
 */

'use strict';

angular.module('ThepDungApp')
    .controller('productDetailsCtrl', function ($state, $scope, $rootScope, $http, $stateParams) {

        $scope.getProduct = function() {
            var slugProduct = $stateParams.product_slug;
            if (slugProduct != '') {
                $http.get('product/' + slugProduct).then(function(data) {
                    if (data.data.id) {
                        $scope.product = data.data;
                    } else {
                        $state.go('/');
                    }
                });
            }
        };

        $scope.getProduct();

    });
