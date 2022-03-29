

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="plugins/Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables --> 
    <link rel="stylesheet" type="text/css" href="plugins/DataTables/datatables.min.css"/>

    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="plugins/Font-Awesome/css/font-awesome.min.css"/>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="assets/css/styles.css"/>




    <title>UNFV | ESTUDIANTE</title>
  </head>
  <body>
    <input type="checkbox" id="check">
    <!--inicio area encabezado-->
    <header>
      <label class="menu_superior" for="check">
        <i class="fas fa-bars" id="menu_lateral_btn"></i>
      </label>
      <div class="area_izquierda">
        <h3>ESTUDIANTE <span>UNFV</span></h3>
      </div>
      <div class="area_derecha">
        <a href="?c=loginUsuario&a=CerrarSesion" class="boton_cerrar">Salir</a>
        <a href="?c=articulo&a=Repositorio&pagina=1" class="boton_cerrar mr-2">Ir al repositorio</a>
      </div>
    </header>
    <!--fin area encabezado-->
    <!--inicio barra navegacion movil-->
    <div class="movil_nav">
      <div class="nav_barra">
        <img src="estudiante.png" class="imagen_perfil_movil" alt="">
        <i class="fa fa-bars nav_boton"></i>
      </div>
      <div class="movil_nav_items">
        <a href="?c=paper"><i class="fas fa-inbox"></i><span>Revision de Papers</span></a>
        <a href="?c=paper&a=FormCrear"><i class="fas fa-table"></i><span>Subir Paper</span></a>
      </div>
    </div>
    <!--fin barra navegacion movil-->
    <!-- inicio menu lateral-->
    <div class="menu_lateral">
      <div class="perfil_info">
        <img src="estudiante.png" class="perfil_imagen" alt="">
        <h6 class="text-white"><?php echo $_SESSION["s_correo"];?></h6>
      </div>
        <a href="?c=paper"><i class="fas fa-inbox"></i></i><span>Revision de Papers</span></a>
        <a href="?c=paper&a=FormCrear"><i class="fas fa-file-alt"></i></i><span>Subir Paper</span></a>
    </div>
    <!-- fin menu lateral-->    