<?php

include "db.php";

$data2 = json_decode($_POST['array'], true);
$idOferta = $_POST['idOferta'];


$longitud1 = count($data2);

$consulta1 = "INSERT INTO `pregunta` (`idPregunta`, `oferta_idOferta`, `pregunta`) VALUES ";
$base1 = "";
$close1 = ")";
$solicitud_completa1 = "";



for ($i = 0; $i < $longitud1; $i++) {

    $base1 .=  "(NULL, " . "'" . $idOferta . "', " . "'" . $data2[$i]["pregunta"] . "'" . (($i == $longitud1 - 1) ? "" : " ), ");
}

$borrar = "DELETE FROM pregunta WHERE oferta_idOferta = $idOferta";
$resul_enviar = mysqli_query($connection, $borrar);


$solicitud_completa1 = $consulta1 . $base1 . $close1;

$resul_pregunta = mysqli_query($connection, $solicitud_completa1);

echo "Cambios guardados";