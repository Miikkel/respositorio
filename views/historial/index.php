<div class="contenido_dashboard">
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

    <div class="col-12">
        
        <div class="card">
        <div class="card-header font-weight-bold"> <?php $p=$this->modelo->ObtenerTitulo($id_paper)?><?=$p->paper_titulo?>
            <button class="btn btn-danger btn-sm float-right" onclick="Abrir_Modal()"><i class="fa fa-plus"></i> Nuevo PDF</button>
        </div>
        <div class="card-body">
            <div class="col-12 table-responsive">
            <table id="tabla_historial" class="table table-ligh display responsive nworap" style="width:100%">
                <thead class="table-secondary">
                <tr style="text-align:center";>
                    <th>#</th>
                    <th>FECHA</th>
                    <th>AVANCE</th>
                    <th>NOTAS</th>    
                    <th>PDF</th>     
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->modelo->Listar_historial($id_paper) as $ph):?> 
                    
                    <tr>
                        
                        <td></td>
                        <td><?=$ph->historial_fecha?></td>

                        <?php if(isset($ph->historial_avance)){
                            echo "<td class='text-white text-center'><span class='bg-secondary rounded p-1 size'>".$ph->historial_avance."</span></td>";
                        }else{
                            echo "<td class='text-white text-center'><span class='bg-danger rounded p-1 size'>Esperando resultado</span></td>";
                        }?>

                        <?php if(isset($ph->historial_notas)){
                            echo "<td><a href='#notas_".$ph->historial_id."' data-toggle='collapse' role='button' aria-expanded='false' aria-controls='collapseExample'>Leer notas</a>";
                            echo "<div id='notas_".$ph->historial_id."' class='collapse my-2' >
                                    ".$ph->historial_notas."
                                </div></td>";
                        }else{
                            echo "<td class='text-white text-center'><span class='bg-danger rounded p-1 size'>Esperando resultado</span></td>";
                        }?>
                        <td class="text-center">
                            <a class="btn btn-success" style="padding: 3px;" href="<?=$ph->historial_pdf?>"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-danger <?php echo isset($ph->historial_notas) ? 'disabled' : '' ?>" style="padding: 3px;" href="?c=historial&a=Borrar&id=<?=$ph->historial_id?>&id_paper=<?php echo $id_paper?>"><i class="fas fa-trash-alt"></i></i></a>

                        </td>
                                
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <?php }?>
</div>
