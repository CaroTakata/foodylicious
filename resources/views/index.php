<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="icon" type="image/png" href="assets/img/icon.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!--Icon Font-->
    <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />

    <!-- Extras -->
    <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">

    <!-- jQuery Load -->
    <script src="assets/js/jquery-min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
</head>

<body ng-app="myApp">

    <div ng-include="'partials/nav-menu.html'"></div>

    <div ng-view id="key-features-background"></div>

    <div ng-include="'partials/footer.html'"></div>

    <script>
        var app = angular.module("myApp", ["ngRoute"]);
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
    </script>
</body>

</html>