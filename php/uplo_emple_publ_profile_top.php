<?php

include "db.php";

$data = json_decode($_POST['array'], true);
$empresa_id = $_POST['idEmpresa'];
$contador = 0;
$array_success = array();
/* echo ('<pre>');t
print_r($data);
echo ('</pre>'); */

//$sql_request_clean = "DELETE FROM `design_company_profile` WHERE `design_company_profile`.`idEmpresa_empresa` = $empresa_id";
//$resul_sql_request_deleted = mysqli_query($connection, $sql_request_clean);


for ($c = 1; $c <= count($data); $c++) {

    for ($d = 1; $d <= count($data[$c]); $d++) {

        if ($data[$c][$d]["tipo_contenido"] == "txt") {


            if (validadorContenido($empresa_id, "txt", 'middle', $data[$c][$d]["grupo"]) == false) {
                $tipo_contenido_loop = $data[$c][$d]["tipo_contenido"];
                $posicion_loop = $data[$c][$d]["posicion"];
                $grupo_loop = $data[$c][$d]["grupo"];
                $orden_loop = $data[$c][$d]["orden"];
                $contenido_dato_loop = $data[$c][$d]["contenido_dato"];

                insertText($empresa_id, $tipo_contenido_loop, $posicion_loop, $grupo_loop, $orden_loop, $contenido_dato_loop);
            } else {
                $tipo_contenido_loop = $data[$c][$d]["tipo_contenido"];
                $posicion_loop = $data[$c][$d]["posicion"];
                $grupo_loop = $data[$c][$d]["grupo"];
                $orden_loop = $data[$c][$d]["orden"];
                $contenido_dato_loop = $data[$c][$d]["contenido_dato"];
                updateText($empresa_id, $tipo_contenido_loop, $posicion_loop, $grupo_loop, $orden_loop, $contenido_dato_loop);

            }
        }
    }
}




if (empty($_FILES['img_top']['name'])) {
    if (validadorContenido($empresa_id, 'img', 'top', '') === false) {

        $sql_request = "INSERT INTO `design_company_profile` (`idProfileDesing`, `idEmpresa_empresa`, `tipo_contenido`, `posicion`, `orden`, `contenido_dato`) VALUES (NULL, '{$empresa_id}', 'img', 'top', '', '')";
        $resul_sql_request = mysqli_query($connection, $sql_request);
    }
} else {

    $file = $_FILES['img_top'];
    $fileName = $_FILES['img_top']['name'];
    $fileTmpName = $_FILES['img_top']['tmp_name'];
    $fileSize = $_FILES['img_top']['size'];
    $fileError = $_FILES['img_top']['error'];
    $fileType = $_FILES['img_top']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {

            unlink('../img/profiles/banner-top/profile' . $empresa_id  . ".jpg"); 
            unlink('../img/profiles/banner-top/profile' . $empresa_id  . ".jpeg"); 
            unlink('../img/profiles/banner-top/profile' . $empresa_id  . ".png"); 

            $fileNameNew = "profile" . $empresa_id . "." . $fileActualExt;
            $fileDestination = '../img/profiles/banner-top/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            if (validadorContenido($empresa_id, 'img', 'top', '') === false) {
                $sql_request = "INSERT INTO `design_company_profile` (`idProfileDesing`, `idEmpresa_empresa`, `tipo_contenido`, `posicion`, `orden`, `contenido_dato`) VALUES (NULL, '{$empresa_id}', 'img', 'top', '', '{$fileDestination}')";
                $resul_sql_request = mysqli_query($connection, $sql_request);
            } else {

                $sql_request = "UPDATE `design_company_profile` SET tipo_contenido = 'img', posicion='top', grupo='', contenido_dato='${fileDestination}' WHERE idEmpresa_empresa='${empresa_id}' AND tipo_contenido='img' AND posicion='top' AND grupo=''";

                mysqli_query($connection, $sql_request);
            }
            $array_success[] = 'top';
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}

if (empty($_FILES['img_footer']['name'])) {
    if (validadorContenido($empresa_id, 'img', 'footer', '') === false) {
        $sql_request = "INSERT INTO `design_company_profile` (`idProfileDesing`, `idEmpresa_empresa`, `tipo_contenido`, `posicion`, `orden`, `contenido_dato`) VALUES (NULL, '{$empresa_id}', 'img', 'footer', '', '')";
        $resul_sql_request = mysqli_query($connection, $sql_request);
    }
} else {

    $file = $_FILES['img_footer'];
    $fileName = $_FILES['img_footer']['name'];
    $fileTmpName = $_FILES['img_footer']['tmp_name'];
    $fileSize = $_FILES['img_footer']['size'];
    $fileError = $_FILES['img_footer']['error'];
    $fileType = $_FILES['img_footer']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            
            unlink('../img/profiles/banner-footer/profile' . $empresa_id  . ".jpg"); 
            unlink('../img/profiles/banner-footer/profile' . $empresa_id  . ".jpeg"); 
            unlink('../img/profiles/banner-footer/profile' . $empresa_id  . ".png"); 

            $fileNameNew = "profile" . $empresa_id . "." . $fileActualExt;
            $fileDestination = '../img/profiles/banner-footer/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            if (validadorContenido($empresa_id, 'img', 'footer', '') === false) {
                $sql_request = "INSERT INTO `design_company_profile` (`idProfileDesing`, `idEmpresa_empresa`, `tipo_contenido`, `posicion`, `orden`, `contenido_dato`) VALUES (NULL, '{$empresa_id}', 'img', 'footer', '', '{$fileDestination}')";
                $resul_sql_request = mysqli_query($connection, $sql_request);
            } else {

                $sql_request = "UPDATE `design_company_profile` SET tipo_contenido = 'img', posicion='footer', grupo='', contenido_dato='${fileDestination}' WHERE idEmpresa_empresa='${empresa_id}' AND tipo_contenido='img' AND posicion='footer' AND grupo=''";
                mysqli_query($connection, $sql_request);
               
            }
            $array_success[] = 'footer';;
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}




