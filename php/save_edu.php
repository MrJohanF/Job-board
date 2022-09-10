<?php

include "db.php";



$data = json_decode($_POST['array'], true);
$idCandidato = $_POST['idCandidato'];
$contador = $_POST['contador'];


$longitud = count($data);

$consulta = "INSERT INTO `certificados_candidato_educacion` (`Candidato_idCandidato`, `titulo_obtenido`, `nombre_institucion`, `titulo`, `encurso_estudiando`, `fecha_finalizacion`) VALUES ";
$base = "";
$close = ")";
$solicitud_completa = "";
$contador_foto = 1;


for ($i = 0; $i < $longitud; $i++) {

     $base .=  "(" . "'" . $idCandidato . "', " .  "'" . $data[$i]["titulo_obtenido"] . "'," . "'" . $data[$i]["nombre_institucion"] . "'," . " '" . $data[$i]["titulo"] . "'," . " '" . $data[$i]["fecha_finalizacion"] . "'," . " '" . $data[$i]["encurso_estudiando"] . "'" . (($i == $longitud - 1) ? "" : " ), ");

}

$solicitud_completa = $consulta . $base . $close;

$borrar = "DELETE FROM certificados_candidato_educacion WHERE Candidato_idCandidato = $idCandidato";
$resul_enviar = mysqli_query($connection, $borrar);


$add = $solicitud_completa;
$resul_enviar = mysqli_query($connection, $add);

echo "Educacion actualizada";
