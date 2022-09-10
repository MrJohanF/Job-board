<?php

include "db.php";

echo $obtenido5 = $_GET['var5'];

echo $obtenido6 = $_GET['var6'];


$enviar = "UPDATE candidato SET aprobado = $obtenido6 WHERE `candidato`.`idCandidato` = $obtenido5";

$resul_enviar = mysqli_query($connection, $enviar);


?>