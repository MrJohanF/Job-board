<?php
include "db.php";

$idCandidato = $_POST['idCandidato'];
$idOferta = $_POST['idOferta'];
$fecha = $_POST['fecha'];
$data2 = json_decode($_POST['array2'], true);



$enviar = "INSERT INTO `postulaciones` (`idPostulaciones`,
 `fecha_postulacion`,
  `estado_postulacion`,
   `Candidato_idCandidato`,
    `Oferta_idOferta`) VALUES 
    (NULL, '$fecha', '1', '$idCandidato', '$idOferta') ";

$resul_enviar = mysqli_query($connection, $enviar);
$idPostulacion = mysqli_insert_id($connection);


$longitud1 = count($data2);

$consulta1 = "INSERT INTO `respuesta_pregunta` (`idRespuesta`, `Postulaciones_idPostulaciones`, `Pregunta_idPregunta`, `respuesta`) VALUES ";
$base1 = "";
$close1 = ")";
$solicitud_completa1 = "";

for ($i = 0; $i < $longitud1; $i++) {

    $base1 .=  "(NULL, " . "'" . $idPostulacion . "', " . "'" . $data2[$i]["idPregunta"] . "'," . "'" . $data2[$i]["respuesta"] . "'" . (($i == $longitud1 - 1) ? "" : " ), ");
}

$solicitud_completa1 = $consulta1 . $base1 . $close1;

$resul_pregunta = mysqli_query($connection, $solicitud_completa1);


//Avance de proceso, preseleccionado, en proceso, seleccionado.  Descartado.
?>


<h1 style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 1.8rem; margin-top: 3rem;">Felicidades</h1>
<h2 style="font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 1.6rem; width: 90%; margin-top: 1rem;">Has aplicado a la oferta correctamente, revisa tu dashboard constatemente en donde podras encontrar el estado de tu proceso,</h2>