
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio</title>

    <link rel="stylesheet" type="text/css" href="../plugins/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../plugins/Font-Awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/stylesWeb.css">
    <link rel="stylesheet" href="../assets/css/repositorio_estilos.css">
</head>
<body class="">

    <div class="page-wrap">
        <div class="nav-style">

            <div class="mobile-view">
                <div class="mobile-view-header">
                    <div class="mobile-view-close">
                        <i class="fas fa-times js-toggle"></i>
                    </div>
                </div>
                <div class="mobile-view-body"></div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light  bg-white">
                <div class="container py-2 px-2">
                    <a class="navbar-brand" href="?c=articulo">
                        <img class="mobile-logo" src="assets/img/logo_unfv.png" alt="">
                    </a>
                    
                    <div class="d-inline-block d-lg-none ml-md-0 ml-auto py-3"><i class="fas fa-bars js-toggle puntero" style="font-size: 35px;color: black;"></i></div>
                    <div class="d-none d-lg-block">
                    <ul class="navbar-nav ml-auto js-clone-nav">
                        <li class="nav-item active">
                        <a class="nav-link" href="?c=articulo">Inicio</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="?c=articulo&a=Nosotros">Nosotros</a>
                        </li>
                        <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?c=articulo&a=Repositorio">Repositorio</a>
                            <a class="dropdown-item" href="?c=articulo&a=FormCrearArticulo">Subir Articulo</a>
                        </div>
                        </li>
                        <?php
                          
                            if($sesionCorreo !== null){?>
                              <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $sesionCorreo ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="?c=paper">Ver mis papers</a>
                                <a class="dropdown-item" href="?c=loginUsuario&a=CerrarSesion">Cerrar Sesion</a>
                            </div>
                        </li>


                        <?php   }else{?>
                            
                            <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Iniciar Sesión
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="?c=loginUsuario&opcion=1">Estudiante</a>
                                <a class="dropdown-item" href="?c=loginAdmin">Administrador</a>
                            </div>
                        </li>
                            
                        <?php
                            }
                        ?>
                        
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    