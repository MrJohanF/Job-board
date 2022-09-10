<?php

include "db.php";

$idOferta = $_POST['idOferta'];
$status = $_POST['status'];
$idCandidato = $_POST['idCandidato'];

$enviar = "UPDATE postulaciones SET estado_postulacion = $status WHERE Oferta_idOferta  = $idOferta AND Candidato_idCandidato = $idCandidato";

$resul_enviar = mysqli_query($connection, $enviar);

?>