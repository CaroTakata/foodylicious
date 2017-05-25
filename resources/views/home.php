<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Foodylicious</title>
  <link rel="icon" type="image/png" href="assets/img/icon.png" />

  <!-- Reset -->
  <link rel="stylesheet" type="text/css" href="assets/css/reset.css">

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

  <!-- HOME -->
  <link rel="stylesheet" type="text/css" href="assets/css/home.css">

  <!-- PublicarReceta -->
  <link rel="stylesheet" type="text/css" href="assets/css/publicarreceta.css">

  <!-- Perfil -->
  <link rel="stylesheet" type="text/css" href="assets/css/perfil.css">

  <!-- Editar Perfil -->
  <link rel="stylesheet" type="text/css" href="assets/css/editarperfil.css">
</head>

<body ng-app="myApp">

  <!-- Nav Menu Section -->
  <div ng-include="'partials/header.html'"></div>
  <!-- Nav Menu Section End -->

  <!-- Filtros -->
  <div ng-include="'partials/filtros.html'"></div>
  <!-- End Filtros -->

  <div class="container">
    <div class="row profile">

      <!-- SIDEBAR -->
      <div ng-include="'partials/sidebar.html'"></div>

      <!-- POSTS -->
      <div ng-view></div>
      <!-- END POSTS -->

    </div>
  </div>

  <!-- jQuery Load -->
  <script src="assets/js/jquery-min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- AngularJS Core -->
  <script src="assets/js/angular.min.js"></script>
  <!-- AngularJS Route -->
  <script src="assets/js/angular-route.min.js"></script>

  <!-- APP JS -->
  <script src="assets/js/app.js"></script>
  <script src="assets/js/controllers.js"></script>

  <!-- JS Filtros -->
  <script src="assets/js/barrafiltros.js"></script>

</body>

</html>