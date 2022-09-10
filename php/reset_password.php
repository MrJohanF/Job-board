<?php

include "db.php";


if (isset($_POST['email']) && !empty($_POST['email']) and isset($_POST['password']) && !empty($_POST['password']) and isset($_POST['token']) && !empty($_POST['token'])) {
    // Verify data
    $email = $_POST['email']; // Set email variable
    $password = $_POST['password']; // Set email variable
    $token = $_POST['token']; // Set hash variable

    $search = "SELECT email, token, randSalt FROM candidato WHERE email='" . $email . "' AND token='" . $token . "'";
    $register_user_query = mysqli_query($connection, $search);
    $row = mysqli_fetch_array($register_user_query);
    $match  = mysqli_num_rows($register_user_query);

    if ($match > 0) {


        $salt = $row['randSalt'];
        $password = crypt($password, $salt);

        // We have a match, activate the account
        $update = "UPDATE candidato SET token='', password='{$password}'  WHERE email='" . $email . "' AND token='" . $token . "'";
        $update_status = mysqli_query($connection, $update);
        echo "Contraseña actualizada";

    }
} else {
    echo "Porfavor ingrese con el link enviado a su dirrecion de correo";
}
