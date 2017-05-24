var app = angular.module("myApp", ["ngRoute"]);
        app.config(function ($routeProvider) {
            $routeProvider                
                .when("/", {
                    templateUrl: "templates/post.html"
                });
        });
        app.run(['$rootScope', function ($rootScope) {
            $rootScope.$on('$routeChangeSuccess', function (next, current) {
                console.log("TESTING");
            });
        }]);
        