
    <div>
        <div class="container my-5">
            <h1 class="text-center titulo-nosotros">Regístrate</h1>
            <div class="regresar-inicio my-5"><a href="?c=loginusuario&opcion=1"><i class="fas fa-angle-left"></i> Regresar</a></div>
                <form id="formReg_usu" type="form" method="POST">
                <div class="row justify-content-center align-items-center minh-100">
                    <div class="row justify-content-center align-items-center minh-100">
                        <div class="col-12">
                            <div class="form-row">
                                <div class="col">
                                    <p><input type="text" class="form-control" name="nombre_usu" id="nombre_usu" autofocus="autofocus" placeholder="Nombre" /></p>
                                </div>
                                <div class="col">   
                                    <p><input type="text" class="form-control" name="apellido_usu" id="apellido_usu" placeholder="Apellido" /></p> 
                                </div>
                            </div>
                            <p><input type="email" name="correo_usu" id="correo_usu" class="form-control" placeholder="Correo electrónico"  ></p>
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Escuela Profesional</label>
                            <select  name="escuela" id="escuela" class="custom-select my-1 mr-sm-2">
                                <option value="EPIS">EPIS</option>
                                <option value="EPIT">EPIT</option>
                                <option value="EPIA">EPIA</option>
                                <option value="EPII">EPII</option>
                            </select>
                            <br><br>
                            <div class="form-row">
                                    <div class="col">
                                <p><input type="password" name="contrasena_usu" id="contrasena_usu" placeholder="Contraseña"  id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" ></p>                                </div>
                                <div class="col">   
                                    <p><input type="password" name="contrasena2_usu" id="contrasena2_usu"  placeholder="Repita su contraseña"  id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" ></p>
                                </div>
                            </div>
                                <input type="submit"  class="btn btn-primary color-naranja" value="Continuar"> 
                            </form>
                        <div>
                    <div>
                </div>
            </div>
        </div>
    </div>
