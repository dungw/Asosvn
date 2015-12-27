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
    'ui.router',
    'ngMessages'
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
        .state('login', {
            url: "/login",
            templateUrl: "views/login.html",
            controller: "LoginCtrl"
        })
        .state('about', {
            url: "/about",
            templateUrl: 'views/about.html',
            controller: 'AboutCtrl'
        })
        .state('contact', {
            url: "/contact",
            templateUrl: 'views/contact-us.html',
            controller: 'ContactCtrl'
        })
        .state('product', {
            url: "/product/:product_slug",
            templateUrl: "views/product-details.html",
            controller: "productDetailsCtrl"
        });
  });
