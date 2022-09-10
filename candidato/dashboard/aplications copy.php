<section class="Aplicaciones-section">


    <div class="row">
        <h3 class="text-animation"><?php echo $lang['candidato_invi_applications']?></h3>
    </div>

    <?php

    $contador_apli = 0;

    $request_apli = "SELECT idOferta,titulo_oferta,descripcion_oferta,salario_mensual,nivel_experiencia,ciudad_general,estado_postulacion, fecha_postulacion FROM ciudad, postulaciones INNER JOIN oferta ON postulaciones.Oferta_idOferta = oferta.idOferta WHERE postulaciones.Candidato_idCandidato = $id_cantidato AND ciudad.idCiudad = oferta.ciudad_idCiudad";


    $resul_apli = mysqli_query($connection, $request_apli);

    $count_aplicaciones = mysqli_num_rows($resul_apli);

    if (!$resul_apli) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($resul_apli)) {
        $db_idOferta_postu = $row['idOferta'];
        $db_titulo_oferta_postu = $row['titulo_oferta'];
        $db_descripcion_oferta_postu = $row['descripcion_oferta'];
        $db_salario_mensual_postu = $row['salario_mensual'];
        $db_nivel_experiencia_postu = $row['nivel_experiencia'];
        $db_ciudad_postu = $row['ciudad_general'];
        $db_fecha_postulacion = $row['fecha_postulacion'];
        $db_estado_postulacion_postu = $row['estado_postulacion'];

        $contador_apli = $contador_apli + 1;
    ?>


        <div class="row">
            <div class="story">
                <div class="row">
                    <div class="col-1-of-2">
                        <div class="content-left">
                            <div style="padding-right: 2rem;" class="company_img">
                                <img src="img/company__logo.jpg" alt="Negocios" class="company__img--p1">
                            </div>
                            
                            <h5 class="title_country">
                                <?php
                                $date2 = date_create($db_fecha_postulacion);
                                echo date_format($date2, "Y/m/d"); ?>
                            </h5>
                            <h3 class="title_company"><?php echo $db_ciudad_postu ?></h3>

                            <h4 class="title_company--sub"><?php echo $db_titulo_oferta_postu ?></h4>
                            <h5 class="title_country"><?php echo substr($db_descripcion_oferta_postu, 0, 180); ?></h5>
                            <ul id="skills" style="padding-top: 1rem;" class="lista-habilidades">
                                <?php
                                if ($db_estado_postulacion_postu == "1") {
                                    echo "<li><i class='fas fa-circle' style='color: gray;'></i>". $lang['dash_manage_pending']."</li>";
                                }
                                if ($db_estado_postulacion_postu == "2") {
                                    echo "<li><i class='fas fa-circle' style='color: green;'></i>" . $lang['dash_manage_selected'] . "</li>";
                                }
                                if ($db_estado_postulacion_postu == "3") {
                                    echo "<li><i class='fas fa-circle' style='color: blue;'></i>". $lang['dash_manage_pre_selected'] ."</li>";
                                }
                                if ($db_estado_postulacion_postu == "4") {
                                    echo "<li><i class='fas fa-circle' style='color: red;'></i>". $lang['dash_manage_discarded'] ."</li>";
                                }
                                if ($db_estado_postulacion_postu == "5") {
                                    echo "<li><i class='fas fa-circle' style='color: gray;'></i>". $lang['dash_manage_archived'] ."</li>";
                                }
                                ?>
                            </ul>
                        </div>

                     

                    </div>
                    <div class="col-1-of-2">
                        <div class="content-right">
                            <h3 class="title_country"><?php echo $lang['candidato_invi_remuneration']?></h3>
                            <h4 class="title_company--sub">$<?php echo $db_salario_mensual_postu ?></h4>
                            <h5 class="title_country"><?php echo  $db_nivel_experiencia_postu ?></h5>
                            <a href="detalle_oferta.php?ofer=<?php echo $db_idOferta_postu ?>" style="font-size: 1.2rem; margin-top: 1rem;" class="btn btn--blue-dark u-margin-top-2"><?php echo $lang['candidato_invi_see_more']?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    }
    ?>


    <?php if ($count_aplicaciones < 1) :  ?>
        <div class="row">
        <div style="text-align: center;">
    <img src="img/empty.jpg" alt="" style="width: 53%; height: 53rem;">
    </div>
        </div>

    <?php endif; ?>

</section>