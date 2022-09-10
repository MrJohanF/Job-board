<?php

include "db.php";


$data = json_decode($_POST['array'], true);
$idOferta = $_POST['oferta'];

$longitud = count($data);

$consulta = "INSERT INTO `habilidades_requerida_oferta` (`idhabilidades_requerida_oferta`, `Oferta_idOferta`, `Habilidades_generales_idHabilidades_generales`, `valor`) VALUES ";
$base = "";
$close = ")";
$solicitud_completa = "";

for ($i = 0; $i < $longitud; $i++) {
 //    var_dump($data[$i]);
      $base .=  "(NULL, "."'". $idOferta."', " . "'" . $data[$i]["habilidad"]. "',"." '" . $data[$i]["valor"]. "'" . (($i == $longitud - 1) ? "" : " ), ");
      
}
$solicitud_completa = $consulta.$base.$close;


$borrar = "DELETE FROM habilidades_requerida_oferta WHERE Oferta_idOferta = $idOferta";
$resul_enviar = mysqli_query($connection, $borrar);


$add = $solicitud_completa;
$resul_enviar = mysqli_query($connection, $add);

echo "Edicion Exitosa";


