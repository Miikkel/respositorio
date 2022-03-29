
 
function realizarSeguimiento(idPaper){
    Swal.fire({
        title: 'SELECCION DE PAPER',
        text: "Esta seleccionando este paper para darle seguimiento",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, Seguir!'
      }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "?c=paper&a=SeguimientoPaper",
                type: "POST",
                data:"idPaper="+idPaper,  
                
                success: function(){
                    window.location.href="?c=paper&a=BandejaSeguimiento";
                }
            })
        }
      });

}

function guardarRevision(texto){
    var id_historial=$("#idHistorial").val();
    var id_usuario=$("#idusuario").val();
    var id_paper=$("#idpaper").val();
    var avance=$("#idAvance").val();
    
    Swal.fire({
        title: 'GUARDANDO REVISIÓN',
        text: "Esta guardando la revision de este paper",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, Guardar!'
      }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                "url":"?c=paper&a=RevisionPaper",
                type:'POST',
                data:{
                    id_historial:id_historial,
                    id_usuario:id_usuario,
                    id_paper:id_paper,
                    avance:avance,
                    texto:texto
                }
            }).done(function(resp){    
                     resp=resp.trim();
                     if(resp==1){
                        window.location.href="?c=paper&a=HistorialSeguimiento&id="+id_paper;
                    }else{
                       Swal.fire("X.X","Fallo al entrar!","error");
                     }
            })
        }
      });
}

function mostrarHistorialSeguimiento(idPaper){

    Swal.fire({
        title: 'HISTORIAL DEL PAPER',
        text: "Esta seleccionando este paper para ver su historial,¿Desea seguir?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, Seguir!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "?c=paper&a=HistorialSeguimiento",
                type: "POST",
                data:"idPaper="+idPaper,  

                success: function(){
                    window.location.href="?c=paper&a=HistorialSeguimiento";
                }
            })

        }
      });

}

$(document).ready(function() {
    tabla_versiones_paper = $("#tablaVersionesPaperDataTable").DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "columns": [
            { "width": "1%" },
            { "width": "15%" },
            { "width": "56%" },
            { "width": "14%" },
            { "width": "14%" }
          ],
        "bLengthChange":true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "language": { //cambiando el idioma del plugin de la tabla
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
            
        }        
    });
    tabla_versiones_paper.on( 'order.dt search.dt', function () {
        tabla_versiones_paper.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    
    
});

 $(document).ready(function() {
    tabla_bandeja_paper = $("#tablaBandejaPaperDataTable").DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "columns": [
            { "width": "1%" },
            { "width": "20%" },
            { "width": "15%" },
            { "width": "35%" },
            { "width": "19%" },
            { "width": "10%" }
          ],
        "bLengthChange":true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "language": { //cambiando el idioma del plugin de la tabla
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
            
        }        
    });
    tabla_bandeja_paper.on( 'order.dt search.dt', function () {
        tabla_bandeja_paper.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    
    
});


$(document).ready(function() {
    tabla_seguimiento = $("#tablaSeguimientoPaperDataTable").DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "columns": [
            { "width": "1%" },
            { "width": "20%" },
            { "width": "15%" },
            { "width": "35%" },
            { "width": "19%" },
            { "width": "5%" },
            { "width": "5%" }
          ],
        "bLengthChange":true,
        "searching": { "regex": false },
        "lengthMenu": [ [15, 25, 50, 100, -1], [15, 25, 50, 100, "All"] ],
        "pageLength": 15,
        "destroy":true,
        "async": false ,
        "processing": true,
        "language": { //cambiando el idioma del plugin de la tabla
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
            
        }        
    });
    tabla_seguimiento.on( 'order.dt search.dt', function () {
        tabla_seguimiento.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});