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
  .module('ThepDungApp', [
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
        enabled: false,
        requireBase: true}).hashPrefix('!');

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('/', {
            url: "/",
            templateUrl: "views/home.html",
            controller: "HomeCtrl"
        })
        .state('about', {
            url: "/about",
            templateUrl: 'views/about.html',
            controller: 'AboutCtrl'
        });
  });
