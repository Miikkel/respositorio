
<script src="../../plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../../plugins/jQuery/jquery-3.5.1.min.js"></script> 
<script type="text/javascript" src="../../plugins/Popper/popper.min.js"></script>


<div class="contenido_dashboard">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"> PAPER EN REVISION </h1>
            <input type="button" class="btn btn-primary" onclick="history.back()" name="volver atrás" value="volver atrás">

            </span>
            <br><br>
            
            <div class="row">
                <div class="col-md-8">
                  <div id="archivoObtenido">
                  <embed src="<?=$rutapdf?>" type="application/pdf" width="100%" height="600px" />
                  </div>
                </div>

                <form id="frmRevision" > 

                    <input type="text" name="idusuario" id="idusuario" value="<?=$id_usuario?>" hidden >
                      <input type="text" name="idHistorial" id="idHistorial" value="<?= $id_historial?>" hidden >
                      <input type="text" name="idpaper" id="idpaper" value="<?= $id_paper?>" hidden >

                    <div class="col-6 col-md-4 cke_description" style="width: auto !important;" >                  
                         <textarea  class="editorNotas" name="editorNotas" id="editorNotas" ></textarea>
                        </br>
                        <div>
                            <select name="idAvance" id="idAvance" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>Nivel de porcentaje de avance</option>
                            <option value="25%">25%</option>
                            <option value="75%">75%</option>
                            <option value="100%">100%</option>
                            </select>
                        </div>
                    
                    </div>
                          <button type="button" name="btnRevisionPaper" class="tn btn-success btn-lg btn-block" id="btnRevisionPaper" >Guardar</button>

                </form>
                
            </div>
        


        </div>
    </div>
</div>

<script>
        CKEDITOR.config.width = 300; //ancho (px,%,em)
        CKEDITOR.config.height = 360; //alto (px,%,em)
        CKEDITOR.replace('editorNotas');

</script>


<script>
    $(document).ready(function(){
        $("#btnRevisionPaper").click(function(){
          var areaText = CKEDITOR.instances['editorNotas'].getData();
          guardarRevision(areaText);
        });
    });
</script>