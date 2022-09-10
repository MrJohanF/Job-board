<?php

include "db.php";

if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable

    $search = "SELECT email, hash, aprobado FROM candidato WHERE email='" . $email . "' AND hash='" . $hash . "' AND aprobado='0'";
    $register_user_query = mysqli_query($connection, $search);
    $match  = mysqli_num_rows($register_user_query);

    if ($match > 0) {
        // We have a match, activate the account
        $update = "UPDATE candidato SET aprobado='1' WHERE email='" . $email . "' AND hash='" . $hash . "' AND aprobado='0'";
        $update_status = mysqli_query($connection, $update);
        //echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
        header("Location: ../activacion_correo.php");
    } else {
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
}


if (isset($_GET['email_company']) && !empty($_GET['email_company']) and isset($_GET['hash_company']) && !empty($_GET['hash_company'])) {
    // Verify data
    $email = $_GET['email_company']; // Set email variable
    $hash = $_GET['hash_company']; // Set hash variable

    $search = "SELECT email_empresa, hash, active FROM empresa WHERE email_empresa='" . $email . "' AND hash='" . $hash . "' AND active='0'";
    $register_user_query = mysqli_query($connection, $search);
    $match  = mysqli_num_rows($register_user_query);

    if ($match > 0) {
        // We have a match, activate the account
        $update = "UPDATE empresa SET active='1' WHERE email_empresa='" . $email . "' AND hash='" . $hash . "' AND active='0'";
        $update_status = mysqli_query($connection, $update);
        //echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
        header("Location: ../activacion_correo.php");
    } else {
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
}
