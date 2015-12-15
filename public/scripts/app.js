'use strict';

/**
 * @ngdoc overview
 * @name tmpApp
 * @description
 * # tmpApp
 *
 * Main module of the application.
 */
angular
  .module('AsosVnApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ui.router'
  ])
  .config(function ($stateProvider, $urlRouterProvider, $locationProvider) {

    $locationProvider.html5Mode({
        enabled: true,
        requireBase: true}).hashPrefix('!');

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('/', {
            url: "/",
            templateUrl: "views/home.html",
            controller: "HomeCtrl"
        })
        .state('around', {
            url: "/about",
            templateUrl: 'views/about.html',
            controller: 'AboutCtrl'
        });
  });
