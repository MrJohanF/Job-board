<?php
session_start();

$idOferta = $_POST['idOferta'];
$idCandidato = $_SESSION['s_id_candidato'];

if (!isset($_SESSION['s_email'])) {
    header("Location: ../detalle_oferta.php?ofer=" . $idOferta . "#popup");
}

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
    
                <img src="img/emplea_logo.webp" alt="logo" style="padding-left: 2rem; height: 3.5rem;" class="header-browser__logo">
                </div>
                <div class="col-2-of-3">
                    <div class="main_options">

                        <ul class="footer_list">
                            <li class="main__item"><a href="index.php" class="main__link"><?php echo $lang['nav_bar-home']?></a></li>
                            <li class="main__item"><a href="ofertas.php" class="main__link"><?php echo $lang['nav_bar-findjob']?></a></li>

                            <li class="main__item"><a href="empresas.php" class="main__link"><?php echo $lang['nav_bar-company']?></a></li>
                            <li class="main__item"><a href="contactanos.html" class="main__link"><?php echo $lang['nav_bar-contact']?></a></li>
                            <?php if ($_SESSION['s_id_candidato']) : ?>

                                <a href="dashboard.php" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2"><?php echo $lang['nav-bar_opt-1']?></a>
                                <a href="php/logout.php" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><?php echo $lang['button_sign-out']?></a>
                            <?php else : ?>
                                <a href="#popup" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2"><?php echo $lang["button_sign-in"] ?></a>
                                <a href="#register" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><?php echo $lang["button_register"] ?></a>
                            <?php endif; ?>



                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="u-margin-top-4">
                <div class="col-1-of-3">
                    <div class="header-browser__line-vertical">
                        <h1 class="header-browser__title"><?php echo $lang['postulation_title']?></h1>
                        <h2 class="header-browser__subtitle"><?php echo $lang['postulation_subtitle']?></h2>
                    </div>
                </div>
                <div class="col-2-of-3">
                    <form action="#" class="form-browser">
                        <div class="form-browser__group">
                            <div class="form-browser__email-input">
                                <input type="text" class="form-browser__input" placeholder="<?php echo $lang['detail_offer_search_text']?>" id="correo" required>
                                </input>
                                <label for="correo" class="form-browser__label"><?php echo $lang['detail_offer_search_text']?>.</label>
                            </div>
                            <div class="form-browser__email-btn">
                                <button href="#" class="btn-cuadrado-submit btn-cuadrado-submit--blue"><i class="fas fa-search" style="margin-right: 1rem;"></i><?php echo $lang['detail_offer_search']?></button></i>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </header>
    <main>

        <section style="padding-top: 5rem;">

            <div class="row">
                <?php include "php/db.php" ?>

                <?php


                $request_pregunta = "SELECT * FROM pregunta WHERE oferta_idOferta = $idOferta";


                $resul_pregunta = mysqli_query($connection, $request_pregunta);
                if (!$resul_pregunta) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                $row_cnt = mysqli_num_rows($resul_pregunta);

                if ($row_cnt >= 1) {

                ?>


                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['dash_edit_main_text']?></h3>
                    </div>

                    <form>

                        <?php

                        $contador = 0;

                        while ($row = mysqli_fetch_array($resul_pregunta)) {
                            $db_idPregunta = $row['idPregunta'];
                            $db_pregunta = $row['pregunta'];
                            $contador = $contador + 1;
                        ?>

                            <label class="form-login__input"><input style="visibility: hidden; display: none;" disabled id="pregunta_<?php echo $contador ?>" type="text" placeholder="Pregunta" value="<?php echo $db_idPregunta; ?>"><?php echo $db_pregunta; ?></label>
                            <textarea class="formtext" id="respuesta_<?php echo $contador ?>" minlength="50" placeholder="Respuesta" style="margin-bottom: 2rem; padding: 2rem; width: 94%; margin-top: 2rem;"></textarea>

                        <?php
                        }
                        ?>
                        <a onclick="postular()" href="#popup" class="btn-detalle-oferta btn-detalle-oferta--blue">Aplicar</a>

                    </form>
                <?php

                } else {
                    $fecha = new DateTime('now', new DateTimeZone('America/Bogota'));
                    $fecha2 = $fecha->format('Y-m-d H:i:s');


                    $enviar = "INSERT INTO `postulaciones` (`idPostulaciones`,
                    `fecha_postulacion`, 
                    `Candidato_idCandidato`,
                    `Oferta_idOferta`) VALUES 
                    (NULL, '$fecha2', '$idCandidato', '$idOferta') ";

                    $resul_enviar = mysqli_query($connection, $enviar);

                    echo "<script>setTimeout(function() {window.location.href = 'ofertas.php'}, 5000);</script>"
                ?>

                    <section style="position: inherit; padding-top: 2rem;" class="section-stories">

                        <div style="text-align: left;" class="u-center-text">
                            <h2 class="heading-secondary-3"><span class="heading-color-blue"><?php echo $lang['congrats']?></span></h2>
                            <h2 class="heading-secondary-3"><?php echo $lang['congrats_application']?></h2>

                        </div>

                        <div style="height: 66%; background-image: url(../img/man2.jpg); background-size: cover; background-position-y: -24rem; opacity: 0.1;" class="bg-video">

                    </section>


                <?php
                }
                ?>
            </div>

        </section>

        <script>
            var idCandidato = <?php echo $_SESSION['s_id_candidato']; ?>;
            var idOferta = <?php echo $idOferta; ?>;
            var contador = <?php echo $contador; ?>;

            function postular() {

                var ddData2 = [];
                var hoy = new Date();
                var fecha = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
                var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
                var fechaYHora = fecha + ' ' + hora;
                var paqueteDeDatos = new FormData();

                for (step = 1; step <= contador; step++) {

                    var objeto = {
                        idPregunta: document.getElementById("pregunta_" + step).value,
                        respuesta: document.getElementById("respuesta_" + step).value,
                    }

                    //agregas al array.
                    ddData2.push(objeto);

                }


                paqueteDeDatos.append('array2', JSON.stringify(ddData2));
                paqueteDeDatos.append('idCandidato', idCandidato);
                paqueteDeDatos.append('idOferta', idOferta);
                paqueteDeDatos.append('fecha', fechaYHora);


                $.ajax({
                    type: "POST",
                    url: "../php/postulacion.php",
                    data: paqueteDeDatos,
                    contentType: false,
                    processData: false,
                    cache: false,
                    beforeSend: function(objeto) {

                    },
                    success: function(data) {
                        $("#panel_editar").html(data);
                        /*     setTimeout(function() {
                                window.location.href = 'ofertas.php';
                            }, 1000); */
                    }
                })
            }
        </script>


    </main>


    <div class="popup" id="popup" style="background-color: rgba(0, 0, 0, 0.64);">
        <div class="popup__content" style="width: 30%; height: 25%;">
            <div class="popup__right" style="vertical-align: top;">
                <a href="#main" class="popup__close">&times;</a>
                <div id="panel_editar">
                </div>
                <div id="panel_editar_respuesta" class="popup__right">
                </div>
            </div>
        </div>
    </div>


    <?php include "footer.php"; ?>



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