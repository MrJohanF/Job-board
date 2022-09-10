<?php
include "db.php";

$data = json_decode($_POST['array'], true);
$idEmpresa = $_POST['empresa'];

$longitud = count($data);

$consulta = "INSERT INTO `presentaciones_empresa` (`idPresentacion`, `idEmpresa_empresa`, `url`) VALUES ";
$base = "";
$close = ")";
$solicitud_completa = "";

for ($i = 0; $i < $longitud; $i++) {
    //    var_dump($data[$i]);
    $base .=  "(NULL, " . "'" . $idEmpresa . "', " . "'" . $data[$i]["video"] . "'" . (($i == $longitud - 1) ? "" : " ), ");
}


$solicitud_completa = $consulta . $base . $close;


$borrar = "DELETE FROM presentaciones_empresa WHERE idEmpresa_empresa = $idEmpresa";
$resul_enviar = mysqli_query($connection, $borrar);


$add = $solicitud_completa;
$resul_enviar = mysqli_query($connection, $add);

echo "Edicion Exitosa";