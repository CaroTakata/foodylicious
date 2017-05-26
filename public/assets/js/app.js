var app = angular.module("myApp", ['ngRoute', 'ngFileUpload'])
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

app.run(['$rootScope', '$location', '$routeParams', function ($rootScope, $location, $routeParams) {
    $rootScope.$on('$routeChangeSuccess', function (e, current, pre) {
        console.log('Current route name: ' + $location.path());

        var currentPath = $location.path();
        currentPath = currentPath.trim();

        switch (currentPath) {
            case "/":
                $(".profile-usermenu .nav li").removeClass("active");
                $('.profile-usermenu a[href="#home"]').closest("li").addClass("active");
                break;
            case "/publicar-receta":
                $(".profile-usermenu .nav li").removeClass("active");
                $('.profile-usermenu a[href="#publicar-receta"]').closest("li").addClass("active");
                break;
            case "/mi-perfil":
                $(".profile-usermenu .nav li").removeClass("active");
                $('.profile-usermenu a[href="#mi-perfil"]').closest("li").addClass("active");
                break;
            case "/favoritos":
                $(".profile-usermenu .nav li").removeClass("active");
                $('.profile-usermenu a[href="#favoritos"]').closest("li").addClass("active");
                break;
            case "/editar-perfil":
                $(".profile-usermenu .nav li").removeClass("active");
                $('.profile-usermenu a[href="#editar-perfil"]').closest("li").addClass("active");
                break;
            default:

                break;
        }
    });
}]);