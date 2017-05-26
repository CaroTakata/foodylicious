angular.module('myApp')
    .controller('mainController', ['$scope', '$rootScope', function ($scope, $rootScope) {

    }])
    .controller('postController', ['$scope', '$http', function ($scope, $http) {
        $scope.posts;
        $http.get("api/post").then(function (response) {
            $scope.posts = response.data;
            console.log(response.data);
        })
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

