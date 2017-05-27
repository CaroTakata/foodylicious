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

        $scope.eliminarClick = function (post) {

            console.log("Eliminar Click");
        }

        $scope.editarClick = function (post) {
            localStorage.post = JSON.stringify(post);
            window.location.href = "#/editar-publicacion";
        }
    }])
    .controller('headerController', ['$scope', '$rootScope', function ($scope, $rootScope) {
        $scope.buscarClick = function () {
            $("#homeFiltros").slideDown(800);
        };
    }])
    .controller('sidebarController', ['$scope', '$rootScope', function ($scope, $rootScope) {
        $rootScope.usuario = JSON.parse(localStorage.usuario);

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
    .controller('editarPerfilController', ['$scope', '$http', '$rootScope', 'Upload', function ($scope, $http, $rootScope, Upload) {
        $scope.usuario = JSON.parse(localStorage.usuario);

        $scope.submitClick = function (file) {

            var name = $("#editarPNombre").val();
            var email = $("#editarPCorreo").val();
            var birthdate = $("#editarPDate").val();
            var gender = $("#editarPGenero").val();

            Upload.upload({
                url: 'http://localhost:8000/api/user/' + $scope.usuario.id,
                data: {
                    'name': name,
                    'email': email,
                    'birthdate': birthdate,
                    'gender': gender,
                    'file': file
                }
            }).then(function (response) {
                var data = response.data;
                $scope.usuario = data.user;
                localStorage.usuario = JSON.stringify($scope.usuario);
                $rootScope.usuario = $scope.usuario;

                console.log(data);
            }, function errorCallback(response) {
                console.log(response.data);
            });


        }

        $scope.onFileSelect = function (obj) {
            var preview = document.querySelector('#editarPImagen1');
            var file = document.querySelector('#editarPImagen').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        $scope.imageClick = function () {
            $("#editarPImagen").trigger("click");
        }

    }])
    .controller('editarPostController', ['$scope', '$http', function ($scope, $http) {
        $scope.post = JSON.parse(localStorage.post);


        $scope.guardarClick = function () {
            var title = $("#editarInputTitulo").val()
            var description = $("#editarDescripcion").val();
            var ingredients = $("#editarIngredientes").val();
            var method = $("#editarProcedimiento").val();
            var id = $scope.post.id;

            $http({
                method: 'PUT',
                url: 'http://localhost:8000/api/post/' + id,
                data: {
                    'title': title,
                    'description': description,
                    'ingredients': ingredients,
                    'method': method        
                }
            }).then(function successCallback(response) {
                console.log(response.data);
            }, function errorCallback(response) {
                console.log(response.data);
            });
        }
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

