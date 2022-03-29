<?php
/*     if (empty($_GET['alerta'])) 
    {
        $alerta=0;

    }else
        {
            $alerta=$_GET['alerta'];
        }

    switch ($alerta) {
        case 0:
            break;

        case 1:
        ?>           
           <script type="text/javascript">
  
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Ya existe una cuenta asociada a este correo!',
            })
          </script>;
           <?php

        break;

        case 2:
            ?>           
            <script type="text/javascript">
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: '¡Las contraseñas no son iguales!',
             })
           </script>;
            <?php
        break;
        case 3:
          ?>           
             <script type="text/javascript">
                Swal.fire({
                icon: 'success',
                title: 'Ya casi estamos listos..',
                text: 'Se ha enviado un código de verificación a su correo',
              })
            
            </script>;
             <?php
  
          break;

          case 4:
            ?>           
               <script type="text/javascript">
                    Swal.fire({
                    icon: 'success',
                    title: '¡Todo está listo!',
                    text: 'Inicia sesión con tu nueva cuenta',
                })
              </script>;
               <?php
    
            break;
            case 5:
                ?>           
                   <script type="text/javascript">
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '¡El código de verificación es incorrecto!',
                    })
                  </script>;
                   <?php
        
                break;
        default:
        ?>           
        <script type="text/javascript">
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '¡Las contraseñas no son iguales!',
         })
        
       </script>;
        <?php
      }   
 */