


$('#formLogin').submit(function(e) {
    e.preventDefault();
    var correo = $.trim($("#correo_usu").val());
    var contra = $.trim($("#contrasena_usu").val());
    var opcion = parseInt($.trim($("#opcion").val()));

    if (correo.length == "" || contra.length == "") {
        Swal.fire({ 
            icon: 'error',
            title: 'Debe ingresar un correo y/o contraseña',
        });
    }else{
        $.ajax({
            url: "?c=loginUsuario&a=Acceder",
            type: "POST",
            datatype: "json",
            data: { correo: correo, contrasena: contra},
            success: function(data) {
                console.log(data);
                if (data == "null") {
                    Swal.fire({
                        type: 'error',
                        title: 'Usuario y/o password incorrecta',
                    });
                }else{     
                    switch (opcion) {
                        case 1:
                            window.location.href = "?c=paper&a=BienvenidoUsuario";
                            break;
                        case 2:
                            window.location.href = "?c=articulo&a=Repositorio";
                            break;
                        case 3:
                            window.location.href = "?c=articulo&a=FormCrearArticulo";
                            break;
                        default:
                            break;
                    }  
                }
            }
        });
    }
});
$('#formReg_usu').submit(function(e) {
    e.preventDefault();
    var nombre = $.trim($("#nombre_usu").val());
    var apellido = $.trim($("#apellido_usu").val());
    var correo = $.trim($("#correo_usu").val());
    var contrasena = $.trim($("#contrasena_usu").val());
    var contrasena2 = $.trim($("#contrasena2_usu").val());
    var escuela = $.trim($("#escuela_usu").val());

    var validar= correo.substr(-11);

    if (nombre.length == "" || apellido.length == "") {
        Swal.fire({ 
            icon: 'warning',
            title: 'Debe ingresar los datos del usuario',
        });
    }else{
        if (correo.length == "" || validar!= "unfv.edu.pe") {
            Swal.fire({ 
                icon: 'warning',
                title: 'Debe ingresar su correo institucional',
            });
        } 
        else{
            if(contrasena.length==""||contrasena2.length=="" ){
                Swal.fire({ 
                    icon: 'warning',
                    title: 'Debe ingresar los campos de las contraseñas',
                });

            }
            else {
                if (contrasena == contrasena2){
                    var usuario = {
                        "nombre": $("#nombre_usu").val(),
                        "apellido": $("#apellido_usu").val(),
                        "correo":$("#correo_usu").val(),
                        "escuela": $("#escuela").val(),
                        "contrasena": $("#contrasena_usu").val()
                    }
                   
                        $.ajax({
                            url: "?c=loginUsuario&a=Registrar_usuario",
                            type: "POST",
                            data: usuario,
                            success: function(data){
                            // console.log(data)
                           if(data==1){
                                window.location.href = "?c=loginUsuario&a=ConfirmarCorreo&correo="+correo;
                            }
                            else if(data==2){
                                Swal.fire({ 
                                    icon: 'warning',
                                    title: 'Ya existe una cuenta asociada a este correo..',
                                    
                                }); 
                            }
                    
                            else{
                                   Swal.fire({ 
                                    icon: 'warning',
                                    title: 'Algo salió mal..',
                             }); 
                            }
                           }
                       });
                }
                
                else {
                    Swal.fire({ 
                        icon: 'warning',
                        title: 'Las contraseñas no son iguales',
                    });
                }
            }
        }
    }
});

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
                    window.location.href ="?c=loginUsuario&a=Inicio&opcion=1";
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

