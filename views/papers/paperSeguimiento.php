<script type="text/javascript" src="../../plugins/jQuery/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../../plugins/Popper/popper.min.js"></script>

<div class="contenido_dashboard">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Seguimiento de Papers Seleccionados </h1>
            
            <div class="row">
                <div class="container-lg">
                    <div class="table-responsive">
                        <table id="tablaSeguimientoPaperDataTable" class="table table-ligh display responsive nworap" style="width:100%">
                            <thead class="table-secondary">
                            <tr style="text-align:center";>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Titulo</th>             
                                <th>Tema</th>
                                <th>Estado</th>                          
                                <th>Accion</th> 
                            </tr>
                            </thead>
                            <tbody>
                            <?php $id=$this->modelo->ObtenerIdAdmin($_SESSION["s_correoAdmin"])?>
                            <?php foreach($this->modelo->Listar_paper_seguidos($id->administrador_id) as $ps):?>
                                <tr>
                                    <td></td>
                                    <td><?=$ps->estudiante?></td>
                                    <td><?=$ps->fecha_subida?></td>
                                    <td><?=$ps->paper_titulo?></td>
                                    <td><?=$ps->tema?></td>
                                    <td><?php if($ps->estado=="REVISADO"){?>
                                            <span class="badge badge-success text-wrap"> REVISADO </span>
                                          <?php }else{ ?>
                                            <span class="badge badge-primary text-wrap"> ESPERA </span>
                                          <?php }  ?>
                                    </td>

                                    <td class="text-center"><a class="btn btn-info" href="?c=paper&a=HistorialSeguimiento&id=<?=$ps->paper_id?>">Versiones historial</a></td>
                                   <?php ?>
                                            
                                </tr>
                            
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
