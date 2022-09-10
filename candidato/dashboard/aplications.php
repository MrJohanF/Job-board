<section class="Aplicaciones-section">


    <div class="row">
        <h3 class="text-animation"><?php echo $lang['candidato_invi_applications'] ?></h3>
    </div>



    <div class="row">

        <div style="display: inline-flex; flex-wrap: wrap;">
            <?php

            $contador_apli = 0;

            $request_apli = "SELECT Empresa_idEmpresa,idOferta,titulo_oferta,descripcion_oferta,salario_mensual,nivel_experiencia,ciudad_general,estado_postulacion, fecha_postulacion FROM ciudad, postulaciones INNER JOIN oferta ON postulaciones.Oferta_idOferta = oferta.idOferta WHERE postulaciones.Candidato_idCandidato = $id_cantidato AND ciudad.idCiudad = oferta.ciudad_idCiudad";


            $resul_apli = mysqli_query($connection, $request_apli);

            $count_aplicaciones = mysqli_num_rows($resul_apli);

            if (!$resul_apli) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_array($resul_apli)) {
                $db_idOferta_postu = $row['idOferta'];
                $db_Empresa_idEmpresa = $row['Empresa_idEmpresa'];
                $db_titulo_oferta_postu = $row['titulo_oferta'];
                $db_descripcion_oferta_postu = $row['descripcion_oferta'];
                $db_salario_mensual_postu = $row['salario_mensual'];
                $db_nivel_experiencia_postu = $row['nivel_experiencia'];
                $db_ciudad_postu = $row['ciudad_general'];
                $db_fecha_postulacion = $row['fecha_postulacion'];
                $db_estado_postulacion_postu = $row['estado_postulacion'];

                $contador_apli = $contador_apli + 1;
            ?>





                <div class="card-container">
                    <span class="pro"><i class="fas fa-check-circle"></i></span>

                    <?php
                    $nombre_fichero_jpg = 'profile_empleador/profile' . $db_Empresa_idEmpresa . '.jpg';
                    $nombre_fichero_jpeg = 'profile_empleador/profile' . $db_Empresa_idEmpresa . '.jpeg';
                    $nombre_fichero_png = 'profile_empleador/profile' . $db_Empresa_idEmpresa . '.png';
                    $imagen = 0;
                    if (file_exists($nombre_fichero_jpg)) {
                        echo " <img src='profile_empleador/profile" . $db_Empresa_idEmpresa . ".jpg' alt='logo' class='round'>";
                        $imagen = 1;
                    }
                    if (file_exists($nombre_fichero_jpeg)) {
                        echo " <img src='profile_empleador/profile" . $db_Empresa_idEmpresa . ".jpeg' alt='logo' class='round'>";
                        $imagen = 1;
                    }
                    if (file_exists($nombre_fichero_png)) {
                        echo " <img src='profile_empleador/profile" . $db_Empresa_idEmpresa . ".png' alt='logo' class='round'>";
                        $imagen = 1;
                    }
                    if ($imagen == 0) {

                        echo   "<div style='width: 100%'><div style='position: relative;
                     width: 10rem;
                     height: 10rem;
                     color: #0056b4;
                     border-color: #0056b4;
                     border-style: solid;
                     border-radius: 50%;
                     border-width: 1px;
                     font-size: 4rem;
                     text-align: center;
                     left: 50%;
                     transform: translateX(-50%);'><h1 style='padding-top: 3px; font-weight: 400;'>" . strtoupper($db_titulo_oferta_postu[0]) . "</h1></div></div>";
                    }
                    ?>


                    <h3 class="card_selection-title"><?php echo ucfirst(substr($db_titulo_oferta_postu, 0, 20)); ?></h3>
                    <h6 class="card_selection-subtitle"><?php echo $db_ciudad_postu; ?></h6>
                    <p class="card_selection-description"><?php echo ucfirst(substr($db_descripcion_oferta_postu, 0, 110)) . "..."; ?></p>
                    <div class="buttons">
                        <button style="cursor: pointer;" onclick="location.href=' detalle_oferta.php?ofer=<?php echo $db_idOferta_postu ?>'" class="primary">
                            Ver mas
                        </button>
                        <button class="primary ghost">
                            <?php

                            $date2 = date_create($db_fecha_postulacion);
                            echo date_format($date2, "Y/m/d"); ?>

                        </button>
                    </div>
                    <div class="skills">
                        <h6 style="margin-bottom: 1rem; color: white;" class="card_selection-subtitle">Skills</h6>


                        <ul>
                            <?php

                            $consulta_habilidad_oferta = "SELECT * FROM habilidades_requerida_oferta INNER JOIN habilidades_generales ON habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales  WHERE Oferta_idOferta = $db_idOferta_postu LIMIT 3";


                            $resultado_habilidad_oferta = mysqli_query($connection, $consulta_habilidad_oferta);


                            if (!$resul_profile) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($resultado_habilidad_oferta)) {

                                $nombre_habilidad = $row['nombre_habilidad_general'];

                            ?>

                                <li><?php echo $nombre_habilidad; ?></li>

                            <?php
                            }
                            ?>


                        </ul>
                    </div>
                </div>


                

            <?php
            }
            ?>
        </div>
    </div>
    <?php if ($count_aplicaciones < 1) :  ?>
        <div class="row">
            <div style="text-align: center;">
                <img src="img/empty.jpg" alt="" style="width: 53%; height: 53rem;">
            </div>
        </div>

    <?php endif; ?>


</section>