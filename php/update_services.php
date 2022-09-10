<?php

include "db.php";

echo $obtenido5 = $_GET['var'];

echo $obtenido6 = $_GET['var2'];


$enviar = "UPDATE empresa SET servicios = $obtenido6 WHERE `empresa`.`idEmpresa` = $obtenido5";

$resul_enviar = mysqli_query($connection, $enviar);


?>