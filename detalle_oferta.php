<?php
session_start();

if (isset($_POST["lang"])) {
    $lang = $_POST["lang"];
    if (!empty($lang)) {
        $_SESSION["lang"] = $lang;
    }
}

if (isset($_SESSION["lang"])) {
    $lang = $_SESSION["lang"];
    require "lang/" . $lang . ".php";
} else {
    require "lang/es.php";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/icon-font.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="/css/awesomefont/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">




    <title>TuJob</title>
</head>

<body>



    <header class="header-browser">

        <div class="row">
            <div class="main_content">
                <div class="col-1-of-3">
                    <img style="height: 3.5rem; padding-left: 2rem;" src="img/emplea_logo.webp" alt="logo" class="header-browser__logo">
                </div>
                <div class="col-2-of-3">
                    <div class="main_options">
                        <?php include "header.php"; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="u-margin-top-4">
                <div class="col-1-of-3">
                    <div class="header-browser__line-vertical">
                        <h1 class="header-browser__title"><?php echo $lang['detail_offer_title'] ?></h1>
                        <h2 class="header-browser__subtitle"><?php echo $lang['detail_offer_subtitle'] ?></h2>
                    </div>
                </div>
                <div class="col-2-of-3">
                    <form action="#" class="form-browser">
                        <div class="form-browser__group">
                            <div class="form-browser__email-input">
                                <input type="text" class="form-browser__input" placeholder="<?php echo $lang['detail_offer_search_text'] ?>" id="correo" required>
                                </input>
                                <label for="correo" class="form-browser__label"><?php echo $lang['detail_offer_search_text'] ?></label>
                            </div>
                            <div class="form-browser__email-btn">
                                <button href="#" class="btn-cuadrado-submit btn-cuadrado-submit--blue"><i class="fas fa-search" style="margin-right: 1rem;"></i><?php echo $lang['detail_offer_search'] ?></button></i>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </header>
    <main>


        <?php include "php/db.php" ?>

        <?php

        $obtenido = $_GET['ofer'];

        $request_oferta = "SELECT * FROM oferta INNER JOIN tipo_trabajo ON oferta.tipo_idTipo_trabajo = tipo_trabajo.idTipo_trabajo INNER JOIN tipos_contrato ON oferta.tipo_idContrato = tipos_contrato.idTipo_contrato INNER JOIN lenguaje_general ON oferta.Lenguaje_idLenguaje = lenguaje_general.idLenguaje INNER JOIN empresa ON oferta.Empresa_idEmpresa = empresa.idEmpresa WHERE idOferta = $obtenido";


        $resul_oferta = mysqli_query($connection, $request_oferta);
        if (!$resul_oferta) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($resul_oferta);

        $db_idOferta = $row['idOferta'];
        $db_idEmpresa = $row['idEmpresa'];
        $db_verificado_empresa = $row['verificado_empresa'];
        $db_nombre_empresa = $row['nombre_empresa'];
        $db_func_oculto_nombre = $row['func_oculto_nombre'];
        $db_titulo_oferta = $row['titulo_oferta'];
        $db_descripcion_oferta = $row['descripcion_oferta'];
        $db_jornada_laboral = $row['jornada_laboral'];
        $db_salario_mensual = $row['salario_mensual'];
        $db_estudios_minimos = $row['estudios_minimos'];
        $db_nivel_experiencia = $row['nivel_experiencia'];
        $db_vacantes_disponibles = $row['vacantes_disponibles'];
        $db_fecha_contratation = $row['fecha_contratacion'];
        $db_fecha_publicacion = $row['fecha_publicacion'];
        $db_fecha_expiracion = $row['fecha_expiracion'];
        $db_tipo_trabajo = $row['tipo_trabajo'];
        $db_tipo_contrato = $row['tipo_contrato'];
        $db_Lenguaje_idLenguaje = $row['Nombre'];


        ?>

        <section style="padding-bottom: 8rem;">
            <div class="row">



                <div class="section-oferta-top">



                    <div style="padding-right: 0rem; padding-left: 0; float: left; width: 9rem; border-left-style: none; border-right-style: solid; margin-top: 0.6rem; margin-right: 1rem; cursor: pointer;" class="container-profile LinkProfileCompany">

                        <?php

                        $nombre_fichero_jpg = 'profile_empleador/profile' . $db_idEmpresa . '.jpg';
                        $nombre_fichero_jpeg = 'profile_empleador/profile' . $db_idEmpresa . '.jpeg';
                        $nombre_fichero_png = 'profile_empleador/profile' . $db_idEmpresa . '.png';
                        $imagen = 0;
                        if (file_exists($nombre_fichero_jpg)) {
                            echo "
                            <img src='profile_empleador/profile" . $db_idEmpresa . ".jpg' alt='logo' style='width: 80%; height: 100%; border-radius : 7px;'>";
                            $imagen = 1;
                        }
                        if (file_exists($nombre_fichero_jpeg)) {
                            echo "<img src='profile_empleador/profile" . $db_idEmpresa . ".jpeg' alt='logo' style='width: 80%; height: 100%; border-radius : 7px;'>";
                            $imagen = 1;
                        }
                        if (file_exists($nombre_fichero_png)) {
                            echo "<img src='profile_empleador/profile" . $db_idEmpresa . ".png' alt='logo' style='width: 80%; height: 100%; border-radius : 7px;'>";
                            $imagen = 1;
                        }
                        if ($imagen == 0) {
                            echo "<img src='uploads/logo.jpg' alt='logo' style='width: 80%; height: 100%; border-radius: 7px;'>";
                        }
                        ?>
                        <div>


                        </div>


                    </div>


                    <div style="margin-top: 0.3%;">


                        <h1 style="font-size: 2rem; font-weight: 300; margin-bottom: -0.6rem;" class="section-text-title"><?php echo $db_titulo_oferta ?></h1>


                        <h1 style="font-size: 2rem; margin-top: 4px;" class="section-text-title"> <?php

                                                                                                    if ($db_func_oculto_nombre == "1") {
                                                                                                        echo ucfirst("Empresa del sector");
                                                                                                    } else {
                                                                                                        if (!empty($db_nombre_empresa)) {
                                                                                                            echo ucfirst($db_nombre_empresa);
                                                                                                            if ($db_verificado_empresa == "1") {
                                                                                                                echo " <i title='Empresa verificada' style='color: #00a2f3; font-size: 1.6rem;' class='fas fa-check-circle'></i>";
                                                                                                            }
                                                                                                        } else {

                                                                                                            echo ucfirst("Empresa del sector");
                                                                                                        }
                                                                                                    }
                                                                                                    ?>

                        </h1>

                    </div>


                    <form action="aplicacion_oferta.php" method="POST">
                        <input style="visibility: hidden;" value="<?php echo $db_idOferta ?>" type="text" name="idOferta">
                        <button type="submit" class="btn-detalle-oferta btn-detalle-oferta--blue" value="idOferta"><?php echo $lang['detail_offer_apply'] ?></button>
                    </form>
                    <div style="margin-top: 1rem;">


                        <div class="section-text-subtitles">



                            <h2 class="option-text-detalle"><i class="fas fa-chair" style="padding-right: 1rem; color: brown;"></i><?php echo $lang['detail_offer_type_work'] ?> <?php echo $db_tipo_trabajo  ?></h2>
                            <h2 style="padding-left: 1rem; color: lightslategray;">|</h2>
                            <h2 class="option-text-detalle" style="padding-left: 2rem;"><i class="fas fa-file-contract" style="padding-right: 1rem; color: cadetblue;"></i><?php echo $lang['detail_offer_type_contract'] ?> <?php echo $db_tipo_contrato  ?></h2>
                            <h2 style="padding-left: 1rem; color: lightslategray;">|</h2>
                            <h2 class="option-text-detalle" style="padding-left: 2rem;"><i class="fas fa-language" style="padding-right: 1rem; color: dodgerblue;"></i><?php echo $lang['detail_offer_language_required'] ?> <?php echo $db_Lenguaje_idLenguaje ?></h2>
                        </div>

                        <div class="section-text-subtitles">

                            <h2 class="option-text-detalle"><i class="fas fa-dollar-sign" style="padding-right: 1rem; color: #24a245;"></i><?php echo $lang['detail_offer_salary'] ?> : <?php echo number_format($db_salario_mensual, 0, ' ', '.') . " COP"; ?></h2>
                            <h2 style="padding-left: 1rem; color: lightslategray;">|</h2>

                            <h2 class="option-text-detalle"><i class="fas fa-calendar-alt" style="padding-right: 1rem; padding-left: 2rem; color: lightskyblue;"></i><?php echo $lang['detail_offer_published'] ?> <?php $date = new DateTime($db_fecha_publicacion);
                                                                                                                                                                                                                    echo $date->format('d/m/Y'); ?></h2>
                            <h2 style="padding-left: 1rem; color: lightslategray;">|</h2>
                            <h2 class="option-text-detalle"><i class="fas fa-calendar-day" style="padding-right: 1rem; padding-left: 2rem; color: #5335fb;"></i><?php echo $lang['detail_offer_expiration_date'] ?> : <?php $date_exp = new DateTime($db_fecha_expiracion);
                                                                                                                                                                                                                        echo $date_exp->format('d/m/Y'); ?></h2>

                        </div>


                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-2-of-3">

                    <div class="section-oferta-description">
                        <p class="section-text-description-title"><?php echo $lang['detail_offer_detail'] ?></p>
                        <p class="cajas-texto description-oferta-text"><?php echo nl2br($db_descripcion_oferta)  ?></p>
                    </div>

                    <div class="section-oferta-skills">
                        <p class="section-text-description-title"><?php echo $lang['detail_offer_skills_required'] ?></p>
                        <ul id="skills" class="lista-habilidades">

                            <?php



                            $request_skill = "SELECT * FROM `habilidades_requerida_oferta` INNER JOIN habilidades_generales ON habilidades_generales.idHabilidades_generales = habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales WHERE Oferta_idOferta = $db_idOferta";


                            $resul_skill = mysqli_query($connection, $request_skill);
                            if (!$resul_skill) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($resul_skill)) {
                                $db_habilidad = $row['nombre_habilidad_general'];
                            ?>
                                <li><?php echo $db_habilidad ?></li>


                            <?php
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- segundo bloque salary -->

                </div>
                <div class="col-1-of-3">

                    <div style="padding-left: 12rem;" class="social-club">
                        <p class="section-skill-title"><?php echo $lang['detail_offer_share_project'] ?></p>

                        <ul class="container-social-club">
                            <li> <a href="wwww.lindedin.com"><i class="fab fa-linkedin" style="color: #027fb5; font-size: 2rem; padding-right: 1rem;"></i><?php echo $lang['detail_offer_share_linkedin'] ?></a></li>
                            <li><i class="fab fa-facebook-square" style="color: #4867aa; font-size: 2rem;padding-right: 1rem;"></i><?php echo $lang['detail_offer_share_facebook'] ?></li>
                            <li><i class="fab fa-twitter-square" style="color: #00a2f3; font-size: 2rem;padding-right: 1rem;"></i><?php echo $lang['detail_offer_share_twitter'] ?></li>
                        </ul>

                    </div>

                </div>
            </div>



        </section>

    </main>

    <?php include "footer.php"; ?>

    <?php include "popup.php"; ?>


    <script>
        var idOferta = <?php echo $db_idOferta ?>;

        var idEmpresa = <?php echo $db_idEmpresa ?>;

        $('.LinkProfileCompany').click(function() {

            location.href = "/company.php?empresa=" + idEmpresa;

            return false;
        });



        function aplicar_oferta() {
            try {



                var ow = {
                    idOferta: idOferta
                }

                $.ajax({
                    type: "POST",
                    url: "../aplicacion_oferta.php",
                    data: ow,
                    success: function(data) {
                        window.location.href = "aplicacion_oferta.php";

                    }
                })



            } catch (error) {

            }
        }
    </script>

    <script>
        var coll = document.getElementsByClassName("collapsible-filter");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>

</body>

</html>