<?php

include "db.php";


$idEntrevista = $_POST['idEntrevista'];
$data2 = json_decode($_POST['array'], true);

if (is_numeric($idEntrevista)) {

    $longitud1 = count($data2);

    $consulta1 = "INSERT INTO `entrevista_pregunta` (`idPregunta`, `entrevista_idEntrevista`, `pregunta`) VALUES ";
    $base1 = "";
    $close1 = ")";
    $solicitud_completa1 = "";



    for ($i = 0; $i < $longitud1; $i++) {

        $base1 .=  "(NULL, " . "'" . $idEntrevista . "', " . "'" . $data2[$i]["pregunta"] . "'" . (($i == $longitud1 - 1) ? "" : " ), ");
    }

    $borrar = "DELETE FROM entrevista_pregunta WHERE entrevista_idEntrevista = $idEntrevista";
    $resul_enviar = mysqli_query($connection, $borrar);


    echo $solicitud_completa1 = $consulta1 . $base1 . $close1;

    $resul_pregunta = mysqli_query($connection, $solicitud_completa1);

    echo "Cambios guardados";

} else {



    $idEmpresa = $_POST['idEmpresa'];

    $request_entrevista = "INSERT INTO `entrevista` (`idEntrevista`, `entrevista_nombre`, `empresa_idEmpresa`) VALUES (NULL, '{$idEntrevista}', '{$idEmpresa}') ";
    $resul_entrevista = mysqli_query($connection, $request_entrevista);
    $idEntrevista = mysqli_insert_id($connection);


    $longitud1 = count($data2);

    if ($longitud1 >= 1) {
        $consulta1 = "INSERT INTO `entrevista_pregunta` (`idPregunta`, `entrevista_idEntrevista`, `pregunta`) VALUES ";
        $base1 = "";
        $close1 = ")";
        $solicitud_completa1 = "";



        for ($i = 0; $i < $longitud1; $i++) {

            $base1 .=  "(NULL, " . "'" . $idEntrevista . "', " . "'" . $data2[$i]["pregunta"] . "'" . (($i == $longitud1 - 1) ? "" : " ), ");
        }



        $solicitud_completa1 = $consulta1 . $base1 . $close1;

        $resul_pregunta = mysqli_query($connection, $solicitud_completa1);

        echo "Cambios guardados";

    

    } else {
        
    }
}
