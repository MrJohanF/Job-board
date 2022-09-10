<?php

include "db.php";
session_start();

$data = json_decode($_POST['array'], true);
$data2 = json_decode($_POST['array2'], true);
$idEmpresa = $_POST['idEmpresa'];
$func_ocultar_nombre = $_POST['func_ocultar_nombre'];
$func_ocultar_whatsapp = $_POST['func_ocultar_whatsapp'];
$func_resaltar = $_POST['func_resaltar'];
$func_urgente = $_POST['func_urgente'];
$titulo_oferta = $_POST['titulo_oferta'];
$descripcion_oferta = $_POST['descripcion_oferta'];
$nivel_experiencia_oferta = $_POST['nivel_experiencia_oferta'];
$numero_vacantes_oferta = $_POST['numero_vacantes_oferta'];
$salario_mensual_oferta = $_POST['salario_mensual_oferta'];
$estudios_minimos_oferta = $_POST['estudios_minimos_oferta'];
$fecha_contratacion_oferta = $_POST['fecha_contratacion_oferta'];
$tipo_trabajo_oferta = $_POST['tipo_trabajo_oferta'];
$jornada_laboral_oferta = $_POST['jornada_laboral_oferta'];
$tipo_contrato_oferta = $_POST['tipo_contrato_oferta'];
$categoria_oferta = $_POST['categoria_oferta'];
$ciudad_oferta = $_POST['ciudad_oferta'];
$fecha_publicacion_oferta = $_POST['fecha_publicacion_oferta'];
$fecha_expiracion_oferta = $_POST['fecha_expiracion_oferta'];
$lenguaje_oferta = $_POST['lenguaje_oferta'];


