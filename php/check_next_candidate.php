<?php

include "db.php";

$idCandidate = $_GET['candidate'];


try {


    $request_profile = "SELECT * FROM candidato WHERE aprobado = 1 AND idCandidato = (SELECT MIN(idCandidato)FROM candidato WHERE idCandidato > $idCandidate );";


    $resul_profile = mysqli_query($connection, $request_profile);
    if (!$resul_profile) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($resul_profile);

    $db_id = $row['idCandidato'];

    echo $db_id;

} catch (Exception $e) {

}


?>