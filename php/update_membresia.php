<?php

include "db.php";

$idEmpresa = $_GET["id"];
$membresia = $_GET["membresia"];


$enviar = "UPDATE empresa SET `membresia` = '$membresia' WHERE empresa.idEmpresa = $idEmpresa ";

$resul_enviar = mysqli_query($connection, $enviar);


echo "Estado actualizado"

?>