<?php

include "db.php";

$db_idCandidato = $_POST['idCandidato'];
$db_nombre = $_POST['nombre'];
$db_apellido = $_POST['apellido'];
$db_numero_cedula = $_POST['numero_cedula'];
$db_fecha_nacimiento = $_POST['fecha_nacimiento'];
$db_telefono = $_POST['telefono'];
$db_email = $_POST['email'];
$db_genero = $_POST['genero'];
$db_direccion = $_POST['direccion'];
$db_numero_whatsapp = $_POST['numero_whatsapp'];
$db_cargo_deseado = $_POST['cargo_deseado'];
$db_descripcion = $_POST['descripcion'];


$enviar = "UPDATE `candidato` SET 
`nombre` = '$db_nombre',
 `apellido` = '$db_apellido',
  `numero_cedula` = '$db_numero_cedula',
   `fecha_nacimiento` = '$db_fecha_nacimiento',
    `telefono` = '$db_telefono',
     `email` = '$db_email',
      `genero` = '$db_genero',
       `direccion` = '$db_direccion',
        `numero_whatsapp` = '$db_numero_whatsapp',
         `cargo_deseado` = '$db_cargo_deseado',
          `descripcion` = '$db_descripcion'
           WHERE `candidato`.`idCandidato` = $db_idCandidato";
$resul_enviar = mysqli_query($connection, $enviar);


if($resul_enviar == TRUE){
    echo "Edicion Exitosa";
}


?>