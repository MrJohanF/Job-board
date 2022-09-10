<?php

include "db.php";

if(isset($_POST['newsletter_correo'])){


$newsletter_correo = $_POST['newsletter_correo'];

$consulta = "INSERT INTO `newsletter` (`id`, `email`) VALUES (NULL, '$newsletter_correo')";

$resul_enviar = mysqli_query($connection, $consulta);


header("Location: ../index.php#newsletter_register");

}


?>