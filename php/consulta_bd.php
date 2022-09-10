<?php

include "db.php";

$id_empresa = $_POST['id_empresa'];
$id_candidato = $_POST['id_candidato'];


try {


    $request_verify_membership = "SELECT mem_consultas_basedatos, com_consultas_basedatos FROM `empresa`, `membresia_empresa`, `compila_datos_membresia` WHERE idEmpresa = '{$id_empresa}' and idMembresia = empresa.membresia and idEmpresa_empresa = '{$id_empresa}' ";


    $resul_membership = mysqli_query($connection, $request_verify_membership);

    if (!$resul_membership) {
      //  die("QUERY FAILED" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($resul_membership);

    $db_mem_consultas_basedatos = $row['mem_consultas_basedatos'];
    $db_com_consultas_basedatos = $row['com_consultas_basedatos'];
} catch (Exception $e) {
}


try {

    $db_consulta_view = "0";

    $confirm_consultas_basedatos = "SELECT * FROM `consultas_basedatos` WHERE idCandidato_candidato = '{$id_candidato}' and idEmpresa_empresa = '{$id_empresa}' ";


    $resul_consultas_basedatos = mysqli_query($connection, $confirm_consultas_basedatos);

    if (!$resul_consultas_basedatos) {
      //  die("QUERY FAILED" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($resul_consultas_basedatos);

    if (empty($row)) {
    } else {
        $db_consulta_view = $row['consulta_view'];
    }
} catch (Exception $e) {
}




if ($db_com_consultas_basedatos < $db_mem_consultas_basedatos) {


    if ($db_consulta_view == "0") {

        try {

            $set_compiler = "UPDATE `compila_datos_membresia` SET `com_consultas_basedatos` = `com_consultas_basedatos` + 1 WHERE idEmpresa_empresa = '{$id_empresa}' ";

            $resul_compiler = mysqli_query($connection, $set_compiler);
            if (!$resul_compiler) {
               // die("QUERY FAILED" . mysqli_error($connection));
            }
        } catch (Exception $e) {
        }


        try {

            $set_consultas_basedatos = "INSERT INTO `consultas_basedatos` (`idConsulta`, `idCandidato_candidato`, `idEmpresa_empresa`, `consulta_view`) VALUES (NULL, '{$id_candidato}', '$id_empresa', '1')";

            $resul_consultas_basedatos = mysqli_query($connection, $set_consultas_basedatos);
            if (!$resul_consultas_basedatos) {
               // die("QUERY FAILED" . mysqli_error($connection));
            }
        } catch (Exception $e) {
        }

        echo "2x00022";

    } else {

        echo "2x00021";
    }
}else{
    echo "2x00020";
}
