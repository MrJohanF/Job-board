<?php

include "db.php";



$data = json_decode($_POST['array'], true);
$idCandidato = $_POST['idCandidato'];
$contador = $_POST['contador'];


$longitud = count($data);

$consulta = "INSERT INTO `certificados_candidato_laboral` (`Candidato_idCandidato`, `nombre_empresa`, `cargo_ocupado`, `inicio_tiempo_laborado`, `final_tiempo_laborado`, `funciones_realizadas`, `motivo_retiro`) VALUES ";
$base = "";
$close = ")";
$solicitud_completa = "";
$contador_foto = 1;

$borrar = "DELETE FROM certificados_candidato_laboral WHERE Candidato_idCandidato = $idCandidato";
$resul_enviar = mysqli_query($connection, $borrar);

for ($i = 0; $i < $longitud; $i++) {

    if (empty($_FILES['img' . $contador_foto]['name'])) {

        $base .=  "(" . "'" . $idCandidato . "', " . "'" . $data[$i]["nombre_empresa"] . "'," . " '" . $data[$i]["cargo_ocupado"] . "'," . " '" . $data[$i]["inicio"] . "'," . " '" . $data[$i]["final"] . "'," . " '" . $data[$i]["funciones"] . "'," . " '" . $data[$i]["retiro"] . "'" . (($i == $longitud - 1) ? "" : " ), ");

         $solicitud_completa = $consulta . $base . $close;

        $borrar = "DELETE FROM certificados_candidato_laboral WHERE Candidato_idCandidato = $idCandidato";
        $resul_enviar = mysqli_query($connection, $borrar);


        $add = $solicitud_completa;
        $resul_enviar = mysqli_query($connection, $add);
    } else {

        $file = $_FILES['img' . $contador_foto];
        $fileName = $_FILES['img' . $contador_foto]['name'];
        $fileTmpName = $_FILES['img' . $contador_foto]['tmp_name'];
        $fileSize = $_FILES['img' . $contador_foto]['size'];
        $fileError = $_FILES['img' . $contador_foto]['error'];
        $fileType = $_FILES['img' . $contador_foto]['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = "document/". $fileName . $idCandidato . "." . $fileActualExt;
                    $fileDestination = '../documents/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $consulta = "INSERT INTO `certificados_candidato_laboral` (`certificacion_laboral` ,`Candidato_idCandidato`, `nombre_empresa`, `cargo_ocupado`, `inicio_tiempo_laborado`, `final_tiempo_laborado`, `funciones_realizadas`, `motivo_retiro`) VALUES ";
                    $base .=  "" . "'" . $idCandidato . "', " . "'" . $data[$i]["nombre_empresa"] . "'," . " '" . $data[$i]["cargo_ocupado"] . "'," . " '" . $data[$i]["inicio"] . "'," . " '" . $data[$i]["final"] . "'," . " '" . $data[$i]["funciones"] . "'," . " '" . $data[$i]["retiro"] . "'" . (($i == $longitud - 1) ? "" : " ), ");
                    $solicitud_completa = $consulta ."('" . $fileDestination ."',". $base . $close;
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
    $contador_foto = $contador_foto + 1;
}


echo "Experiencia laboral actualizada";