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
    <script src="/js/tools.js"></script>



    <title>TuJob</title>
</head>

<body>

    <?php include "loader.php"; ?>


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
                <div class="header-browser__line-vertical">
                    <h1 class="header-browser__title"><?php echo $lang['contac_title'] ?></h1>
                    <h2 class="header-browser__subtitle"><?php echo $lang['contac_subtitle'] ?></h2>
                </div>
            </div>
        </div>

    </header>


    <main>

        <section>

            <div class="row">
                <form role="form" action="/php/send_contact_form.php" method="POST">

                    <div class="u-margin-top-8">
                        <h4 class="heading-primary" style="font-size: 4rem; color: rgb(51, 51, 51);"><?php echo $lang['contac_contact_form'] ?></h4>
                    </div>

                    <div class="u-margin-top-4">
                        <!-- middle Block -->
                        <div class="form-login__group" style="display: inline-flex; width: 100%;">
                            <div class="form-login__group" style="width: 49%; padding-right: 2%;">
                                <input type="text" class="form-login__input" placeholder="<?php echo $lang['contac_name'] ?>" name="email_name" required>
                                <label for="email_name" class="form-login__label"><?php echo $lang['contac_name'] ?></label>
                            </div>
                            <div class="form-login__group" style="width: 47%;">
                                <input type="tel" class="form-login__input" placeholder="<?php echo $lang['contac_cellphone'] ?>" name="email_phone" required>
                                <label for="email_phone" class="form-login__label"><?php echo $lang['contac_cellphone'] ?></label>

                            </div>
                        </div>

                        <!-- full block -->
                        <div class="form-login__group">
                            <input type="email" class="form-login__input" placeholder="<?php echo $lang['contac_email_adress'] ?>" name="email_sender_address" required>
                            <label for="email_sender_address" class="form-login__label"><?php echo $lang['contac_email_adress'] ?></label>
                        </div>
                        <div class="form-login__group">
                            <input type="text" class="form-login__input" placeholder="<?php echo $lang['contac_subject'] ?>" name="email_subject" required>
                            <label for="email_subject" class="form-login__label"><?php echo $lang['contac_subject'] ?></label>
                        </div>


                        <textarea required style="padding-left: 1rem; padding-top: 1rem;" name="email_concern" class="formtext" placeholder="<?php echo $lang['contac_comment'] ?>"></textarea>
                    </div>
                    <button style="margin-left: 0;" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-4"><?php echo $lang['contac_send']?></button>
                </form>
            </div>
        </section>


    </main>
    <?php include "footer.php"; ?>
    <?php include "popup.php"; ?>
</body>

</html>