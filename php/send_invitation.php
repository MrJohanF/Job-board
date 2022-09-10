<?php

include "db.php";

if($_POST['idoffer'] && $_POST['idcandidate'] && $_POST['idcompany']){

$idoffer = $_POST['idoffer'];
$idcandidate = $_POST['idcandidate'];
$idcompany = $_POST['idcompany'];


$consulta = "INSERT INTO `seleccion_invitaciones` (`idSeleccion_invitaciones`, `candidato_idCandidato`, `empresa_idEmpresa`, `oferta_idOferta`) VALUES (NULL, '$idcandidate', '$idcompany', '$idoffer')";

$resul_enviar = mysqli_query($connection, $consulta);

echo "Invitacion enviada";


}