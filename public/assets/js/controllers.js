angular.module('myApp')
    .controller('mainController', ['$scope', '$rootScope', function ($scope, $rootScope) {

    }])
    .controller('postController', ['$scope', '$http', function ($scope, $http) {
        $scope.posts;
        $scope.usuario = JSON.parse(localStorage.usuario);

        $http.get("api/post").then(function (response) {
            $scope.posts = response.data;
            console.log(response.data);
        })

        $scope.usuarioClick = function () {
            console.log("usuarioClick");
            window.location.href = "#perfil";
        };

        $scope.masInformacionClick = function () {
            console.log("masInformacionClick");
            window.location.href = "#publicacion";
        }
    }])
    .controller('headerController', ['$scope', function ($scope, $rootScope) {
        $scope.buscarClick = function () {
            $("#homeFiltros").slideDown(800);
        };
    }])
    .controller('sidebarController', ['$scope', function ($scope, $rootScope) {
        $scope.usuario = JSON.parse(localStorage.usuario);

        console.log($scope.usuario);

        $scope.buscarClick = function () {
            $("#homeFiltros").slideDown(800);
        };

    }])
    .controller('perfilController', ['$scope', '$http', '$rootScope', function ($scope, $http, $rootScope) {

        $scope.usuario = JSON.parse(localStorage.usuario);
        $id = $scope.usuario.id;

        $http({
            method: 'GET',
            url: 'http://localhost:8000/api/post/' + $id
        }).then(function successCallback(response) {
            $scope.usuario = response.data;
            console.log(response.data);
        }, function errorCallback(response) {
            console.log(response.data);
            alert("Ocurrió un error inesperado");
        });

    }])
    .controller('editarPerfilController', ['$scope', '$http', '$rootScope', function ($scope, $http, $rootScope) {

        $scope.usuario = JSON.parse(localStorage.usuario);
        
    }])
    .controller('newPostController', ['$scope', '$http', '$rootScope', 'Upload', function ($scope, $http, $rootScope, Upload) {
        $scope.buscarClick = function () {
            $("#publicarImagen").trigger("click");
        };

        $scope.submitClick = function (file) {

            var usuario = JSON.parse(localStorage.usuario);

            var title = $("#publicarInputTitulo").val();
            var description = $("#publicarDescripcion").val();
            var ingredients = $("#publicarIngredientes").val();
            var method = $("#publicarProcedimiento").val();

            Upload.upload({
                url: 'http://localhost:8000/api/post',
                data: {
                    'title': title,
                    'description': description,
                    'ingredients': ingredients,
                    'method': method,
                    'user_id': usuario.id,
                    'file': file
                }
            }).then(function (response) {
                var data = response.data;
                console.log(data);
            }, function errorCallback(response) {
                console.log(response.data);
            });
        };
    }]);

