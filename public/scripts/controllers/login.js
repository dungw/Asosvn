'use strict';

angular.module('ThepDungApp')
    .controller('LoginCtrl', function ($state, $scope, $rootScope, $http) {
        //get logged in user
        $rootScope.getLoggedInUser = function() {
            $http.get('user/logged-in').then( function(data) {
                $rootScope.userLoggedIn = data.data;
            });
        };

        //call function get logged in user
        $rootScope.getLoggedInUser();

        $scope.signUp = function () {
            var data = {
                name: $scope.name,
                email: $scope.email,
                password: $scope.password
            };
            $http.post('user', data).then(function (data) {
                if (data.data.messageEmail) {
                    $scope.messageEmail = data.data.messageEmail;
                } else {
                    var user = data.data;
                    if (user.id) {
                        $rootScope.userLoggedIn = user;
                        $state.go('/');
                    }
                }
            });
        };

        $scope.login = function() {
            var data = {
                email: $scope.loginEmail,
                password: $scope.loginPassword
            };
            $http.post('user/login', data).then(function(data) {
                var user = data.data;
                if (user.code != 'success') {
                    $scope.messageLogin = 'Wrong email or password!';
                }
                if (user.id) {
                    $rootScope.userLoggedIn = user;
                    $state.go('/');
                }
            });
        };

        $scope.logout = function() {
            $http.get('user/logout').then( function() {
                $rootScope.userLoggedIn = [];
                $state.go('/');
            })
        };

    }).directive('confirmPwd', function($interpolate, $parse) {
        return {
            require: 'ngModel',
            link: function(scope, elem, attr, ngModelCtrl) {

                var pwdToMatch = $parse(attr.confirmPwd);
                var pwdFn = $interpolate(attr.confirmPwd)(scope);

                scope.$watch(pwdFn, function(newVal) {
                    ngModelCtrl.$setValidity('password', ngModelCtrl.$viewValue == newVal);
                })

                ngModelCtrl.$validators.password = function(modelValue, viewValue) {
                    var value = modelValue || viewValue;
                    return value == pwdToMatch(scope);
                };

            }
        }
    });
