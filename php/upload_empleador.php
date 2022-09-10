<?php session_start(); ?>


<?php

include "db.php";



if (empty($_POST['idEmpresa'])) {
    //  echo "vacio";
} else {

    $id = $_POST['idEmpresa'];
    $db_nombre_empresa = $_POST['nombre_empresa'];
    $db_nit_empresa = $_POST['nit_empresa'];
    $db_pais_empresa = $_POST['pais_empresa'];
    $db_ciudad_empresa = $_POST['ciudad_empresa'];
    $db_direccion_empresa = $_POST['direccion_empresa'];
    $db_telefono_empresa = $_POST['telefono_empresa'];
    $db_telefono_celular_empresa = $_POST['telefono_celular_empresa'];
    $db_nombre_contacto_empresa = $_POST['nombre_contacto_empresa'];
    $db_email_empresa = $_POST['correo_empresa'];
    $db_descripcion_empresa = $_POST['descripcion_empresa'];
    $db_beneficios_empresa = $_POST['beneficios_empresa'];
    $db_numero_empleados_empresa = $_POST['numero_empleados'];


    $enviar = "UPDATE empresa SET 
  `nombre_empresa` = '$db_nombre_empresa',
   `nit_empresa` = '$db_nit_empresa',
    `ciudad_empresa` = '$db_ciudad_empresa',
    `direccion_empresa` = '$db_direccion_empresa',
     `telefono_empresa` = '$db_telefono_empresa',
      `telefono_celular_empresa` = '$db_telefono_celular_empresa',
       `nombre_contacto_empresa` = '$db_nombre_contacto_empresa',
        `email_empresa` = '$db_email_empresa',
         `descripcion_empresa` = '$db_descripcion_empresa',
        `beneficios_empresa` = '$db_beneficios_empresa',
         `numero_empleados` = '$db_numero_empleados_empresa'
         WHERE `empresa`.`idEmpresa` = $id";
    $resul_enviar = mysqli_query($connection, $enviar);


    if ($resul_enviar == TRUE) {

        $_SESSION['e_nombre_empresa'] = $db_nombre_empresa;
        $_SESSION['e_nit_empresa'] = $db_nit_empresa;
        $_SESSION['e_pais_empresa'] = $db_pais_empresa;
        $_SESSION['e_ciudad_empresa'] = $db_ciudad_empresa;
        $_SESSION['e_telefono_empresa'] = $db_telefono_empresa;
        $_SESSION['e_direccion_empresa'] = $db_direccion_empresa;
        $_SESSION['e_telefono_celular_empresa'] = $db_telefono_celular_empresa;
        $_SESSION['e_nombre_contacto_empresa'] = $db_nombre_contacto_empresa;
        $_SESSION['e_email_empresa'] = $db_email_empresa;
        $_SESSION['e_description_empresa'] = $db_descripcion_empresa;
        $_SESSION['e_beneficios_empresa'] = $db_beneficios_empresa;
        $_SESSION['e_numero_empleados'] = $db_numero_empleados_empresa;


        //  echo "Edicion Exitosa";
    }
}



if (empty($_FILES['img'])) {
} else {

    $file = $_FILES['img'];
    $fileName = $_FILES['img']['name'];
    $fileTmpName = $_FILES['img']['tmp_name'];
    $fileSize = $_FILES['img']['size'];
    $fileError = $_FILES['img']['error'];
    $fileType = $_FILES['img']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {

                if (file_exists('../profile_empleador/profile' . $id . '.png')) {
                    unlink('../profile_empleador/profile' . $id . '.png');
                }

                if (file_exists('../profile_empleador/profile' . $id . '.jpg')) {
                    unlink('../profile_empleador/profile' . $id . '.jpg');
                }

                if (file_exists('../profile_empleador/profile' . $id . '.jpeg')) {
                    unlink('../profile_empleador/profile' . $id . '.jpeg');
                }


                $fileNameNew = "profile" . $id . "." . $fileActualExt;
                $fileDestination = '../profile_empleador/' . $fileNameNew;


                move_uploaded_file($fileTmpName, $fileDestination);

                $sql_request = "UPDATE empresa SET foto_empresa = '{$fileDestination}' WHERE empresa.idEmpresa = '{$id}'";
                $resul_sql_request = mysqli_query($connection, $sql_request);
            } else {
                echo "Your file too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}







?>

