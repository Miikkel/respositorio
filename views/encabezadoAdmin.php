<?php
session_start();

if($_SESSION["s_correoAdmin"] === null){
header("location:?c=loginAdmin");
}
?>
<!doctype html>
<html >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="plugins/Bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- DataTables-->
    <link rel="stylesheet" type="text/css" href="plugins/DataTables/datatables.min.css"/>


    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="plugins/Font-Awesome/css/font-awesome.min.css"/>

    <!-- Select2 -->
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <!-- SweerAlert2 -->
    <!-- <link rel="stylesheet" type="text/css" href="../../plugins/Sweetalert/sweetalert2.min.css"/>  -->
    <link href="" rel="stylesheet" />


    <link rel="stylesheet" type="text/css" href="assets/css/styles.css"/>



    <title>UNFV | ADMIN</title>
  </head>
    <body>
        <input type="checkbox" id="check">
        <!--inicio area encabezado-->
        <header>
        <label class="menu_superior" for="check">
            <i class="fas fa-bars" id="menu_lateral_btn"></i>
        </label>
        <div class="area_izquierda">
            <h3>ADMIN <span>UNFV</span></h3>
        </div>
        <div class="area_derecha">
            <a href="?c=loginAdmin&a=CerrarSesion" class="boton_cerrar">Salir</a>
        </div>
        </header>
        <!--fin area encabezado-->

        <!--inicio barra navegacion movil-->
        <div class="movil_nav">
        <div class="nav_barra">
            <img src="admin.png" class="imagen_perfil_movil" alt="">
            <i class="fa fa-bars nav_boton"></i>
        </div>
        <div class="movil_nav_items">
            <a href="?c=paper&a=BandejaAdmin"><i class="fas fa-inbox"></i><span>Bandeja de Papers</span></a>
            <a href="?c=paper&a=BandejaSeguimiento"><i class="fa fa-file-signature"></i><span>Papers en Seguimiento</span></a>
        </div>
        </div>
        <!--fin barra navegacion movil-->

        <!-- inicio menu lateral-->
        <div class="menu_lateral">
        <div class="perfil_info">
            <img src="admin.png" class="perfil_imagen" alt="">
            <h6 class="text-white"><?php echo $_SESSION["s_correoAdmin"] ?></h6>
        </div>
            <a href="?c=paper&a=BandejaAdmin"><i class="fas fa-inbox"></i><span>Bandeja de Papers</span></a>
            <a href="?c=paper&a=BandejaSeguimiento"><i class="fa fa-file-signature"></i><span>Papers en Seguimiento</span></a>
        </div>
    <!-- fin menu lateral-->    