

<!--COMIENZO DEL CUERPO -->

<div>
    <div class="container my-5">

        <div class="casillas border border-dark rounded" style="background-color: #fff; min-height: 550px; width:100%">
            <div class="primera-casilla" style="background-color: #fff;">    
                <h1 class="text-center titulo-nosotros mb-3">Identificar Articulo</h1>
                <form id="formArticulo" method="POST" enctype="multipart/form-data" class="p-2">
                <!-- <form id="" action="?c=articulo&a=Identificar" method="POST" enctype="multipart/form-data" class="p-2"> -->
                    <input type="url" id="doi" class="form-control" name="doi"  placeholder="Ingrese DOI del Artitulo"><br>

                    <select name="idioma_art" id="idioma_art" class="form-control" aria-label="Default select example">
                        <option disabled selected>Seleccione un idioma</option>
                        <?php foreach($this->modelo->Listar_Idioma() as $i):?>
                            <option value="<?=$i->idioma_id?>"><?=$i->nombre_idioma?></option>
                        <?php  endforeach; ?>
                    </select><br>
                    <select name="tema_art" id="tema_art" class="form-control" aria-label="Default select example">
                        <option disabled selected>Seleccione un tema</option>
                        <?php foreach($this->modelo->Listar_tema() as $t):?>
                            <option value="<?=$t->tema_id?>"><?=$t->tema?></option>
                        <?php  endforeach; ?>
                    </select><br>

                    
                    
                    <button type="submit" name="submit" class="btn btn-primary color-naranja">Identificar</button>

                    <a href="?c=articulo&a=FormCrearArticulo" class="btn btn-primary color-naranja">Limpiar campos</a>
                </form>
                
                
            </div>
            <div class="segunda-casilla" style="background-color: #fff;">
                
                <div class="border border-dark rounded"  style="width: 100%; height:100%">
                
                <h2 class="text-center titulo-nosotros mb-3">Resultados</h2>
                <form id="formArticuloResultado" method="POST">
                
                    <div class="p-3" id="resultado">Ingrese un DOI en el panel izquierdo y seleccione los campos.</div>

                </form>
                </div>
               
            </div>
        </div>

    </div>
</div>

