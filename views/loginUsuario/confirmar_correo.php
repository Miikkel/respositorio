<?php 
$correo=$_GET["correo"];   
?>


    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
            <form class="col-3" id="conf_correo" method="POST">
                <h2>Verificar Cuenta</h2>
                <div class="mb-3">
                    <label for="c" class="form-label">Código de Verificación</label>
                    <input type="text" class="form-control"  name="codigo" id="codigo"   maxlength="5">
                    <input type="hidden" class="form-control" id="correo" name="correo" value="<?php echo $correo;?>">
                </div>
               
                <button type="submit" class="btn btn-primary color-naranja">Verificar</button>
            </form>
        </div>
    </div>
  