if (empty($_FILES['img_middle_first']['name'])) {
    if (validadorContenido($empresa_id, 'img', 'middle', '1') === false) {
        $orden = $data[1][1]["orden"];
        $sql_request = "INSERT INTO `design_company_profile` (`idProfileDesing`, `idEmpresa_empresa`, `tipo_contenido`, `posicion`, `grupo`, `orden`, `contenido_dato`) VALUES (NULL, '{$empresa_id}', 'img', 'middle', '1', '{$orden}', '')";
        mysqli_query($connection, $sql_request);
    } else {
        $orden = $data[1][1]["orden"];

        $sql_request = "UPDATE `design_company_profile` SET tipo_contenido = 'img', posicion='middle', grupo='1', orden='${orden}' WHERE idEmpresa_empresa='${empresa_id}' AND tipo_contenido='img' AND posicion='middle' AND grupo='1'";
        mysqli_query($connection, $sql_request);
    }
} else {

    $orden = $data[1][1]["orden"];

    $file = $_FILES['img_middle_first'];
    $fileName = $_FILES['img_middle_first']['name'];
    $fileTmpName = $_FILES['img_middle_first']['tmp_name'];
    $fileSize = $_FILES['img_middle_first']['size'];
    $fileError = $_FILES['img_middle_first']['error'];
    $fileType = $_FILES['img_middle_first']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {


            unlink('../img/profiles/banner-middle/profile_middle_1' . $empresa_id  . ".jpg"); 
            unlink('../img/profiles/banner-middle/profile_middle_1' . $empresa_id  . ".jpeg"); 
            unlink('../img/profiles/banner-middle/profile_middle_1' . $empresa_id  . ".png"); 

            // if ($fileSize < 10000000) {
            $fileNameNew = "profile_middle_1" . $empresa_id . "." . $fileActualExt;
            $fileDestination = '../img/profiles/banner-middle/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            if (validadorContenido($empresa_id, 'img', 'middle', '1') === false) {

                $sql_request = "INSERT INTO `design_company_profile` (`idProfileDesing`, `idEmpresa_empresa`, `tipo_contenido`, `posicion`, `grupo`, `orden`, `contenido_dato`) VALUES (NULL, '{$empresa_id}', 'img', 'middle', '1', '{$orden}', '{$fileDestination}')";

                mysqli_query($connection, $sql_request);
            } else {

                $sql_request = "UPDATE `design_company_profile` SET tipo_contenido = 'img', posicion='middle', grupo='1', orden='${orden}', contenido_dato='${fileDestination}' WHERE idEmpresa_empresa='${empresa_id}' AND tipo_contenido='img' AND posicion='middle' AND grupo='1'";

                mysqli_query($connection, $sql_request);
            }

            $array_success[] = 'middle';

            //  } else {
            //     echo "heavy";
            // }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}


echo json_encode($array_success, JSON_PRETTY_PRINT);




function insertText($idEmpresa, $tipoContenido, $posicion, $grupo, $orden, $contenido_dato)
{

    include "db.php";
    $contenido_dato_converted = mysqli_real_escape_string($connection, $contenido_dato);
    $consulta = "INSERT INTO `design_company_profile` (`idProfileDesing`, `idEmpresa_empresa`, `tipo_contenido`, `posicion`, `grupo`, `orden`, `contenido_dato`) 
    VALUES (NULL, '{$idEmpresa}', '{$tipoContenido}', '{$posicion}', '{$grupo}', '{$orden}', '{$contenido_dato_converted}')";
    mysqli_query($connection, $consulta);
}

function updateText($idEmpresa, $tipoContenido, $posicion, $grupo, $orden, $contenido_dato)
{
    include "db.php";
    $contenido_dato_converted = mysqli_real_escape_string($connection, $contenido_dato);
    echo $consulta = "UPDATE `design_company_profile` SET tipo_contenido = '{$tipoContenido}', posicion = '{$posicion}', grupo = '{$grupo}', orden = '{$orden}', contenido_dato = '{$contenido_dato_converted}' WHERE idEmpresa_empresa = '${idEmpresa}' AND tipo_contenido = '${tipoContenido}' AND posicion = '${posicion}'";
    mysqli_query($connection, $consulta);
}



function validadorContenido($idEmpresa, $tipoContenido, $posicion, $grupo)
{

    include "db.php";

    $resultado = false;
    $consulta = "SELECT * FROM `design_company_profile` WHERE idEmpresa_empresa = '{$idEmpresa}' and grupo = '{$grupo}' and tipo_contenido = '{$tipoContenido}' and posicion = '{$posicion}'";
    $resul_sql_consulta = mysqli_query($connection, $consulta);
    $count = mysqli_num_rows($resul_sql_consulta);

    if ($count >= 0) {
        $resultado = false;
    }
    if ($count == 1) {
        $resultado = true;
    }

    return $resultado;
}
