
$(document).ready(function() {
    tabla_paper = $("#tabla_paper").DataTable({ 
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "columns": [
            { "width": "1%" },
            { "width": "35%" },
            { "width": "15%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" }
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

    tabla_paper.on( 'order.dt search.dt', function () {
        tabla_paper.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    

});

$(document).ready(function() {
    tabla_historial = $("#tabla_historial").DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "columns": [
            { "width": "1%" },
            { "width": "15%" },
            { "width": "10%" },
            { "width": "35%" },
            { "width": "10%" }
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
    tabla_historial.on( 'order.dt search.dt', function () {
        tabla_historial.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});



function Abrir_Modal() {
    $("#modal_registro").modal('show');
}

$('#conf_correo').submit(function(e) {
    e.preventDefault();
    var correo = $.trim($("#correo").val());
    var codigo= $.trim($("#codigo").val());

    if (codigo.length == "" ) {
        Swal.fire({ 
            icon: 'warning',
            title: 'Ingrese el código de autenticación',
        });
    }
    else {
        var codigo = {
            "correo": $("#correo").val(),
            "codigo": $("#codigo").val(),   
        }
        $.ajax({
            url: "?c=loginUsuario&a=ValidarCodigo",
            type: "POST",
            data: codigo,
            success: function(data){

                if(data==1){
                    Swal.fire({
                        icon: 'success',
                        title: '¡Todo está listo!',
                        text: 'Inicia sesión con tu nueva cuenta',
                        timer: 100000
                    })
                    window.location.href ="?c=paper";
                }
                else if(data==2){
                    Swal.fire({ 
                        icon: 'warning',
                        title: 'El código es incorrecto',
                 }); 
                }
            }
        });
    }
});