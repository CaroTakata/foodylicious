var app = angular.module("myApp", ["ngRoute"])
        .config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
            $locationProvider.hashPrefix('');
            $routeProvider                
                .when("/", {
                    templateUrl: "templates/publicaciones.html"
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
                .when("/publicacion", {
                    templateUrl: "templates/verpost.html"
                })
                .when("/editar-publicacion", {
                    templateUrl: "templates/editarpost.html"
                })
                .when("/siguiendo", {
                    templateUrl: "templates/siguiendo.html"
                })
                .when("/seguidores", {
                    templateUrl: "templates/seguidores.html"
                })
                .when("/perfil", {
                    templateUrl: "templates/verotroperfil.html"
                })
            .otherwise({
                redirectTo: '/' 
            });
        }]);
        