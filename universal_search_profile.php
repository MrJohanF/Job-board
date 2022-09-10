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

if (!isset($_SESSION['e_email_empresa'])) {
    header("Location: ../index.php");
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
    <script type="text/javascript" src="/js/sweetalert.min.js"></script>


    <title>TuJob</title>
</head>

<body>


    <?php


    error_reporting(E_ALL ^ E_NOTICE);


    include "php/db.php";


    $idCODIGO = $_GET["oferta"];


    $db_id_empresa = $_SESSION['e_idEmpresa'];

    $idcandidato = $idCODIGO;



    try {


        $consulta_censura = "SELECT * FROM `consultas_basedatos` WHERE idEmpresa_empresa = '{$db_id_empresa}' and idCandidato_candidato  = '{$idcandidato}' ";


        $resul_censura = mysqli_query($connection, $consulta_censura);
        if (!$resul_censura) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        $row_cen = mysqli_fetch_array($resul_censura);


        if (empty($row_cen)) {

            $db_consulta_view = "0";
        } else {
            $db_consulta_view = $row_cen['consulta_view'];
        }
    } catch (Exception $e) {
    }



    $post_query_count = "SELECT * FROM candidato INNER JOIN ciudad ON candidato.ciudad = ciudad.idCiudad INNER JOIN pais ON ciudad.pais_idPais = pais.idPais WHERE idCandidato = $idcandidato ";
    $find_count = mysqli_query($connection, $post_query_count);

    $count = mysqli_num_rows($find_count);



    ?>

    <header class="header-browser-profile">
        <div class="row">
            <div class="main_content">
                <div class="col-1-of-3">
                    <img style="height: 3.5rem;" src="img/emplea_logo.webp" alt="logo" class="header-browser__logo">
                </div>
                <div class="col-2-of-3">
                    <div class="main_options">

                        <?php include "header.php"; ?>
                    </div>
                </div>
            </div>
        </div>



    </header>

    <?php if ($count > 0) : ?>



        <?php

        try {


            $request_profile = "SELECT * FROM candidato INNER JOIN ciudad ON candidato.ciudad = ciudad.idCiudad INNER JOIN pais ON ciudad.pais_idPais = pais.idPais WHERE idCandidato = $idcandidato";


            $resul_profile = mysqli_query($connection, $request_profile);
            if (!$resul_profile) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            $row = mysqli_fetch_array($resul_profile);

            $db_id = $row['idCandidato'];
            $db_fecha_registro = $row['fecha_registro'];
            $db_nombre = $row['nombre'];
            $db_apellido = $row['apellido'];
            $db_numero_cedula = $row['numero_cedula'];
            $db_foto_perfil = $row['foto_perfil'];
            $db_fecha_nacimiento = $row['fecha_nacimiento'];
            $db_edad = $row['edad'];
            $db_telefono = $row['telefono'];
            $db_email = $row['email'];
            $db_genero = $row['genero'];
            $db_pais = $row['nombre_pais'];
            $db_id_ciudad = $row['ciudad'];
            $db_ciudad = $row['ciudad_general'];
            $db_direccion = $row['direccion'];
            $db_tipo_cuenta = $row['tipo_cuenta'];
            $db_numero_whatsapp = $row['numero_whatsapp'];
            $db_aspiracion_salarial = $row['aspiracion_salarial'];
            $db_cargo_deseado = $row['cargo_deseado'];
            $db_disponibilidad_vehiculo = $row['disponibilidad_vehiculo'];
            $db_disponibilidad_viajar = $row['disponibilidad_viaje'];
            $db_descripcion = $row['descripcion'];
            $db_verificado_candidato = $row['verificado_candidato'];
            $db_tipo_trabajo = $row['id_tipoTrabajo'];
            $db_nivel_ingles = $row['nivel_ingles'];
        } catch (Exception $e) {
        }

        ?>


        <main style="margin-left: 0; margin-bottom: 10rem;">


            <section class="profile">
                <div class="row">
                    <div style="height: auto; padding-bottom: 2rem;" class="profile-card">
                        <div class="row">
                            <div class="col-1-of-4">
                                <div style="padding-bottom: 1rem;" class="profile-card__form">

                                    <?php
                                    $nombre_fichero_jpg = 'uploads/profile' . $db_id . '.jpg';
                                    $nombre_fichero_jpeg = 'uploads/profile' . $db_id . '.jpeg';
                                    $nombre_fichero_png = 'uploads/profile' . $db_id . '.png';
                                    $imagen = 0;
                                    if (file_exists($nombre_fichero_jpg)) {
                                        echo "<img src='uploads/profile" . $db_id . ".jpg' alt='logo' class='profile-img'>";
                                        $imagen = 1;
                                    }
                                    if (file_exists($nombre_fichero_jpeg)) {
                                        echo "<img src='uploads/profile" . $db_id . ".jpeg' alt='logo' class='profile-img'>";
                                        $imagen = 1;
                                    }
                                    if (file_exists($nombre_fichero_png)) {
                                        echo "<img src='uploads/profile" . $db_id . ".png' alt='logo' class='profile-img'>";
                                        $imagen = 1;
                                    }
                                    if ($imagen == 0) {
                                        if ($db_genero == 1) {
                                            echo "<img src='uploads/icon-man.png' alt='logo' class='profile-img'>";
                                        } else {
                                            echo "<img src='uploads/icon-woman.png' alt='logo' class='profile-img'>";
                                        }
                                    }
                                    ?>


                                    <h3 class="profile-title-name-card"><?php if ($db_verificado_candidato == 1) {
                                                                            echo "<i class='fas fa-check-circle' style='padding-right: 5px; color: #00cc8d;'></i>";
                                                                        } else {
                                                                            echo "<i class='fas fa-times-circle' style='padding-right: 9px; color: #ff4e4e;'></i>";
                                                                        } ?></i><?php echo ucfirst($db_nombre); ?> <?php echo ucfirst($db_apellido); ?></h3>
                                    <h4 class="profile-register-date">Miembro desde <?php echo $db_fecha_registro ?> </h4>
                                </div>
                            </div>
                            <div class="col-2-of-4">

                                <div class="profile-card__content">
                                    <h3 class="profile-title-card">Crea tu mundo a tu forma</h3>
                                    <h3 class="profile-subtitle-card" style="color: #55acee;"><?php echo $db_ciudad ?>| <?php echo $db_pais ?></h3>

                                    <p class="profile-subtitle-card u-margin-top-2"><?php echo $db_descripcion ?></p>


                                </div>
                            </div>
                            <div class="col-1-of-4">
                                <div class="profile-card__skills">
                                    <div class="row">
                                        <div class="col-1-of-2">
                                            <h3 id="random-color" class="profile-card-number"><?php if ($db_edad == "") {
                                                                                                    echo "N/A";
                                                                                                } else {
                                                                                                    echo $db_edad;
                                                                                                } ?></h3>
                                            <h3 class="profile-card-service">Edad</h3>
                                        </div>
                                        <div class="col-1-of-2">
                                            <h3 id="random-color2" class="profile-card-number"><?php if ($db_genero == "") {
                                                                                                    echo "N/A";
                                                                                                } else {
                                                                                                    if ($db_genero == "2") {
                                                                                                        echo "<i style='color: #e626cf;' class='fas fa-venus'></i>";
                                                                                                    }

                                                                                                    if ($db_genero == "1") {
                                                                                                        echo "<i style='color: #184281;' class='fas fa-mars'></i>";
                                                                                                    }
                                                                                                } ?></h3>
                                            <h3 class="profile-card-service">Genero</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1-of-2">

                                            <h3 id="random-color3" class="profile-card-number"><?php if ($db_disponibilidad_viajar == "0") {
                                                                                                    echo "N/A";
                                                                                                } else {
                                                                                                    if ($db_disponibilidad_viajar == "1") {
                                                                                                        echo "Si";
                                                                                                    }
                                                                                                    if ($db_disponibilidad_viajar == "2") {
                                                                                                        echo "No";
                                                                                                    }
                                                                                                } ?></h3>
                                            <h3 class="profile-card-service">Disponibilidad de viaje</h3>
                                        </div>
                                        <div class="col-1-of-2">
                                            <h3 class="profile-card-number">
                                                <?php if ($db_verificado_candidato == 1) {
                                                    echo "<i class='fas fa-check-circle' style='padding-right: 5px; color: #00cc8d;'></i>";
                                                } else {
                                                    echo "<i class='fas fa-times-circle' style='padding-right: 1px; color: #ff4e4e;'></i>";
                                                } ?></h3>
                                            <h3 class="profile-card-service">Cuenta verificada</h3>
                                        </div>
                                    </div>

                                    <div>



                                        <script>
                                            var idcandidato = <?php echo $idcandidato ?>;

                                            function siguiente() {

                                                url = "../php/check_next_candidate.php?candidate=" + idcandidato;

                                                $.ajax({
                                                    url: url,
                                                    beforeSend: function(objeto) {

                                                    },
                                                    success: function(data) {
                                                        window.location = "universal_search_profile.php?oferta=" + data;
                                                    }
                                                })




                                            }


                                            $(document).keydown(function(tecla) {
                                                if (tecla.keyCode == 37) {
                                                    atras();
                                                }
                                                if (tecla.keyCode == 39) {
                                                    siguiente();
                                                }
                                            });

                                            function atras() {
                                                url = "../php/check_prior_candidate.php?candidate=" + idcandidato;

                                                $.ajax({
                                                    url: url,
                                                    beforeSend: function(objeto) {

                                                    },
                                                    success: function(data) {
                                                        window.location = "universal_search_profile.php?oferta=" + data;
                                                    }
                                                })


                                            }
                                        </script>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: inline-flex; width: 100%;">
                            <div style="transform: translateX(8%); padding-left: 1rem; padding-right: 61.5%;">
                                <div class='tooltip'>
                                    <a onclick="atras()" class="btn-cuadrado-form btn-cuadrado-form--blue" style="margin-left: 0; background-color: #bfbfbf;"><i class="fas fa-arrow-left"></i></a>
                                    <span style="top: 130%;" class='tooltiptext'>Puedes usar la flecha (←) para retroceder de registro</span>
                                </div>
                                <div class='tooltip'>
                                    <a onclick="siguiente()" class="btn-cuadrado-form btn-cuadrado-form--blue" style="background-color: #bfbfbf;"><i class="fas fa-arrow-right"></i></a>
                                    <span style="top: 130%;" class='tooltiptext'>Puedes usar la flecha (→) para avanzar de registro</span>
                                </div>
                            </div>
                            <div>

                                <div class='tooltip'>
                                    <a href="#invitation" class="btn-cuadrado-form btn-cuadrado-form--blue">Enviar Oferta</a>
                                    <span style="top: 130%;" class='tooltiptext'>Envia una invitacion de vacante personalizada.</span>
                                </div>

                                <div class='tooltip'>
                                    <a onclick="consulta_base(<?php echo $db_id_empresa ?>, <?php echo $idcandidato ?>)" href="#" style="background-color: #bfbfbf;" class="btn-cuadrado-form btn-cuadrado-form--blue"><i class="far fa-eye"></i></a>
                                    <span style="top: 130%;" class='tooltiptext'>Consume un credito para revelar la informacion de contacto de este candidato.</span>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </section>

            <div class="row">
                <div class="col-2-of-3">

                    <section>

                        <h3 class="title-skills-main">Experiencia Laboral</h3>


                        <?php


                        $request_habilidad = "SELECT * FROM certificados_candidato_laboral  WHERE Candidato_idCandidato  = $db_id ";


                        $resul_habilidad = mysqli_query($connection, $request_habilidad);
                        if (!$resul_habilidad) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_habilidad)) {

                            $db_idInformacion_laboral = $row['idCertificados_candidato_laboral'];
                            $db_nombre_empresa_exp = $row['nombre_empresa'];
                            $db_cargo_ocupado_exp = $row['cargo_ocupado'];
                            $db_inicio_tiempo_laborado_exp = $row['inicio_tiempo_laborado'];
                            $db_final_tiempo_laborado_exp = $row['final_tiempo_laborado'];
                            $db_funciones_realizadas = $row['funciones_realizadas'];


                        ?>

                            <div class="container-exp">
                                <div class="cargo-exp">
                                    <h3 class="cargo-exp-txt"><?php echo $db_cargo_ocupado_exp ?></h3>
                                </div>
                                <div class="company-detail-exp">
                                    <h3 class="company-name-exp"><i class="fas fa-building" style="color: rgb(56, 56, 56);"></i> <?php echo $db_nombre_empresa_exp ?></h3>
                                    <h3 class="company-end-exp"><i class="far fa-calendar-alt" style="color: rgb(56, 56, 56);"></i> <?php echo $db_final_tiempo_laborado_exp ?> hasta <?php echo $db_inicio_tiempo_laborado_exp ?></h3>
                                </div>
                                <div class="company-description-container-exp">
                                    <h3 class="company-description-exp-txt"><?php echo $db_funciones_realizadas ?></h3>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    </section>

                    <section style="margin-top: 5rem;">
                        <h3 class="title-skills-main">Educacion</h3>

                        <?php


                        $request_habilidad = "SELECT * FROM certificados_candidato_educacion  WHERE Candidato_idCandidato  = $db_id ";


                        $resul_habilidad = mysqli_query($connection, $request_habilidad);
                        if (!$resul_habilidad) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_habilidad)) {

                            $db_idInformacion_edu = $row['idCertificados_candidato'];
                            $db_nombre_institucion_edu = $row['nombre_institucion'];
                            $db_titulo_edu = $row['titulo'];
                            $db_fecha_finalizacion_edu = $row['fecha_finalizacion'];
                            $db_encurso_edu = $row['encurso_estudiando'];


                        ?>

                            <div class="container-exp">
                                <div class="cargo-exp">
                                    <h3 class="cargo-exp-txt"><?php echo $db_titulo_edu ?></h3>
                                </div>
                                <div class="company-detail-exp">
                                    <h3 class="company-name-exp"><i class="fas fa-building" style="color: rgb(56, 56, 56);"></i> <?php echo $db_nombre_institucion_edu ?></h3>
                                    <h3 class="company-end-exp"><i class="far fa-calendar-alt" style="color: rgb(56, 56, 56);"></i> <?php echo $db_fecha_finalizacion_edu ?></h3>
                                </div>
                                <div class="company-description-container-exp">
                                    <h3 class="company-description-exp-txt">Estado: <?php echo $db_encurso_edu ?></h3>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </section>

                    <section style="margin-top: 10rem;">



                        <?php

                        $request_entrevista = "SELECT * FROM `entrevista_respuesta` INNER JOIN entrevista_pregunta ON entrevista_respuesta.pregunta_idPregunta = entrevista_pregunta.idPregunta INNER JOIN entrevista ON entrevista_pregunta.entrevista_idEntrevista = entrevista.idEntrevista WHERE candidato_idCandidato = $db_id ";


                        $resul_entrevista = mysqli_query($connection, $request_entrevista);
                        if (!$resul_entrevista) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_entrevista)) {

                            $cv_entrevista_nombre = $row['entrevista_nombre'];
                            $cv_pregunta = $row['pregunta'];
                            $cv_respuesta = $row['respuesta'];



                        ?>

                            <div style="margin-top: 1rem;" class="container-exp">


                                <div class="cargo-exp">
                                    <h3 style="color: #2f2f33; font-size: 2rem;" class="cargo-exp-txt"><?php echo ucwords($cv_entrevista_nombre) ?></h3>
                                </div>
                                <div class="company-detail-exp">
                                    <h3 style="padding-top: 1rem;" class="company-name-exp"><?php echo ucwords($cv_pregunta) ?></h3>
                                </div>
                                <div class="company-description-container-exp">
                                    <input disabled style="border-radius: 7px;border-width: 1px;padding: .7rem;margin-left: -1px;" class="company-description-exp-txt" value="<?php echo $cv_respuesta ?>">
                                </div>

                            </div>


                        <?php
                        }
                        ?>

                    </section>



                    <section style="margin-top: 10rem;">


                        <h3 class="title-skills-main">Comentarios</h3>


                        <?php

                        $request_habilidad = "SELECT * FROM notas_candidato WHERE Candidato_idCandidato = {$db_id}";


                        $resul_habilidad = mysqli_query($connection, $request_habilidad);
                        $row = mysqli_fetch_array($resul_habilidad);


                        if ($row && $row["nota_observacion"] == !'') {
                            $nota_observacion = $row['nota_observacion'];
                        } else {
                            $nota_observacion = "";
                        }

                        ?>


                        <textarea class="formtext required" id="comments" placeholder="" style="margin-bottom: 2rem; margin-top: 1rem;"><?php echo $nota_observacion ?></textarea>

                        <input type="button" onclick="save_comments(<?php echo $db_id ?>, <?php echo $db_id_empresa ?>)" class="btn-cuadrado-form btn-cuadrado-form--blue" value="Guardar comentarios">


                    </section>



                    <script>
                        function save_comments(idCandidato, idEmpresa) {


                            var texto_comment = $("#comments").val();


                            var paqueteDeDatos = new FormData();

                            paqueteDeDatos.append('comment', texto_comment);
                            paqueteDeDatos.append('idCandidato', idCandidato);

                            paqueteDeDatos.append('idEmpresa', idEmpresa);

                            $.ajax({
                                type: "POST",
                                url: "../php/save_comments_profile.php",
                                data: paqueteDeDatos,
                                contentType: false,
                                processData: false,
                                cache: false,
                                beforeSend: function(objeto) {

                                },
                                success: function(data) {
                                    console.log(data);

                                    swal("Comentarios actualizados!", "Completado!", "success").then((value) => {

                                    });
                                }
                            })
                        }
                    </script>

                </div>

                <div class="col-1-of-3">

                    <section style="padding-bottom: 2rem;">


                        <h3 class="title-skills-main">Aspiracion salarial</h3>

                        <h3 style="margin-top: 2rem;" class="cargo-exp-txt">$ <?php if ($db_aspiracion_salarial == "") {
                                                                                    echo "N/A";
                                                                                } else {
                                                                                    echo number_format($db_aspiracion_salarial, 2, '.', '.') . " COP";
                                                                                } ?></h3>


                    </section>


                    <section style="padding-bottom: 2rem;">

                        <h3 class="title-skills-main">Informacion datos personales</h3>

                        <h3 style="margin-top: 2rem;" class="cargo-exp-txt">Celular</h3>

                        <h3 class="company-end-exp"><?php if ($db_telefono == "") {
                                                        echo "N/A";
                                                    } else {

                                                        if ($db_consulta_view == "0") {
                                                            echo str_replace($db_telefono, "", "*** ***-****");
                                                        }
                                                        if ($db_consulta_view == "1") {
                                                            echo  $db_telefono;
                                                        }
                                                    } ?></h3>

                        <h3 class="cargo-exp-txt">Correo electronico</h3>

                        <h3 class="company-name-exp"></i> <?php if ($db_email == "") {
                                                                echo "N/A";
                                                            } else {

                                                                if ($db_consulta_view == "0") {
                                                                    echo str_replace($db_email, "", "*******@***.**");
                                                                }
                                                                if ($db_consulta_view == "1") {
                                                                    echo  $db_email;
                                                                }
                                                            } ?></h3>

                    </section>



                    <div>
                        <h3 class="title-skills-main">Redes sociales</h3>

                        <div style="margin-top: 2rem;">

                            <div style="display: inline-flex;">
                                <?php

                                $request_social = "SELECT * FROM `red_social` WHERE Candidato_idcandidato = $db_id";


                                $resul_social = mysqli_query($connection, $request_social);


                                while ($row = mysqli_fetch_array($resul_social)) {

                                    $db_id_social = $row['idtable1'];
                                    $db_red_social = $row['red_social'];
                                    $db_url_red_social = $row['url_red_social'];


                                    switch ($db_red_social) {
                                        case "instagram":
                                            if ($db_consulta_view == "0") {
                                                echo "<a ><img style='height: 2rem; margin-right: 2rem; filter: blur(2px);' src='img/instagram.png' alt='instagram'></a>";
                                            }
                                            if ($db_consulta_view == "1") {
                                                echo "<a href='$db_url_red_social'><img style='height: 2rem; margin-right: 2rem;' src='img/instagram.png' alt='instagram'></a>";
                                            }

                                            break;
                                        case "facebook":
                                            if ($db_consulta_view == "0") {
                                                echo "<a ><img style='height: 2rem; margin-right: 2rem; filter: blur(2px);' src='img/facebook.png' alt='facebook'></a>";
                                            }
                                            if ($db_consulta_view == "1") {
                                                echo "<a href='$db_url_red_social'><img style='height: 2rem; margin-right: 2rem;' src='img/facebook.png' alt='facebook'></a>";
                                            }

                                            break;
                                        case "whatsapp":
                                            if ($db_consulta_view == "0") {
                                                echo "<a ><img style='height: 2rem; margin-right: 2rem; filter: blur(2px);' src='img/whatsapp-logo.png' alt='whatsapp'></a>";
                                            }
                                            if ($db_consulta_view == "1") {
                                                echo "<a href='$db_url_red_social'><img style='height: 2rem; margin-right: 2rem;' src='img/whatsapp-logo.png' alt='whatsapp'></a>";
                                            }

                                            break;
                                        case "linkedin":
                                            if ($db_consulta_view == "0") {
                                                echo "<a ><img style='height: 2rem; margin-right: 2rem; filter: blur(2px);' src='img/linkedin.png' alt='linkedin'></a>";
                                            }
                                            if ($db_consulta_view == "1") {
                                                echo "<a href='$db_url_red_social'><img style='height: 2rem; margin-right: 2rem;' src='img/linkedin.png' alt='linkedin'></a>";
                                            }

                                            break;
                                    }
                                }
                                ?>




                            </div>



                        </div>

                    </div>



                    <h3 style="padding-top: 2rem;" class="title-skills-main">Habilidades</h3>

                    <!-- Habilidades -->


                    <?php


                    $request_habilidad = "SELECT * FROM habilidades_candidato INNER JOIN habilidades_generales ON habilidades_candidato.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales WHERE Candidato_idCandidato = $db_id ";


                    $resul_habilidad = mysqli_query($connection, $request_habilidad);
                    if (!$resul_habilidad) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_array($resul_habilidad)) {

                        $db_idHabilidad_candidato = $row['idhabilidades_candidato'];
                        $db_habilidad_nombre = $row['nombre_habilidad_general'];
                        $db_habilidad_valor = $row['valor'];



                    ?>
                        <div class="u-margin-top-2">
                            <div class="container-title-skills-profile">
                                <h3 class="title-skills"><?php echo $db_habilidad_nombre ?></h3>
                                <h3 class="value-skills"><?php echo $db_habilidad_valor ?>%</h3>
                            </div>
                            <div class="bar-skills-profile" style="width: <?php echo $db_habilidad_valor ?>%;">
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                    <div style="margin-top: 2rem;">
                        <h3 class="title-skills-main">Mi presentacion</h3>

                        <?php

                        try {


                            $request_video = "SELECT * FROM `presentaciones` WHERE idCandidato_candidato = $db_id";


                            $resul_video = mysqli_query($connection, $request_video);
                            if (!$resul_profile) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            $row = mysqli_fetch_array($resul_video);
                            $count_videos = mysqli_num_rows($resul_video);


                            if ($count_videos <= 0) {
                                $db_url_presentacion = "empty";
                            } else {
                                $db_url_presentacion = $row['url'];
                            }
                        } catch (Exception $e) {
                        }


                        ?>



                        <div style="margin-top: 2rem;">

                            <pre id="myCode"></pre>

                        </div>

                        <script>
                            function getId(url) {
                                let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                                let match = url.match(regExp);

                                if (match && match[2].length == 11) {
                                    return match[2];
                                } else {
                                    return 'error';
                                }
                            }

                            let myId = getId('<?php echo $db_url_presentacion; ?>');

                            if (myId == "error") {

                                $('#myCode').html('<h3 class="title-skills">Sin videos</h3>');

                            } else {
                                $('#myCode').html('<iframe width="100%" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');
                            }
                        </script>

                    </div>

                </div>
            </div>



            <!-- script random color -->

            <script src="js/random.js"></script>


            <!-- Consultas BD -->

            <script>
                function consulta_base(id_empresa, id_candidato) {

                    var ob = {
                        id_empresa: id_empresa,
                        id_candidato: id_candidato
                    }

                    $.ajax({
                        type: "POST",
                        url: "../php/consulta_bd.php",
                        data: ob,
                        beforeSend: function(objeto) {

                        },
                        success: function(data) {
                            switch (data) {
                                case "2x00022":

                                    swal("Credito consumido!", "Completado!", "success").then((value) => {
                                        location.reload();
                                    });

                                    break;
                                case "2x00021":

                                    swal("Ya has consumido un credito para este candidato!", "Informacion!", "info").then((value) => {
                                        //  location.reload();
                                    });

                                    break;
                                case "2x00020":

                                    swal("Has consumido el total de tus creditos!", "Advertencia!", "warning").then((value) => {
                                        //  location.reload();
                                    });

                                    break;

                                default:
                                    break;
                            }



                        }
                    })
                }
            </script>

            <style>
                .swal-text {
                    font-family: 'Poppins', sans-serif;
                }

                .swal-title {
                    font-family: 'Poppins', sans-serif;
                }
            </style>


        </main>



    <?php else : ?>


        <main style="margin-left: 0;">


            <section class="profile">
                <div class="row">
                    <div style="height: auto;" class="profile-card">
                        <div class="row">

                            <div style="text-align: center; padding-top: 9rem; margin-bottom: 5rem;">
                                <img style="margin-left: auto; margin-right: auto; display: block; width: 25%;" src="img/empty.png" alt="">

                                <div style="padding-top: 10rem;">
                                    <h1 style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 1.5rem;">No se ha encontrado informacion</h1>

                                </div>


                            </div>



                        </div>

                    </div>
            </section>



        </main>


    <?php endif; ?>


    <?php include "footer.php"; ?>


    <div class="popup" id="invitation">
        <div class="popup__content">
            <div class="popup__left">
                <div class="popup__filter">
                    <div class="popup__imagen"></div>
                </div>
            </div>

            <div class="popup__right">
                <a href="#main" class="popup__close">&times;</a>

                <div>
                    <div class="form-login">
                        <img style="width: 6rem; margin-bottom: 2rem;" src="img/invitation.png" alt="eror">
                        <div class="u-margin-botton-4" style="margin-bottom: 2rem;">
                            <h3 class="login__title">Invitacion</h3>

                        </div>
                        <h3 class="login__subtitle"><span>Envia una notificacion de tus vacantes disponibles a <?php echo ucfirst($db_nombre); ?></span></h3>

                        <div class="u-margin-botton-4" style="margin-bottom: 2rem; margin-top: 2rem;">
                            <select class="form-login__input" id="select_invitation">

                                <?php

                                $all_offer = "SELECT * FROM `oferta` INNER JOIN `empresa` ON oferta.Empresa_idEmpresa = empresa.idEmpresa WHERE aprobado = 1 AND active = 1 AND Empresa_idEmpresa = $db_id_empresa AND estado_idEstado = 1";

                                $resul_all_offer = mysqli_query($connection, $all_offer);
                                if (!$resul_all_offer) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }

                                while ($row = mysqli_fetch_array($resul_all_offer)) {
                                    $db_idOferta = $row['idOferta'];
                                    $db_titulo_oferta = $row['titulo_oferta'];

                                ?>
                                    <option value="<?php echo $db_idOferta; ?>"><?php echo $db_titulo_oferta ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>

                        <button onclick="send_invitation(<?php echo $idcandidato ?>, <?php echo $db_id_empresa ?>)" class="btn-cuadrado-full btn-cuadrado-full--yellow" style="margin-top: 2rem;">Invitar</button>

                        <div style="margin-top: 2rem; font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 1.6rem;" id="invitation_set_message">

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function send_invitation(idcandidate, idcompany) {

            var select = document.getElementById("select_invitation"); /*Obtener el SELECT */
            var idoffer = select.options[select.selectedIndex].value; /* Obtener el valor */
            var idcandidate = idcandidate;
            var idcompany = idcompany;


            var oc = {
                idoffer: idoffer,
                idcandidate: idcandidate,
                idcompany: idcompany
            };
            $.ajax({
                type: "POST",
                url: '../php/send_invitation.php',
                data: oc,
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    $("#invitation_set_message").html("<i style='color: #303fc4;' class='fas fa-check-circle'></i><span style='color: #7c7c7c;'> Invitación enviada satisfactoriamente</span> ");

                    setTimeout(function() {
                        $("#invitation_set_message").html("");
                    }, 2000);
                }
            })
        }
    </script>

</body>

</html>