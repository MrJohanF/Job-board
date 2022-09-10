<?php

include "db.php";

$obtenido = $_GET['var'];

$obtenido1 = $_GET['var2'];


$enviar = "UPDATE candidato SET verificado_candidato = $obtenido1 WHERE candidato.idCandidato = $obtenido";

$resul_enviar = mysqli_query($connection, $enviar);

echo "Actualizado";
?>