<?php

include "db.php";

$idOferta = $_POST["idOferta"];
$estado = $_POST["estado"];


$enviar = "UPDATE oferta SET estado_idEstado = '$estado' WHERE oferta.idOferta = $idOferta ";

$resul_enviar = mysqli_query($connection, $enviar);

echo "Oferta actualizada";

?>