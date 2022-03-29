
    <div class="container my-5">
    <h1 class="text-center titulo-nosotros">Login</h1><br>
            
         
    <div class="row justify-content-center align-items-center minh-100">
        
        <div class="col-15">
            <form id="formLogin" action="" method="post">    

                <input type="hidden" class="form-control" name="opcion" id="opcion" value="<?=$opcion?>">
                <input type="email" class="form-control" placeholder="ingrese su correo" name="correo_usu" id="correo_usu"><br>
                <input type="password" class="form-control" placeholder="ingrese su contraseña" name="contrasena_usu" id="contrasena_usu"></p>
                <div class="form-row">
                    <div class="col">
                    <button type="submit" name="submit" class="btn btn-primary color-naranja">Ingresar</button>
                    </div>
                    <div class="col">  
                    <a class="nav-link" href="?c=loginUsuario&a=Registrar" class="mr-sm-2">Regístrate</a>
                    </div>
                </div>



            </form> 
        </div>
    </div>
    </div>