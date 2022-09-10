<?php

include "db.php";

$db_idMembresia = $_POST['db_idMembresia'];
$db_mem_nombre = $_POST['db_mem_nombre'];
$db_mem_ofertas_limite = $_POST['db_mem_ofertas_limite'];
$db_mem_ofertas_confidenciales = $_POST['db_mem_ofertas_confidenciales'];
$db_mem_ofertas_urgentes = $_POST['db_mem_ofertas_urgentes'];
$db_mem_consultas_basedatos = $_POST['db_mem_consultas_basedatos'];



$enviar = "INSERT INTO `membresia_empresa` (`idMembresia`, `mem_nombre`, `mem_ofertas_limite`, `mem_ofertas_confidenciales`, `mem_ofertas_urgentes`, `mem_consultas_basedatos`) 
VALUES (NULL, '{$db_mem_nombre}', '{$db_mem_ofertas_limite}', '{$db_mem_ofertas_confidenciales}', '{$db_mem_ofertas_urgentes}', '{$db_mem_consultas_basedatos}')";


$resul_enviar = mysqli_query($connection, $enviar);


if($resul_enviar == TRUE){
    echo "Edicion Exitosa";
}


?>