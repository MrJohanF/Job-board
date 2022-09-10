<?php
include "db.php";

$idCandidato = $_POST['idCandidato'];

$data2 = json_decode($_POST['array2'], true);
$token = $_POST['hash']; 
$idInterview = $_POST['idInterview'];
$idInvitacion = $_POST['idInvitacion'];


$longitud1 = count($data2);

$consulta1 = "INSERT INTO `entrevista_respuesta` (`idRespuesta`, `entrevista_invitacion`, `candidato_idCandidato`, `pregunta_idPregunta`, `respuesta`) VALUES ";
$base1 = "";
$close1 = ")";
$solicitud_completa1 = "";

for ($i = 0; $i < $longitud1; $i++) {

    $base1 .=  "(NULL, ". "'" . $idInvitacion . "'," . " " . "'" . $idCandidato . "', " . "'" . $data2[$i]["idPregunta"] . "'," . "'" . $data2[$i]["respuesta"] . "'" . (($i == $longitud1 - 1) ? "" : " ), ");
}

echo $solicitud_completa1 = $consulta1 . $base1 . $close1;

$resul_pregunta = mysqli_query($connection, $solicitud_completa1);


$solicitud_expiracion = "UPDATE `entrevista_candidato` SET `estado` = '1' WHERE `entrevista_candidato`.`hash` = '{$token}' ";
$resul_pregunta = mysqli_query($connection, $solicitud_expiracion);


//Avance de proceso, preseleccionado, en proceso, seleccionado.  Descartado.
?>