$('#formFiltrar').submit(function(e) {
    e.preventDefault();

    var form = $("#formFiltrar");

    $.ajax({
        url: "?c=articulo&a=Filtrar",
        type: "POST",
        data: form.serialize(),
        beforeSend: function () {
            $("#articulos").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Procesando, espere por favor...");
        },
        success: function(response) {
            $("#articulos").html("");
            console.log(JSON.parse(response));
            $.each(JSON.parse(response), function(key, Articulo){
                let row = ''+
                    '<div class="card p-3">' +
                    '<div class="tres-columnas">' +
                    '<div>'+
                    '<img src="assets/img/img_articulo.png" class="img_articulo">' +    
                    '</div>' +    
                    '<div class="contenido">' +    
                    '<div class="titulo_articulo">' +    
                    '<h4>'+Articulo.titulo+'</h4>' +    
                    '<div class="datos-articulo my-2">' +    
                    '<span class="font-weight-bold">Fecha: </span><span class="fecha">'+Articulo.fecha_subida+'</span>' +    
                    '<span>|</span>' +    
                    '<span class="font-weight-bold">Tema: </span><span class="tema">'+Articulo.tema+'</span>' +    
                    '<span>|</span>' +    
                    ' <span class="font-weight-bold">Idioma: </span><span class="idioma">'+Articulo.nombre_idioma+'</span>' +    
                    '</div>' +    
                    '</div>' +    
                    '<a id="" href="#collapse_'+key+'" class="" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Saber más</a>' +
                    '<div id="collapse_'+key+'" class="collapse resumen my-2" >'+Articulo.resumen+'</div>'+
                    '<div class="doi-articulo">' +
                    '<a href="'+Articulo.doi+'" target="_blank">'+Articulo.doi+'</a>' +
                    '</div>' +
                    '</div>' +
                    '<div>' +
                    '<a href="'+Articulo.articulo_pdf+'" class="btn btn-info d-block color-naranja" role="button" target="_blank">Ver Articulo <i class="fas fa-sign-out-alt"></i></a>' +
                    '<div class="autores-articulo">' +
                    '<div>Autores:</div>'+Articulo.autor+'</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                    $("#articulos").append(row);

            });
        }
    });

});

var articulo="";

$('#formArticulo').submit(function(e) {
    e.preventDefault();

    var doi = $.trim($("#doi").val());
    var idioma = $.trim($("#idioma_art").val());
    var tema = $.trim($("#tema_art").val());
    var verificar= doi.substr(0,15);
    
    var datos = {
        "doi": $("#doi").val(),
        "idioma": $("#idioma_art").val(),
        "tema": $("#tema_art").val()
    }

    console.log(datos);
    console.log(verificar);



    if (doi.length == 0 || idioma.length == 0 || tema.length == 0||verificar!="https://doi.org") {
        Swal.fire({ 
            icon: 'error',
            title: 'Campos vacíos o incorrectos',
        });
    }else{
        $.ajax({
            url: "?c=articulo&a=Identificar",
            type: "POST",
            data: datos,
            beforeSend: function () {
                $("#resultado").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Procesando, espere por favor...");
            },
            success: function(response) {

                if(response == "null"){
                    $("#resultado").html("<div class='alert alert-danger' role='alert'>Este articulo no existe o no pertenece a SciELO</div>");
                }else{
                    articulo = response;
                    var obj =  JSON.parse(articulo);
                    var titulo = obj['titulo'];
                    var autor = obj['autor'];
                    var resumen = obj['resumen'];
                    var enlace = obj['enlace'];
                    var idioma = obj['idioma'];
                    var tema = obj['tema'];
                    var doi = obj['doi'];
                    var respuesta ="";
                    
                    respuesta +="<div class='alert alert-success' role='alert'>Se encontraron resultados</div>";
                    respuesta +="<div class='m-3'>Titulo: <div id='titulo'>"+titulo+"</div></div>";
                    respuesta +="<div class='m-3'>Autor: <div id='autor'>"+autor+"</div></div>";
                    respuesta +="<div class='m-3'>Resumen: <div id='resumen'>"+resumen+"</div></div>";
                    respuesta +="<div class='d-none' id='idiomaId'>"+idioma+"</div>";
                    respuesta +="<div class='d-none' id='temaId'>"+tema+"</div>";

                    respuesta +="<div class='m-3'>Enlace: <a id='enlacePdf' class='nav-link' target='_blank' href="+enlace+" class='mr-sm-2'>Click aqui para ver el pdf</a></div>";
                    respuesta +="<div class='m-3'>Doi: <a id='enlaceDoi' class='nav-link' target='_blank' href="+doi+" class='mr-sm-2'>"+doi+"</a></div>";
                    
                    respuesta +="<div class='m-3'><button type='submit' name='submit' class='btn btn-primary color-naranja'> <span class='' id='carga' role='status' aria-hidden='true'></span> Registrar articulo</button></div>"
                    
                    $("#resultado").html(respuesta);
                    
                }
                
            }
        });
    }

});

