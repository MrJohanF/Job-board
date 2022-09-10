<?php

include "db.php";

$idOferta = $_POST['idOferta'];
$idEmpresa = $_POST['idEmpresa'];
$func_ocultar_nombre = $_POST['func_ocultar_nombre'];
$func_ocultar_whatsapp = $_POST['func_ocultar_whatsapp'];
$func_resaltar = $_POST['func_resaltar'];
$func_urgente = $_POST['func_urgente'];
$tipo_trabajo_oferta = $_POST['tipo_trabajo_oferta'];
$titulo_oferta_edit = $_POST['titulo_oferta_edit'];
$descripcion_oferta_edit = $_POST['descripcion_oferta_edit'];
$nivel_experiencia_oferta_edit = $_POST['nivel_experiencia_oferta_edit'];
$numero_vacantes_oferta_edit = $_POST['numero_vacantes_oferta_edit'];
$salario_mensual_oferta_edit = $_POST['salario_mensual_oferta_edit'];
$estudios_minimos_oferta_edit = $_POST['estudios_minimos_oferta_edit'];
$fecha_contratacion_oferta_edit = $_POST['fecha_contratacion_oferta_edit'];
$jornada_laboral_oferta_edit = $_POST['jornada_laboral_oferta_edit'];

if ($func_ocultar_nombre == "true") {
    $func_ocultar_nombre = 1;
};
if ($func_ocultar_nombre == "false") {
    $func_ocultar_nombre = 0;
};

if ($func_ocultar_whatsapp == "true") {
    $func_ocultar_whatsapp = 1;
};
if ($func_ocultar_whatsapp == "false") {
    $func_ocultar_whatsapp = 0;
};
if ($func_resaltar == "true") {

    $compilador_datos =  "UPDATE `compila_datos_membresia` SET com_ofertas_confidenciales = com_ofertas_confidenciales + 1 WHERE `compila_datos_membresia`.`idEmpresa_empresa` = {$idEmpresa}";
    $resul_compilar = mysqli_query($connection, $compilador_datos);
    $func_resaltar = 1;
};
if ($func_resaltar == "false") {

    $func_resaltar = 0;
};
if ($func_urgente == "true") {
    $compilador_datos =  "UPDATE `compila_datos_membresia` SET com_ofertas_urgentes = com_ofertas_urgentes + 1 WHERE `compila_datos_membresia`.`idEmpresa_empresa` = {$idEmpresa}";
    $resul_compilar = mysqli_query($connection, $compilador_datos);
    $func_urgente = 1;
};
if ($func_urgente == "false") {
    $func_urgente = 0;
};



$update = "UPDATE `oferta` 
SET `titulo_oferta` = '$titulo_oferta_edit',
 `descripcion_oferta` = '$descripcion_oferta_edit',
  `jornada_laboral` = '$jornada_laboral_oferta_edit',
   `salario_mensual` = '$salario_mensual_oferta_edit',
    `estudios_minimos` = '$estudios_minimos_oferta_edit',
     `nivel_experiencia` = '$nivel_experiencia_oferta_edit',
      `vacantes_disponibles` = '$numero_vacantes_oferta_edit',
       `fecha_contratacion` = '$fecha_contratacion_oferta_edit',
        `func_oculto_nombre` = '$func_ocultar_nombre',
         `func_oculto_whatsapp` = '$func_ocultar_whatsapp',
          `func_resaltar` = '$func_resaltar',
           `func_urgente` = '$func_urgente' WHERE `oferta`.`idOferta` = '$idOferta' ";


$resul_enviar = mysqli_query($connection, $update);



echo "Actualizacion exitosa";
