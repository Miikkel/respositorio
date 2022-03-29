
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
            <div class="card-header font-weight-bold">
                Listado de Papers
            </div>
            <div class="card-body">

                <div class="col-12 table-responsive">
                    <table id="tabla_paper" class="display" class="table table-ligh display responsive nworap" style="width:100%">
                        <thead class="table-secondary">
                        <tr style="text-align:center";>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Tema</th>
                            <th>Fecha de Subida</th>
                            <th>Encargado</th>      
                            <th>Acción</th>     
                        </tr>
                        </thead>
                        <tbody>
                            <?php $id=$this->modelo->ObtenerId($_SESSION["s_correo"])?>
                            <?php foreach($this->modelo->Listar_paper($id->usuario_id) as $r):?>
                            <tr>
                                <td></td>
                                <td><?=$r->paper_titulo?></td>
                                <td><?=$r->paper_tema?></td>
                                <td class="text-center"><?=$r->paper_fecha?></td>
                                
                                    <?php if(isset($r->paper_admin)){
                                        echo "<td class='text-white text-center'><span class='bg-secondary rounded p-1 size'>".$r->paper_admin."</span></td>";
                                    }else{
                                        echo "<td class='text-white text-center'><span class='bg-danger rounded p-1 size'>Ninguno</span></td>";
                                    }?>
                                
                                <td class="text-center">
                                    <a class="btn btn-success" style="padding: 3px;" href="?c=historial&id=<?=$r->paper_id?>"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary" style="padding: 3px;" href="?c=paper&a=FormCrear&id=<?=$r->paper_id?>"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" style="padding: 3px;" href="?c=paper&a=Borrar&id=<?=$r->paper_id?>"><i class="fas fa-trash-alt"></i></i></a>
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
