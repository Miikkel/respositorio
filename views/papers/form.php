    
    <div class="contenido_dashboard " >

    <?php
        $est=$this->modelo->Obtener_Estado($_SESSION["s_correo"]);
        if($est->estado == "INACTIVO"){?>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Activa tu cuenta!</h4>
                <p>Antes de poder continuar, por favor, activa tu cuenta con el código que te hemos enviado.</p>
                <hr>
                <a href="?c=paper&a=ConfirmarCorreo&correo=<?php echo $_SESSION["s_correo"]?>">Pusla aquí para ingresar el código</a>
            </div>

            <?php }else{?>

            <div class="container my-1">
                <h1 class="text-center titulo-nosotros">Crear nuevo Paper</h1>
            </div>
            <div class="container-md ">
                <div class="col-md-5 mx-auto">
                    <hr class="my-4">
                        <div class="content">
                            <form method="POST" action="?c=paper&a=Guardar">
                            
                            

                            <div class="row g-3">
                                <!-- insertar paper -->
                                <div class="col-12">
                                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getPaperId()?>">
                                    <br>
                                </div>
                        

                                <div class="col-12">
                                    <label class="form-label" ><b>Tema</b></label>

          
                                    <select type="text" class="form-control" name="txt_tema">
                                    <option disabled selected>Seleccione un idioma</option>
                                    <?php foreach($this->modelo->Listar_tema() as $t):
                                        if($t->tema_id == $p->getTemaId()){ ?>
                                            <option selected value="<?=$t->tema_id?>"><?=$t->tema?></option>
                                            <?php    }else{?>
                                        <option value="<?=$t->tema_id?>"><?=$t->tema?></option>
                                    <?php } endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-12 mt-5">
                                    <label class="form-label"><b>Titulo del Articulo</b></label>
                                    <input type="text" class="form-control" name="txt_titulo" value="<?=$p->getPaperTitulo()?>" required >
                                    <br>
                                </div>  
                              
                            </div>

                            <hr class="my-4">

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary color-naranja" type="submit">Guardar</button>
                            </div>

                            </form>
                        </div>
                </div>
            </div>
        <?php }?>
    </div>