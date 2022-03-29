<div class="container my-5">
            <h2 class="titulo">SERVICIOS</h2>

            <div class="servicios my-3">
                <div class="servicio">
                    <div class="logo-servicio py-3">
                        <i class="fas fa-search" style="font-size: 35px;color: #e88f53;"></i>
                    </div>
                    <div class="info-servicio">
                        <div style="font-weight: 800;">Busca en el repositorio</div>
                        <div><a class="enlace-servicio" style="text-decoration: none; color: #979797; font-weight: bold;" href="?c=articulo&a=Repositorio">Ver más</a></div>
                    </div>
                </div>
                <div class="servicio">
                    <div class="logo-servicio py-3">
                        <i class="fas fa-file-alt" style="font-size: 35px;color: #e88f53;"></i>
                    </div>
                    <div class="info-servicio">
                        <div style="font-weight: 800;">Suba un nuevo Paper</div>
                        <div><a class="enlace-servicio" style="text-decoration: none; color: #979797; font-weight: bold;" href="?c=paper">Ver más</a></div>
                    </div>
                </div>
                <div class="servicio">
                    <div class="logo-servicio py-3">
                        <i class="fas fa-folder-plus" style="font-size: 35px;color: #e88f53;"></i>
                    </div>
                    <div class="info-servicio">
                        <div style="font-weight: 800;">Revisa tus Papers</div>
                        <div><a class="enlace-servicio" style="text-decoration: none; color: #979797; font-weight: bold;" href="?c=paper">Ver más</a></div>
                    </div>
                </div>
                <div class="servicio">
                    <div class="logo-servicio py-3">
                        <i class="fas fa-history" style="font-size: 35px;color: #e88f53;"></i>
                    </div>
                    <div class="info-servicio">
                        <div style="font-weight: 800;">Revisa tu historial de versiones</div>
                        <div><a class="enlace-servicio" style="text-decoration: none; color: #979797; font-weight: bold;" href="?c=paper">Ver más</a></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container my-5">
            <h2 class="titulo text-uppercase">Últimas publicaciones</h2>
            <div class="slider py-5" >
                <div class="owl-carousel">

                    <?php foreach($this->modelo->Listar_Articulos_Inicio() as $a):?>
                        <div class="slider-card py-4">
                            <h5 class="mb-0 text-center"><b><?=$a->titulo?></b></h5>
                            <div class="p-4">
                                <p class="text-center"><span style="font-weight: bold;">Autores: </span><?=$a->autor?></p>
                                <p class="text-center"><span style="font-weight: bold;">Fecha de publicación: </span> <br> <?=$a->fecha_subida?></p>
                                <p class="text-center"><a class="enlace-servicio" style="text-decoration: none; color: #fff; font-weight: bold;" href="?c=articulo&a=Repositorio">Ver más</a></p>
                            </div>

                        </div>

                    <?php  endforeach; ?> 
                </div>
            </div>


        </div>