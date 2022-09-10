<?php

include "db.php";

$idEntrevista = $_POST['id_entrevista'];

$borrar = "DELETE FROM `entrevista` WHERE `entrevista`.`idEntrevista` = {$idEntrevista}";

$resul_borrar = mysqli_query($connection, $borrar);


?>