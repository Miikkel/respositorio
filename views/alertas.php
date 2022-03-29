<?php

/*     if (empty($_GET['aux'])) 
        {
            $aux=0;

        }else
            {
                $aux=$_GET['aux'];
            }

    switch ($aux) {
        case 0:
        break;
          
        ?>           
        <script type="text/javascript">
         var aux1 = '<?php echo $aux; ?>'
         if ( aux1 == 1) {
           Swal.fire({
           icon: 'error',
           title: 'Oops...',
           text: 'El archivo subido no es un pdf!',

         })
         }
       </script>;
        <?php



        case 1:
        ?>           
           <script type="text/javascript">
            var aux1 = '<?php echo $aux; ?>'
            if ( aux1 == 1) {
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'El archivo subido no es un pdf!',

            })
            }
          </script>;
           <?php

        break;

        case 2:
            ?>           
            <script type="text/javascript">
             var aux1 = '<?php echo $aux; ?>'
             if ( aux1 == 2) {
               Swal.fire({
               icon: 'success',
               title: 'Correcto',
               text: 'Se ha subido tu artículo',
             })
             }
           </script>;
            <?php
        break;
        case 3:
          ?>           
             <script type="text/javascript">

                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se ha cargado ningun archivo',
  
              })
              
            </script>;
             <?php
  
          break;

        default:

        
        break;
        
 } */