$('#formArticuloResultado').submit(function(e) {
    e.preventDefault();
    var obj =  JSON.parse(articulo);
    var titulo = obj['titulo'];
    var autor = obj['autor'];
    var resumen = obj['resumen'];
    var enlacePdf = obj['enlace'];
    var idiomaId = obj['idioma'];
    var temaId = obj['tema'];
    var enlaceDoi = obj['doi'];

    var carga= document.getElementById("carga");
    

    var datos = {
        "titulo": titulo,
        "autor": autor,
        "resumen": resumen,
        "idiomaId": idiomaId,
        "temaId": temaId,
        "enlacePdf": enlacePdf,
        "enlaceDoi": enlaceDoi
    }


    Swal.fire({
        title: 'SELECCION DE PAPER',
        text: "Esta seleccionando este paper para darle seguimiento",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, Guardar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "?c=articulo&a=Guardar",
                type: "POST",
                data: datos,
                beforeSend: function () {
                    carga.classList.add('spinner-border','spinner-border-sm');
                },
                success: function(response) {
                    if(response==1){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'El articulo se guardo correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          });
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Ya existe este articulo en el repositorio',
                            showConfirmButton: false,
                            timer: 1500
                          });
                    }
                    carga.classList.remove('spinner-border','spinner-border-sm');

                }

            });

        }
    });


    

});


$(function () {
    $("#doi")
        .popover({ title: 'Ejemplo de un DOI', content: "https://doi.org/10.1590/3710800/2022" })
        .blur(function () {
            $(this).popover('hide');
        });
});





/* LOGIN ADMIN */
$('#formLoginAdmin').submit(function(e) {
    e.preventDefault();

    var correo = $.trim($("#correo_admin").val());
    var contra = $.trim($("#contrasena_admin").val());

    if (correo.length == "" || contra.length == "") {
        Swal.fire({ 
            icon: 'error',
            title: 'Debe ingresar un correo y/o contraseña',
        });
    } else {
        $.ajax({
            url: "?c=loginAdmin&a=Acceder",
            type: "POST", 
            datatype: "json", 
            data: { correo: correo, contrasena: contra},

            success: function(data){
                if (data == "null") {
                    
                    Swal.fire("X.X","Fallo al entrar!","error");
                }else{
                    window.location.href = "?c=paper&a=BienvenidoAdmin";
                }
            }
        });
    }


});



/* PANTALLA PRINCIPAL - NOSOTROS */
jQuery(document).ready(function($) {
    "use strict";
    var navclone = function() {
        $('.js-clone-nav').each(function() {
            var $this = $(this);
            $this.clone().attr('class', 'clone-view').appendTo('.mobile-view-body');
        });

        $('body').on('click', '.js-toggle', function(e) {
            var $this = $(this);
            e.preventDefault();


            if ($('body').hasClass('off-view')) {
                $('body').removeClass('off-view');
            } else {
                $('body').addClass('off-view');
            }
        });

        $(document).mouseup(function(e) {
            var container = $('.mobile-view');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('off-view')) {
                    $('body').removeClass('off-view');
                }
            }
        });

        $(window).resize(function() {
            var $this = $(this),
                w = $this.width();
            if (w > 768) {
                if ($('body').hasClass('off-view')) {
                    $('body').removeClass('off-view');
                }
            }
        })

    }
    navclone();


    const vertical_slider = {

        slider_class: ".slider-vertical",

        show_slide: function(slide_id, context_item) {
            const slide_container = context_item.closest(this.slider_class).querySelector(".slides");
            if (slide_container) {
                const slides = slide_container.querySelectorAll(".slide");
                if (slides && slides[slide_id]) {

                    slide_container.scrollTo({
                        top: slides[slide_id].offsetTop,
                        behavior: "smooth"
                    });


                    const active_context_item = context_item.closest(".slide_navigation").querySelector(".active");
                    if (active_context_item) {
                        active_context_item.classList.remove("active");
                    }

                    context_item.classList.add("active");
                }
            }
        },

        init_slider: function(slider) {

            const navigation_items = slider.querySelectorAll(".slide_navigation a");

            if (navigation_items) {
                Object.keys(navigation_items).forEach(function(key) {
                    navigation_items[key].onclick = function(e) {
                        e.preventDefault();

                        vertical_slider.show_slide(key, navigation_items[key]);
                    };
                });
            }

        },

        init: function() {

            document.querySelectorAll(this.slider_class).forEach((slider) => this.init_slider(slider));

        }
    };

    vertical_slider.init();

});

