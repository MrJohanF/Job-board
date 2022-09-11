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


    <title>Reset password</title>
</head>

<body>



    <header class="header-browser">

        <div class="row">
            <div class="main_content">
                <div class="col-1-of-3">
                    <img style="height: 3.5rem; padding-left: 2rem; padding-right: 4rem" src="img/emplea_logo.webp" alt="logo" class="header-browser__logo">
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
                        <h1 class="header-browser__title">Cambiar contraseña</h1>
                        <h2 class="header-browser__subtitle">Cambiar contraseña</h2>
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

        if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['token']) && !empty($_GET['token'])) {
            // Verify data
            $email = $_GET['email']; // Set email variable
            $token = $_GET['token']; // Set hash variable

            $search = "SELECT email_empresa, token FROM empresa WHERE email_empresa='" . $email . "' AND token='" . $token . "'";
            $register_user_query = mysqli_query($connection, $search);
            $match  = mysqli_num_rows($register_user_query);

            
            if ($match > 0) {
                // We have a match, activate the account

        ?>

                <section style="padding-top: 5rem;">

                    <div class="row">

                        <div style="padding-bottom: 8rem; width: 50%; transform: translateX(50%);">

                            <div style="text-align: center; padding-bottom: 5rem;">
                                <h3 class="login__title">Nueva Contraseña</h3>
                            </div>

                            <div class="form-login__group">
                                <input type="password" class="form-login__input" autocomplete="FALSE" placeholder="Nueva Contraseña" id="pass1" required>
                                <label for="pass1" class="form-login__label">Nueva Contraseña</label>
                            </div>
                            <div class="form-login__group">
                                <input type="password" class="form-login__input" autocomplete="FALSE" placeholder="Contraseña" id="pass2" required>
                                <label for="pass2" class="form-login__label">Confirmar contraseña</label>
                            </div>


                            <input type="button" class="btn-cuadrado-full btn-cuadrado-full--yellow" value="Aceptar" onclick="reset_password()">

                        </div>


                    </div>
                </section>



                <script>
                    function reset_password() {

                        var pass1 = $("#pass1").val();
                        var pass2 = $("#pass2").val();
                        var token = '<?php echo $token ?>';
                        var email = '<?php echo $email ?>';

                        if (pass2 == pass1) {

                            var ob = {
                                email: email,
                                password: pass2,
                                token: token
                            }

                            $.ajax({
                                type: "POST",
                                url: "php/reset_password_company.php",
                                data: ob,
                                beforeSend: function(objeto) {},
                                success: function(data) {

                                    alert(data);

                                    setTimeout(function() {

                                        location.href = "index.php";
                                    }, 600)
                                }

                            })
                        } else {
                            alert("Las contraseñas no coinciden");
                        }


                    }
                </script>

            <?php


            } else {
                // No match -> invalid url or account has already been activated.

            ?>
                <section style="padding-top: 5rem; padding-bottom: 4rem;">
                    <div class="row">
                        <span style="padding-left: 2rem; color: black; font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 2rem;" class="footer-subtitle-skills">El link es invalido o este enlance ya expiro.</span>
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