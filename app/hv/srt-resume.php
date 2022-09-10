<?php

function getPlantilla($datos, $experiencias, $educaciones, $habilidades)
{

    ob_start(); ?>

    <div class="container">
        <div class="row">
            <?php foreach ($datos as $dato) { ?>
                <div class="col-2-of-3">


                    <h1><?php echo $dato["nombre"]; ?></h1>
                    <h2><?php echo $dato["apellido"]; ?></h2>
                    <h3><?php echo $dato["email"]; ?></h3>
                    <h3><?php echo $dato["telefono"]; ?></h3>

                </div>
                <div class="col-1-of-3">
                    <div class="background-img">

                        <?php

                        $nombre_fichero_jpg = '../../uploads/profile' . $dato["idCandidato"] . '.jpg';
                        $nombre_fichero_jpeg = '../../uploads/profile' . $dato["idCandidato"] . '.jpeg';
                        $nombre_fichero_png = '../../uploads/profile' . $dato['idCandidato'] . '.png';
                        $imagen = 0;
                        if (file_exists($nombre_fichero_jpg)) {
                            echo "<img src='../../uploads/profile" . $dato["idCandidato"] . ".jpg' alt='logo' class='container-img'>";
                            $imagen = 1;
                        }
                        if (file_exists($nombre_fichero_jpeg)) {
                            echo "<img src='../../uploads/profile" . $dato["idCandidato"] . ".jpeg' alt='logo' class='container-img'>";
                            $imagen = 1;
                        }
                        if (file_exists($nombre_fichero_png)) {
                            echo "<img src='../../uploads/profile" . $dato["idCandidato"] . ".png' alt='logo' class='container-img'>";
                            $imagen = 1;
                        }
                        if ($imagen == 0) {
                            echo "<img src='../../uploads/logo.jpg' alt='logo' class='container-img'>";
                        }
                        ?>


                    </div>

                </div>
            <?php } ?>
        </div>
    </div>

    <section class="body">


        <div class="row">

            <div class="linea-decor">
                <span style="display: inline-flex;">
                    <div class="lines"></div>
                    <div class="line"></div>
                </span>
            </div>
            <span class="subtitle">PERFIL PROFESIONAL</span>

            <div class="row">
                <div style="padding-top: 1%; padding-bottom: 3%;">

                    <div class="row">
                        <span class="description"><?php echo $dato["descripcion"]; ?></span>
                    </div>
                </div>


            </div>



            <div class="row">
                <div class="col-2-of-3">

                    <div class="linea-decor">
                        <span style="display: inline-flex;">
                            <div class="lines1"></div>
                            <div class="line1"></div>
                        </span>
                    </div>


                    <span class="subtitle">EXPERIENCIA LABORAL</span>
                    <?php foreach ($experiencias as $experiencia) { ?>
                        <div class="row">
                            <div style="padding-top: 1%; padding-bottom: 1%;">
                                <div class="col-1-of-3">
                                    <span class="company"><?php echo $experiencia["nombre_empresa"]; ?></span>
                                </div>
                                <div class="col-2-of-3">
                                    <span class="description"> <?php echo $experiencia["funciones_realizadas"]; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="col-1-of-3">

                    <div class="left">
                        <div style="padding-bottom: 9%;">
                            <span style="display: inline-flex;">
                                <div class="lines2"></div>
                                <div class="line2"></div>
                            </span>
                        </div>

                        <span class="subtitle">Habilidades</span>

                        <div class="row">


                            <ul>
                                <?php foreach ($habilidades as $habilidad) { ?>
                                    <?php echo "<li>" . $habilidad["nombre_habilidad_general"] . "</li>"; ?>
                                <?php } ?>


                            </ul>


                        </div>
                    </div>



                </div>
            </div>


            <div class="row">



                <div class="linea-decor">
                    <span style="display: inline-flex;">
                        <div class="lines"></div>
                        <div class="line"></div>
                    </span>
                </div>
                <span class="subtitle">EDUCACION</span>
                <?php foreach ($educaciones as $educacion) { ?>
                    <div class="row">
                        <div style="padding-top: 1%; padding-bottom: 3%;">
                            <div class="col-1-of-4">
                                <span class="company"><?php echo $educacion["nombre_institucion"]; ?></span>
                            </div>
                            <div class="col-3-of-4">

                                <span class="description"><?php echo $educacion["titulo"]; ?></span>
                                <span class="description"><?php echo $educacion["encurso_estudiando"]; ?></span>

                            </div>
                        </div>
                    </div>
                <?php } ?>




            </div>

            <!--
        <div class="row">

            <div class="linea-decor">
                <span style="display: inline-flex;">
                    <div class="lines"></div>
                    <div class="line"></div>
                </span>
            </div>
            <span class="subtitle">EXPERIENCE</span>

            <div class="row">
                <div style="padding-top: 1%;">
                    <div class="col-1-of-4">
                        <span class="company">company</span>
                    </div>
                    <div class="col-3-of-4">

                        <span class="description"> Lorem ipsum dolor, sit
                            amet consectetur adipisicing elit.
                            Sit officiis nostrum magni doloribus</span>

                    </div>
                </div>
            </div>

        </div>

            -->

    </section>





<?php
    $my_var = ob_get_clean();
    return $my_var;
}

?>