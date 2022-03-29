
<div class="contenido_dashboard">


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Bandeja de Papers</h1>
        

            
        <div class="row">
            <div class="container-lg">
                <div class="table-responsive">
                    <table id="tablaBandejaPaperDataTable" class="table table-ligh display responsive nworap" style="width:100%">
                        <thead class="table-secondary">
                        <tr style="text-align:center";>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Titulo</th>             
                            <th>Tema</th>             
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->modelo->Listar_bandeja_admin() as $bp):?>
                                <tr>
                                    <td></td>
                                    <td><?=$bp->estudiante?></td>
                                    <td><?=$bp->fecha_subida?></td>
                                    <td><?=$bp->paper_titulo?></td>
                                    <td><?=$bp->tema?></td>
                                    <td> 

                                        <span class="btn btn-success btn-sm" onclick="realizarSeguimiento(<?=$bp->paper_id?>)" >
                                            <span >Seguir</span>
                                        </span>
                                    </td>
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
