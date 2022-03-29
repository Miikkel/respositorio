<script type="text/javascript" src="../../plugins/jQuery/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../../plugins/Popper/popper.min.js"></script>
<script type="text/javascript" src="../../assets/js/admin.js"></script>

<div class="contenido_dashboard">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Historial de Papers Seleccionados </h1>

            <div class="row">
                <div class="container-lg">
                    <div class="table-responsive">
                        <table id="tablaVersionesPaperDataTable" class="table table-ligh display responsive nworap" style="width:100%">
                            <thead class="table-secondary">
                            <tr style="text-align:center";>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Titulo</th>
                                <th>Estado</th>                          
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $id=$this->modelo->ObtenerIdAdmin($_SESSION["s_correoAdmin"])?>
                            <?php foreach($this->modelo->Listar_paper_versiones($id_paper) as $ps):?>
                                <tr>
                                    <td></td>
                                    <td class="text-center"><?=$ps->fecha_subida?></td>
                                    <td><?=$ps->paper_titulo?></td>
                                    <td class="text-center"><?php if($ps->historial_estado=="REVISADO"){?>
                                            <span class="badge badge-success text-wrap"> REVISADO </span>
                                          <?php }else{ ?>
                                            <span class="badge badge-primary text-wrap"> ESPERA </span>
                                          <?php }  ?>
                                    </td>
                                    <td  class="text-center">
                                    <a class="btn btn-info <?php if($ps->historial_estado=="REVISADO"){?> disabled<?php } ?>" href="?c=paper&a=RevisarPaper&pdf=<?=$ps->paper_pdf?>&
                                    hid=<?=$ps->historial_id?>&uid=<?=$ps->usuario_id?>&pid=<?=$ps->paper_id?>"
                                            >Revisar</a></td>     
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
