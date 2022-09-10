<?php

include "db.php";

$idOferta = $_POST['idOferta'];
$date_expira = $_POST['date_expira'];

$date = date($date_expira);


$mod_date = strtotime($date."+ 60 days");

$date_updated = date("Y-m-d h:i:s",$mod_date);

$enviar = "UPDATE `oferta` SET `fecha_expiracion` = '$date_updated' WHERE `oferta`.`idOferta` = $idOferta ";

$resul_enviar = mysqli_query($connection, $enviar);
    
echo "Nueva fecha de expiracion : ".$date_updated;


