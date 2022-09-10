
<?php session_start(); ?>


<?php

include "db.php";




if (empty($_POST['idCandidato'])) {
} else {

    $id = $_POST['idCandidato'];
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
    $db_range_value = $_POST['range-value'];
    $db_ciudad = $_POST['ciudad'];
    $db_tipo_trabajo = $_POST['tipo_work'];
    $db_viajar = $_POST['viajar'];
    $db_vehiculo = $_POST['vehiculo'];
    $db_level_ingles = $_POST['level_ingles'];
    $db_pais = $_POST['pais'];

    $fecha_calculo1 = new DateTime(date("Y-m-d", strtotime($db_fecha_nacimiento)));
    $fecha_calculo2 = new DateTime(date("Y-m-d"));
    $fecha_resultado = $fecha_calculo1->diff($fecha_calculo2);
    $db_edad = $fecha_resultado->y;



    $enviar = "UPDATE candidato SET 
`nombre` =  '$db_nombre',
 `apellido` = '$db_apellido',
  `numero_cedula` = '$db_numero_cedula',
   `fecha_nacimiento` = '$db_fecha_nacimiento',
    `edad` = '$db_edad',
    `telefono` = '$db_telefono',
     `email` = '$db_email',
      `direccion` = '$db_direccion',
       `numero_whatsapp` = '$db_numero_whatsapp',
        `aspiracion_salarial` = '$db_range_value',
         `cargo_deseado` = '$db_cargo_deseado',
         `descripcion` = '$db_descripcion',
         `disponibilidad_viaje` = '$db_viajar',
         `disponibilidad_vehiculo` = '$db_vehiculo',
         `genero` = '$db_genero',
         `nivel_ingles` = '$db_level_ingles',
         `ciudad` = '$db_ciudad',
         `id_tipoTrabajo` = '$db_tipo_trabajo' 
         WHERE `candidato`.`idCandidato` = $id";
    $resul_enviar = mysqli_query($connection, $enviar);


    if ($resul_enviar == TRUE) {

        $_SESSION['s_nombre'] = $db_nombre;
        $_SESSION['s_apellido'] = $db_apellido;
        $_SESSION['s_numero_cedula'] = $db_numero_cedula;
        $_SESSION['s_fecha_nacimiento'] = $db_fecha_nacimiento;
        $_SESSION['s_edad'] = $db_edad;
        $_SESSION['s_telefono'] = $db_telefono;
        $_SESSION['s_email'] = $db_email;
        $_SESSION['s_genero'] = $db_genero;
        $_SESSION['s_id_pais'] = $db_pais;
        $_SESSION['s_ciudad'] = $db_ciudad;
        $_SESSION['s_id_ciudad'] = $db_ciudad;
        $_SESSION['s_tipo_trabajo'] = $db_tipo_trabajo;
        $_SESSION['s_direccion'] = $db_direccion;
        $_SESSION['s_numero_whatsapp'] = $db_numero_whatsapp;
        $_SESSION['s_aspiracion_salarial'] = $db_range_value;
        $_SESSION['s_cargo_deseado'] = $db_cargo_deseado;
        $_SESSION['s_descripcion'] = $db_descripcion;
        $_SESSION['s_disponibilidad_vehiculo'] = $db_vehiculo;
        $_SESSION['s_disponibilidad_viaje'] = $db_viajar;
        $_SESSION['s_nivel_ingles'] = $db_level_ingles;


        // echo "Edicion Exitosa";
    }
}



if (empty($_FILES['img']['name'])) {
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


                if (file_exists('../uploads/profile' . $id . '.png')) {
                    unlink('../uploads/profile' . $id . '.png');
                }

                if (file_exists('../uploads/profile' . $id . '.jpg')) {
                    unlink('../uploads/profile' . $id . '.jpg');
                }

                if (file_exists('../uploads/profile' . $id . '.jpeg')) {
                    unlink('../uploads/profile' . $id . '.jpeg');
                }

                $fileNameNew = "profile" . $id . "." . $fileActualExt;
                $fileDestination = '../uploads/' . $fileNameNew;


                move_uploaded_file($fileTmpName, $fileDestination);


                $sql_request = "UPDATE candidato SET foto_perfil = '{$fileDestination}' WHERE candidato.idCandidato = '{$id}'";
                $resul_sql_request = mysqli_query($connection, $sql_request);


              //  header("Location: ../dashboard.php?uploadsuccess");
                
            } else {
                echo "Tu foto es demasiado grande!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}




?>