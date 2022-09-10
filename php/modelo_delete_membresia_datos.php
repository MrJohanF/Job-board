<?php

include "db.php";

$db_idMembresia = $_POST['db_idMembresia'];


$enviar = "DELETE FROM `membresia_empresa` WHERE `membresia_empresa`.`idMembresia` = $db_idMembresia";


$resul_enviar = mysqli_query($connection, $enviar);


if($resul_enviar == TRUE){
    echo "Membresia Borrada";
}


?>