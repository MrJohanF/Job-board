<?php

session_start();

if (!isset($_SESSION['s_email'])) {
    header("Location: ../index.php");
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


    <title>TuJob</title>
</head>

<body>



    <header class="header-browser">

        <div class="row">
            <div class="main_content">
                <div class="col-1-of-3">
                    <img src="img/emplea_logo_azul.webp" alt="logo" class="header-browser__logo">
                </div>
                <div class="col-2-of-3">
                    <div class="main_options">

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="u-margin-top-4">
                <div class="col-1-of-3">
                    <div class="header-browser__line-vertical">
                        <h1 class="header-browser__title">Interview</h1>
                        <h2 class="header-browser__subtitle">Entrevista</h2>
                    </div>
                </div>
                <div class="col-2-of-3">

                </div>
            </div>
        </div>

    </header>
    <main>


        <?php

        include "php/db.php";


        if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
            // Verify data
            $email = $_GET['email']; // Set email variable
            $token = $_GET['hash']; // Set hash variable

            if ($_SESSION['s_email'] == $email) {



                $search = "SELECT idEntrevista_candidato, hash FROM entrevista_candidato WHERE hash ='" . $token . "'";
                $register_user_query = mysqli_query($connection, $search);
                $match  = mysqli_num_rows($register_user_query);

                $row2 = mysqli_fetch_array($register_user_query);
                $idEntrevista_candidato = $row2['idEntrevista_candidato'];
                
                if ($match > 0) {

                    // We have a match, activate the account

        ?>

                    <section style="padding-top: 5rem;">

                        <div class="row">


                            <?php
                            //cifrado del ide de la entrevista

                             $request_pregunta = "SELECT  idPregunta, pregunta, idEntrevista FROM entrevista_pregunta, entrevista_candidato INNER JOIN entrevista ON entrevista_candidato.entrevista_idEntrevista = entrevista.idEntrevista WHERE entrevista_pregunta.entrevista_idEntrevista = entrevista_candidato.entrevista_idEntrevista AND entrevista_candidato.hash = '$token' AND estado = '0' ";


                            $resul_pregunta = mysqli_query($connection, $request_pregunta);


                            if (!$resul_pregunta) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }
                            $row_cnt = mysqli_num_rows($resul_pregunta);

                       


                            if ($row_cnt >= 1) {

                            ?>


                                <div class="form-login__group">
                                    <h3 class="text-animation">Informacion personal</h3>
                                </div>

                                <form>

                                    <?php

                                    $contador = 0;

                                    while ($row = mysqli_fetch_array($resul_pregunta)) {
                                        $db_idPregunta = $row['idPregunta'];
                                        $db_pregunta = $row['pregunta'];
                                        $db_interview = $row['idEntrevista'];
                                        $contador = $contador + 1;
                                    ?>

                                        <label class="form-login__input"><input style="visibility: hidden;" disabled id="pregunta_<?php echo $contador ?>" type="text" placeholder="Pregunta" value="<?php echo $db_idPregunta; ?>"><?php echo $db_pregunta; ?></label>
                                        <textarea class="formtext" id="respuesta_<?php echo $contador ?>" placeholder="Respuesta" style="margin-bottom: 2rem;"></textarea>

                                    <?php
                                    }
                                    ?>
                                    <a onclick="send_answers_interview()" class="btn-detalle-oferta btn-detalle-oferta--blue">Enviar</a>
                                </form>
                            <?php

                            } else {

                            ?>

                                <section style="padding-top: 5rem;">
                                    <div class="row">
                                        <h1>Ya fue contestada la oferta</h1>
                                    </div>
                                </section>



                            <?php
                            }
                            ?>


                        </div>
                    </section>



                    <script>
                        var idCandidato = <?php echo $_SESSION['s_id_candidato']; ?>;
                        var idInterview = <?php echo $db_interview ?>;
                        var idInvitacion = <?php echo $idEntrevista_candidato ?>;
                        var contador = <?php echo $contador; ?>;
                        var hash = "<?php echo $token; ?>";

                        function send_answers_interview() {

                            var ddData2 = [];

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
                            paqueteDeDatos.append('idInterview', idInterview);
                            paqueteDeDatos.append('idCandidato', idCandidato);
                            paqueteDeDatos.append('idInvitacion', idInvitacion);
                            paqueteDeDatos.append('hash', hash);



                            $.ajax({
                                type: "POST",
                                url: "../php/respuestas_interview.php",
                                data: paqueteDeDatos,
                                contentType: false,
                                processData: false,
                                cache: false,
                                beforeSend: function(objeto) {

                                },
                                success: function(data) {
                                     window.location="index.php";
                                  
                                }
                            })
                        }
                    </script>

                <?php


                } else {
                    // No match -> invalid url or account has already been activated.

                ?>
                    <section style="padding-top: 5rem;">
                        <div class="row">
                            <h1>Este enlance es invalido o ha expirado.</h1>
                        </div>
                    </section>

                <?php

                }
            } else {
                ?>
                <section style="padding-top: 5rem;">
                    <div class="row">
                        <h1>Este enlance es invalido o ha expirado</h1>
                    </div>
                </section>
        <?php
            }
        } else {
            header("Location: ../index.php");
        }


        ?>

    </main>
    <?php include "footer.php"; ?>
</body>

</html>