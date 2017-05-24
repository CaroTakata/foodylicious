angular.module('myApp')
    .controller('mainController', ['$scope', '$rootScope', function ($scope, $rootScope) {

    }])
    .controller('headerController', ['$scope', function ($scope, $rootScope) {
        $scope.buscarClick = function(){
            $("#homeFiltros").slideDown(800);
        };
    }]);