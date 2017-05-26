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
        $scope.usuario =  JSON.parse(localStorage.usuario);
        
        console.log( $scope.usuario);

        $scope.buscarClick = function () {
            $("#homeFiltros").slideDown(800);
        };

    }])
    .controller('newPostController', ['$scope', function ($scope, $rootScope) {
        $scope.buscarClick = function () {
            $("#publicarImg").click(function () {
                $("#publicarImagen").trigger("click");
            }
            );
        };

    }]);

