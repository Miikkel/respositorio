<div class="container my-5">
    <div class="con-sidebar">
        <div class="filtro">

            <div class="caja rounded-top border">
                <h5>Filtrar</h5>
            </div>
            <form id="formFiltrar">
                <div class="caja border">
                    <div class="font-weight-bold">Tema</div>
                    <?php foreach($this->modelo->Listar_tema() as $t):?>
                        <div class="my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cboxTema<?=$t->tema_id?>" name="tema[]" value="<?=$t->tema?>"> 
                                <label class="custom-control-label" for="cboxTema<?=$t->tema_id?>"><?=$t->tema?></label>
                            </div>
                        </div>
                        
                    <?php  endforeach; ?> 
                </div>    

                <div class="caja rounded-bottom border">
                    <div class="font-weight-bold">Idioma</div>
                    <?php foreach($this->modelo->Listar_Idioma() as $i):?>
                        <div class="my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cboxIdioma<?=$i->idioma_id?>" name="nombre_idioma[]" value="<?=$i->nombre_idioma?>">
                                <label class="custom-control-label" for="cboxIdioma<?=$i->idioma_id?>"><?=$i->nombre_idioma?></label>
                            </div>
                        </div>
                        
                    <?php  endforeach; ?> 

                </div>

                <div>
                    <button type="submit" name="submit" class="btn btn-primary btn-filtrar color-naranja">Filtrar</button>
                </div>
            </form>
        
            
        </div>
        <div>
            <div class="borrar-filtros">
                <a href="?c=articulo&a=Repositorio" class="btn btn-info d-block color-naranja">Borrar filtros</i></a>
            </div>

            

            <div class="articulos" id="articulos">
                <?php foreach($this->modelo->Listar_Articulos($iniciar) as $a):?>

                    <div class="card p-3">
                        <div class="tres-columnas">
                            <div>
                                <img src="assets/img/img_articulo.png" class="img_articulo">  
                            </div>
                            <div class="contenido">
                                <div class="titulo_articulo">
                                    <h4><?=$a->titulo?></h4>
                                    <div class="datos-articulo my-2">
                                        <span class="font-weight-bold">Fecha: </span><span class="fecha"><?=$a->fecha_subida?></span>
                                        <span>|</span>
                                        <span class="font-weight-bold">Tema: </span><span class="tema"><?=$a->tema?></span>
                                        <span>|</span>
                                        <span class="font-weight-bold">Idioma: </span><span class="idioma"><?=$a->nombre_idioma?></span>
                                    </div>
                                </div>
                               
                                <a id="" href="#collapse_<?=$a->articulo_id?>" class="" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Saber más</a>

                                <div id="collapse_<?=$a->articulo_id?>" class="collapse resumen my-2" >
                                    <?=$a->resumen?>
                                </div>
                                
                                <div class="doi-articulo">   
                                    <a href="<?=$a->doi?>" target="_blank"><?=$a->doi?></a>
                                </div>
                                
                            </div>
                            <div>
                                <a href="<?=$a->articulo_pdf?>" class="btn btn-info d-block color-naranja" role="button" target="_blank">Ver Articulo <i class="fas fa-sign-out-alt"></i></a> 
                                <div class="autores-articulo">
                                    <div>Autores:</div>
                                    <?=$a->autor?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php  endforeach; ?> 

                <div class="numero-resultados">Se encontraron <?php echo $this->modelo->Cantidad_Articulos() ?> resultados</div>     
                
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                        <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?c=articulo&a=Repositorio&pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a>
                        </li>
                        <?php for($i=0;$i<$this->modelo->Cantidad_Articulos_Lista();$i++): ?>   
                            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
                                <a class="page-link" href="?c=articulo&a=Repositorio&pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a>
                            </li>
                        <?php endfor ?>
                        <li class="page-item <?php echo $_GET['pagina']>=$this->modelo->Cantidad_Articulos_Lista() ? 'disabled' : '' ?>">
                            <a class="page-link" href="?c=articulo&a=Repositorio&pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a>
                        </li>
                    </ul>   
                </nav>
        </div>
        

    </div>
</div>