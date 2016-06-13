var app =  angular.module('cApp',['ngRoute','ngTable','toaster','ui.mask']);
app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/customers', {
                templateUrl: 'templates/customers.html',
                controller: 'CustomerController'
            });
    }]);
