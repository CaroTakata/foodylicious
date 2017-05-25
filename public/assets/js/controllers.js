angular.module('myApp')
    .controller('mainController', ['$scope', '$rootScope', function ($scope, $rootScope) {

    }])
    .controller('postController', ['$scope', '$http', function ($scope, $http) {
        $scope.posts;
        $http.get("api/post").then(function(response){
            $scope.posts = response.data;
            console.log(response.data);
        })
    }])
    .controller('headerController', ['$scope', function ($scope, $rootScope) {
        $scope.buscarClick = function(){
            $("#homeFiltros").slideDown(800);
        };
        
    }]);