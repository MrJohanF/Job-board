<section class="dashboard-main">
    <div class="row">
        <div class="col-1-of-4">

            <div class="feature-dashboard" onclick="location.href='/dashboard.php#profile'" style="cursor: pointer;">
                <div class="icon_performance-dashboard u-margin-botton-2">
                    <img class="icon_performance-dashboard-container" src="img/account.png" alt="high-performance">
                </div>
                <h3 class="heading-tertiary-small"><?php echo $lang['candidato_board_edit_profile'] ?></h3>
                <p class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang['candidato_board_click_see'] ?></p>
            </div>

        </div>
        <div class="col-1-of-4">

            <div class="feature-dashboard" onclick="location.href='/dashboard.php#invitations'" style="cursor: pointer;">
                <div class="icon_performance-dashboard u-margin-botton-2">
                    <img class="icon_performance-dashboard-container" src="img/mail.png" alt="high-performance">
                </div>
                <h3 class="heading-tertiary-small"><?php echo $lang['candidato_board_invitations'] ?></h3>
                <p class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang['candidato_board_click_see'] ?></p>
            </div>

        </div>
        <div class="col-1-of-4">

            <div class="feature-dashboard" onclick="location.href='/dashboard.php#aplications'" style="cursor: pointer;">
                <div class="icon_performance-dashboard u-margin-botton-2">
                    <img class="icon_performance-dashboard-container" src="img/survey.png" alt="high-performance">
                </div>
                <h3 class="heading-tertiary-small"><?php echo $lang['candidato_board_applications'] ?></h3>
                <p class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang['candidato_board_click_see'] ?></p>
            </div>

        </div>
        <div class="col-1-of-4">

            <div class="feature-dashboard" style="cursor: pointer;">
                <div class="icon_performance-dashboard u-margin-botton-2">
                    <img class="icon_performance-dashboard-container" src="img/code.png" alt="high-performance">
                </div>
                <h3 class="heading-tertiary-small">Proyectos freelancer</h3>
                <p class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang['candidato_board_click_see'] ?></p>
            </div>

        </div>
    </div>
    <div class="row">

        <div class="col-1-of-4">
            <div class="feature-dashboard" style="cursor: pointer;" onclick="location.href='ofertas.php'">
                <div class="icon_performance-dashboard u-margin-botton-2">
                    <img class="icon_performance-dashboard-container" src="img/search.png" alt="high-performance">
                </div>
                <h3 class="heading-tertiary-small"><?php echo $lang['candidato_board_looking_job'] ?></h3>
                <p class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang['candidato_board_click_see'] ?></p>
            </div>
        </div>

        <div class="col-1-of-4">

            <div class="feature-dashboard" style="cursor: pointer;">
                <div class="icon_performance-dashboard u-margin-botton-2">
                    <img class="icon_performance-dashboard-container" src="img/headset.png" alt="high-performance">
                </div>
                <h3 class="heading-tertiary-small"><?php echo $lang['candidato_board_support_help'] ?></h3>
                <p class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang['candidato_board_click_see'] ?></p>
            </div>

        </div>
    </div>
</section>


<style>
    .edited {
        font-family: 'Poppins', sans-serif;
    }

    .edited2 h1 {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;

    }

    .edited3 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .habilidad li {
        float: left;
        padding: 0.6rem;
        margin: 0.5rem;
        border-radius: 15px;
        border-color: #2962ff80;
        border-style: solid;
        border-width: 1px;
    }
</style>

