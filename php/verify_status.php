<?php

include "db.php";

$obtenido = $_GET['var'];

$obtenido1 = $_GET['var2'];


$enviar = "UPDATE empresa SET verificado_empresa = $obtenido1 WHERE empresa.idEmpresa = $obtenido";

$resul_enviar = mysqli_query($connection, $enviar);

echo "Actualizado";
?>