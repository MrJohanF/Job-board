<?php

include "db.php";

$comment = $_POST['comment'];
$idCandidato = $_POST['idCandidato'];
$idEmpresa = $_POST['idEmpresa'];


$delete = "DELETE FROM notas_candidato WHERE Candidato_idCandidato = $idCandidato";

$resul_delete = mysqli_query($connection, $delete);



echo $enviar = "INSERT INTO `notas_candidato` (`idNotas_candidato`, `nota_observacion`, `Candidato_idCandidato`, `Postulaciones_idPostulaciones`, `Empresa_idEmpresa`) VALUES (NULL, '{$comment}', '{$idCandidato}', NULL, '{$idEmpresa}') ";

$resul_enviar = mysqli_query($connection, $enviar);



?>