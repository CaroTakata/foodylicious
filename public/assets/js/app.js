var app = angular.module("myApp", ["ngRoute"])
        .config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
            $locationProvider.hashPrefix('');
            $routeProvider                
                .when("/", {
                    templateUrl: "templates/post.html"
                })
                .when("/publicar-receta", {
                    templateUrl: "templates/publicarreceta.html"
                })
                .when("/mi-perfil", {
                    templateUrl: "templates/miperfil.html"
                })
                .when("/favoritos", {
                    templateUrl: "templates/favoritos.html"
                })
                .when("/editar-perfil", {
                    templateUrl: "templates/editarperfil.html"
                })
            .otherwise({
                redirectTo: '/' 
            });
        }]);
        