<section style="margin-bottom: 10rem;">
    <div class="row">



        <h3 style="margin-bottom: 5rem;" class="heading-tertiary-small"><?php echo $lang['candidato_board_offers_recomended'] ?></h3>

        <?php

        $db_id_candidate = $_SESSION['s_id_candidato'];


        $consulta_adding_skills_full_array['id'] = array();

        $consulta_adding_skills = "SELECT DISTINCT idOferta, titulo_oferta, descripcion_oferta, func_resaltar, func_urgente  FROM habilidades_requerida_oferta INNER JOIN oferta ON habilidades_requerida_oferta.Oferta_idOferta = idOferta WHERE Habilidades_generales_idHabilidades_generales = ";

        $request_profile = "SELECT * FROM `habilidades_candidato` WHERE candidato_idCandidato = $db_id_candidate";


        $resul_profile = mysqli_query($connection, $request_profile);
        $count = mysqli_num_rows($resul_profile);



        if ($count > 0) :

            if (!$resul_profile) {
                die("QUERY FAILED" . mysqli_error($connection));
            }


            while ($row = mysqli_fetch_array($resul_profile)) {

                array_push($consulta_adding_skills_full_array['id'],  "SELECT DISTINCT Habilidades_generales_idHabilidades_generales FROM habilidades_requerida_oferta WHERE Habilidades_generales_idHabilidades_generales = '" . $row["Habilidades_generales_idHabilidades_generales"] . "'");
            }


            $length = count($consulta_adding_skills_full_array["id"]);

            for ($c = 0; $c < $length; $c++) {
                $consulta_adding_skills .=  " (" . $consulta_adding_skills_full_array["id"][$c] . "" . (($c == $length - 1) ? "" : " ) OR Habilidades_generales_idHabilidades_generales =");
            }




            $consulta_adding_skills = $consulta_adding_skills . ") LIMIT 4";



            $resul_ofertas_relacionadas = mysqli_query($connection, $consulta_adding_skills);

            if (!$resul_ofertas_relacionadas) {
                die("QUERY FAILED" . mysqli_error($connection));
            }


            while ($row = mysqli_fetch_array($resul_ofertas_relacionadas)) {
                $db_idOferta = $row['idOferta'];
                $db_titulo_oferta = $row['titulo_oferta'];
                $db_descripcion_oferta = $row['descripcion_oferta'];
                $db_func_resaltar = $row['func_resaltar'];
                $db_func_urgente = $row['func_urgente'];
        ?>


                <div class="col-1-of-4">

                    <div onclick="location.href = 'detalle_oferta.php?ofer=<?php echo $db_idOferta ?>'" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px; height: 28rem; overflow: hidden; border-radius: 8px; cursor: pointer;">

                        <div style="width: 100%; height: 14rem; position: relative;">


                            <div class="edited" style="font-weight:300 ; background-color: #2962ffd9; color: white; text-align: center; transform: rotateZ(312deg); height: auto; left: -5rem; position: absolute; top: 3.3rem; width: 19rem; font-size: 2rem;">
                                <span>Destacado</span>
                            </div>
                            <div class="edited" style="color: #555555; border-style: solid; border-width: 1px; border-color: #2962ff; padding: 1rem; border-radius: 50%; font-size: 3.6rem; top: 50%; position: absolute; width: 5.5rem;left: 50%; transform: translate(-50%, -50%); text-align: center;">
                                <span><?php echo  ucfirst(strtoupper($db_titulo_oferta[0]));  ?></span>
                            </div>

                        </div>


                        <div class="edited2" style="text-align: center; display: block; padding-left: 1rem; padding-right: 1rem;">
                            <h1><?php echo  ucfirst(substr($db_titulo_oferta, 0, 20)) . ".."; ?></h1>
                            <h1 style="font-size: 1.3rem; color: #787878;"><?php echo  ucfirst(substr($db_descripcion_oferta, 0, 59)) . "..."; ?></h1>

                            <div class="edited3" style="display: inline-flex; margin-top: 2rem;">
                                <ui class="habilidad" style="list-style: none; margin: 0; padding: 0; overflow: hidden; float: left; color: #424242;">


                                    <?php

                                    $consulta_habilidad_oferta = "SELECT * FROM habilidades_requerida_oferta INNER JOIN habilidades_generales ON habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales  WHERE Oferta_idOferta = $db_idOferta LIMIT 2";


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



                                </ui>
                            </div>
                        </div>

                    </div>


                </div>

        <?php
            }
        endif;
        ?>












    </div>
</section>