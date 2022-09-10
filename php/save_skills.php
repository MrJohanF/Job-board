<?php

include "db.php";


$data = json_decode($_POST['array'], true);
$idCandidato = $_POST['candidato'];

$longitud = count($data);

$consulta = "INSERT INTO `habilidades_candidato` (`idhabilidades_candidato`, `Candidato_idCandidato`, `Habilidades_generales_idHabilidades_generales`, `valor`) VALUES ";
$base = "";
$close = ")";
$solicitud_completa = "";

for ($i = 0; $i < $longitud; $i++) {
  
            
            $base .=  "(NULL, " . "'" . $idCandidato . "', " . "'" . $data[$i]["habilidad"] . "'," . " '" . $data[$i]["valor"] . "'" . (($i == $longitud - 1) ? "" : " ), ");
            $habilidad[] = $data[$i]["habilidad"] ;
  

}
$solicitud_completa = $consulta . $base . $close;


$borrar = "DELETE FROM habilidades_candidato WHERE habilidades_candidato.Candidato_idCandidato = $idCandidato";



$add = $solicitud_completa;



if(count($habilidad) > count(array_unique($habilidad))){
      echo "0x45123";
    }else{
      echo "0x23123";
      $resul_enviar = mysqli_query($connection, $borrar);
      $resul_enviar = mysqli_query($connection, $add);
    }


