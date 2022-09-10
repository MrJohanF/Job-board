<?php

include "db.php";

$db_idEmpresa = $_POST['idEmpresa'];
$db_nombre_empresa = $_POST['nombre_empresa'];
$db_nit_empresa = $_POST['nit_empresa'];
$db_telefono_empresa = $_POST['telefono_empresa'];
$db_ciudad_empresa = $_POST['ciudad_empresa'];
$db_direccion_empresa = $_POST['direccion_empresa'];
$db_nombre_contacto_empresa = $_POST['nombre_contacto_empresa'];
$db_email_empresa = $_POST['email_empresa'];
$db_numero_empleados = $_POST['numero_empleados'];
$db_descripcion_empresa = $_POST['descripcion_empresa'];
$db_beneficios_empresa = $_POST['beneficios_empresa'];
$db_membresia = $_POST['membresia'];


$enviar = "UPDATE `empresa` SET 
`nombre_empresa` =  '$db_nombre_empresa',
 `nit_empresa` = '$db_nit_empresa',
  `ciudad_empresa` = '$db_ciudad_empresa',
   `direccion_empresa` = '$db_direccion_empresa',
    `telefono_empresa` = '$db_telefono_empresa',
     `nombre_contacto_empresa` = '$db_nombre_contacto_empresa',
      `email_empresa` = '$db_email_empresa',
       `descripcion_empresa` = '$db_descripcion_empresa',
        `beneficios_empresa` = '$db_beneficios_empresa',
         `numero_empleados` = '$db_numero_empleados' WHERE `empresa`.`idEmpresa` = $db_idEmpresa";
$resul_enviar = mysqli_query($connection, $enviar);


if($resul_enviar == TRUE){
    echo "Edicion Exitosa";
}


?>