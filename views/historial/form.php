<!-- Inicio modal -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="?c=historial&a=Guardar" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    
                    <div class="row">
                        
                        <div class="col-12">
                            <input class="form-control"  name="id_paper" type="hidden" value="<?=$id_paper?>" >
                        </div>
                        <div class="col-12">
                            <label for="formFile" class="font-weight-bold">Subir Archivo PDF:</label>
                            <input class="form-control" id="formFile" name="fichero" type="file" accept="application/pdf">
                        </div>
                        
                        
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    
                    <input name="submit" class="btn btn-primary" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- Fin modal -->