if (
    $ciudad_oferta == "null"
    or $lenguaje_oferta == ""
    or $titulo_oferta == ""
    or $descripcion_oferta == ""
    or $nivel_experiencia_oferta == ""
    or $numero_vacantes_oferta == ""
    or $salario_mensual_oferta == ""
    or $estudios_minimos_oferta == ""
    or $fecha_contratacion_oferta == ""
    or $tipo_trabajo_oferta == "undefined"
    or $jornada_laboral_oferta == ""
    or $tipo_contrato_oferta == ""
    or $categoria_oferta == ""
    or $fecha_publicacion_oferta == ""
    or $fecha_expiracion_oferta == ""
) {
} else {





    if ($func_ocultar_nombre == 'false') {
        $func_ocultar_nombre = '0';
    }
    if ($func_ocultar_nombre == 'true') {
        $func_ocultar_nombre = '1';
    }
    if ($func_ocultar_whatsapp == 'false') {
        $func_ocultar_whatsapp = '0';
    }
    if ($func_ocultar_whatsapp == 'true') {
        $func_ocultar_whatsapp = '1';
    }
    if ($func_resaltar == 'false') {
        $func_resaltar = '0';
    }
    if ($func_resaltar == 'true') {
        $func_resaltar = '1';
    }
    if ($func_urgente == 'true') {
        $func_urgente = '1';
    }
    if ($func_urgente == 'false') {
        $func_urgente = '0';
    }




    $consulta2 = "";

    $base2 = "INSERT INTO `oferta` (`idOferta`, `titulo_oferta`, `descripcion_oferta`,
        `jornada_laboral`, `salario_mensual`, `estudios_minimos`, `nivel_experiencia`,
        `vacantes_disponibles`, `fecha_contratacion`, `fecha_publicacion`,
        `fecha_expiracion`, `estado_idEstado`, `Empresa_idEmpresa`, `Categoria_idCategoria`,
        `Lenguaje_idLenguaje`, `tipo_idContrato`, `ciudad_idCiudad`, `tipo_idTipo_trabajo`,
        `func_oculto_nombre`, `func_oculto_whatsapp`, `func_resaltar`, `func_urgente`) VALUES (NULL, '{$titulo_oferta}', 
        '{$descripcion_oferta}', '{$jornada_laboral_oferta}', '{$salario_mensual_oferta}', 
        '{$estudios_minimos_oferta}', '{$nivel_experiencia_oferta}', 
        '{$numero_vacantes_oferta}', '{$fecha_contratacion_oferta}',
        '{$fecha_publicacion_oferta}', '{$fecha_expiracion_oferta}', 
        '1', '{$idEmpresa}', '{$categoria_oferta}', '{$lenguaje_oferta}', '{$tipo_contrato_oferta}', 
        '{$ciudad_oferta}', '{$tipo_trabajo_oferta}', '{$func_ocultar_nombre}', '{$func_ocultar_whatsapp}', '{$func_resaltar}', '{$func_urgente}'";

    $active_city = "UPDATE `ciudad` SET active_ciudad = 1 WHERE idCiudad = $ciudad_oferta";


    $close2 = ")";
    $solicitud_completa2 = "";

    $solicitud_completa2 = $consulta2 . $base2 . $close2;

    //--------------------------------------------------------------- PREGUNTA

    $longitud1 = count($data2);

    $consulta1 = "INSERT INTO `pregunta` (`idPregunta`, `oferta_idOferta`, `pregunta`) VALUES ";
    $base1 = "";
    $close1 = ")";
    $solicitud_completa1 = "";


    //--------------------------------------------------------------- HABILIDAD

    $longitud = count($data);

    $consulta = "INSERT INTO `habilidades_requerida_oferta` (`idhabilidades_requerida_oferta`, `Oferta_idOferta`, `Habilidades_generales_idHabilidades_generales`, `valor`) VALUES ";
    $base = "";
    $close = ")";
    $solicitud_completa = "";


    for ($i = 0; $i < $longitud; $i++) {
        $habilidad[] = $data[$i]["habilidad"];
    }




    if (count($habilidad) > count(array_unique($habilidad))) {

        echo "4x00053";

    } else {


        //--------------------------------------------------------------- consulta membresia


        $current_user_membresia = $_SESSION['e_membresia_empresa'];

        $consulta_membresia = "SELECT * FROM `membresia_empresa` WHERE idMembresia = $current_user_membresia";
        $resultado_membresia = mysqli_query($connection, $consulta_membresia);

        $row_membresia = mysqli_fetch_array($resultado_membresia);

        $idMembresia = $row_membresia['idMembresia'];
        $mem_nombre = $row_membresia['mem_nombre'];
        $mem_ofertas_limite = $row_membresia['mem_ofertas_limite'];
        $mem_ofertas_confidenciales = $row_membresia['mem_ofertas_confidenciales'];
        $mem_ofertas_urgentes = $row_membresia['mem_ofertas_urgentes'];


        //--------------------------------------------------------------- insertar recopilador de insersion de ofertas

        $verificar_compilacion_consulta = "SELECT * FROM `compila_datos_membresia` WHERE `compila_datos_membresia`.idEmpresa_empresa = $idEmpresa";
        $resul_enviar = mysqli_query($connection, $verificar_compilacion_consulta);

        $row_compile = mysqli_fetch_array($resul_enviar);

        $idCompilador = $row_compile['idCompilador'];
        $com_ofertas_publicadas = $row_compile['com_ofertas_publicadas'];
        $com_ofertas_confidenciales = $row_compile['com_ofertas_confidenciales'];
        $com_ofertas_urgentes = $row_compile['com_ofertas_urgentes'];
        $com_consultas_basedatos = $row_compile['com_consultas_basedatos'];


        if ($com_ofertas_publicadas < $mem_ofertas_limite) {

            //Insertar oferta
            $resul_oferta = mysqli_query($connection, $solicitud_completa2);

            $idOferta = mysqli_insert_id($connection);

            mysqli_query($connection, $active_city);

            //--------------------------------------------------------------- PREGUNTA

            for ($i = 0; $i < $longitud1; $i++) {

                $base1 .=  "(NULL, " . "'" . $idOferta . "', " . "'" . $data2[$i]["pregunta"] . "'" . (($i == $longitud1 - 1) ? "" : " ), ");
            }

            $solicitud_completa1 = $consulta1 . $base1 . $close1;


            $resul_pregunta = mysqli_query($connection, $solicitud_completa1);

            //--------------------------------------------------------------- HABILIDAD
            for ($i = 0; $i < $longitud; $i++) {

                $base .=  "(NULL, " . "'" . $idOferta . "', " . "'" . $data[$i]["habilidad"] . "'," . " '" . $data[$i]["valor"] . "'" . (($i == $longitud - 1) ? "" : " ), ");
            }

            //Insertar habilidades
            $solicitud_completa = $consulta . $base . $close;




            $resul_habilidad = mysqli_query($connection, $solicitud_completa);


            if ($func_urgente == 1) {
                $compilador_datos =  "UPDATE `compila_datos_membresia` SET com_ofertas_publicadas = com_ofertas_publicadas + 1, com_ofertas_urgentes = com_ofertas_urgentes + 1 WHERE `compila_datos_membresia`.`idEmpresa_empresa` = {$idEmpresa}";
            }

            if ($func_urgente == 0) {
                $compilador_datos =  "UPDATE `compila_datos_membresia` SET com_ofertas_publicadas = com_ofertas_publicadas + 1 WHERE `compila_datos_membresia`.`idEmpresa_empresa` = {$idEmpresa}";
            }


            if ($func_resaltar == 1) {
                $compilador_datos =  "UPDATE `compila_datos_membresia` SET com_ofertas_publicadas = com_ofertas_publicadas + 1, com_ofertas_confidenciales = com_ofertas_confidenciales + 1 WHERE `compila_datos_membresia`.`idEmpresa_empresa` = {$idEmpresa}";
            }

            if ($func_resaltar == 0) {
                $compilador_datos =  "UPDATE `compila_datos_membresia` SET com_ofertas_publicadas = com_ofertas_publicadas + 1 WHERE `compila_datos_membresia`.`idEmpresa_empresa` = {$idEmpresa}";
            }




            $resul_habilidad = mysqli_query($connection, $compilador_datos);

            echo "1x00000";
        } else {

          echo "4x00054";
        }
    }
}
