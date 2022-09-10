<?php
include "db.php";

$data = json_decode($_POST['array'], true);
$idCandidato = $_POST['candidato'];

$longitud = count($data);

$consulta = "INSERT INTO `presentaciones` (`idPresentacion`, `idCandidato_candidato`, `url`) VALUES ";
$base = "";
$close = ")";
$solicitud_completa = "";

for ($i = 0; $i < $longitud; $i++) {
    //    var_dump($data[$i]);
    $base .=  "(NULL, " . "'" . $idCandidato . "', " . "'" . $data[$i]["video"] . "'" . (($i == $longitud - 1) ? "" : " ), ");
}


$solicitud_completa = $consulta . $base . $close;


$borrar = "DELETE FROM presentaciones WHERE idCandidato_candidato  = $idCandidato";
$resul_enviar = mysqli_query($connection, $borrar);


$add = $solicitud_completa;
$resul_enviar = mysqli_query($connection, $add);

echo "Edicion Exitosa";