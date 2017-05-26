var app = angular.module("myApp", ['ngRoute', 'ngFileUpload']);
app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "templates/main.html"
        })
        .when("/sign-up", {
            templateUrl: "templates/sign-up.html"
        })
        .when("/sign-in", {
            templateUrl: "templates/sign-in.html"
        });
});
app.run(['$rootScope', function ($rootScope) {
    $rootScope.$on('$routeChangeSuccess', function (next, current) {

    });
}]);
app
    .controller('loginController', ['$scope', '$http', function ($scope, $http) {
        $scope.loginSubmit = function () {

            var email = $("#signinemail").val();
            var password = $("#signinpassword").val();

            $http({
                method: 'POST',
                url: 'http://localhost:8000/api/login',
                data:
                {
                    'email': email,
                    'password': password
                }
            }).then(function successCallback(response) {
                var data = response.data;

                if (data.msg == "Success") {
                    localStorage.usuario = JSON.stringify(data.user);
                    window.location.replace("/home");
                }
                else {
                    console.log(response.data);
                    alert("Tu correo o contraseña son incorrectos");
                }
            }, function errorCallback(response) {
                console.log(response);
                alert("Tu correo o contraseña son incorrectos");
            });
        }
    }])

    .controller('registerController', ['$scope', '$http', '$rootScope', 'Upload', function ($scope, $http, $rootScope, Upload) {

        $scope.uploadPic = function (file) {

            var name = $("#signupusername").val();
            var email = $("#signupemail").val();
            var password = $("#signuppassword").val();
            var gender = $("#signupgenero option:selected").val();

            Upload.upload({
                url: 'http://localhost:8000/api/user',
                data: {
                    'name': name,
                    'email': email,
                    'password': password,
                    'gender': gender,
                    'file': file
                }
            }).then(function (response) {
                var data = response.data;

                if (data.msg == "Success") {
                    localStorage.usuario = JSON.stringify(data.user);
                    window.location.replace("/home");
                }
                else {
                    console.log(response.data);
                    alert("Ocurrió un error inesperado");
                }
            }, function errorCallback(response) {
                alert("Ocurrió un error inesperado");
            });
        };

    }]);