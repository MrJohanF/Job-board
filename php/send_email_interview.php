<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "db.php";
require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL ^ E_NOTICE);

if ($_POST["correo_candidato"]) {



    $regi_email = $_POST["correo_candidato"];
    $idEmpresa = $_POST["idEmpresa"];
    $idCandidato = $_POST["idCandidato"];
    $idEntrevista = $_POST["idEntrevista"];
    $id_oferta = $_POST["id_oferta"];



    $query_empresa = "SELECT nombre_empresa FROM empresa WHERE idEmpresa ='{$idEmpresa}'";
    $result_query_empresa = mysqli_query($connection, $query_empresa);

    $row_empresa = mysqli_fetch_array($result_query_empresa);
    $db_nombre_empresa = $row_empresa['nombre_empresa'];

    $query = "SELECT email, idCandidato FROM candidato WHERE email ='{$regi_email}' and idCandidato = {$idCandidato}";

    $result_query = mysqli_query($connection, $query);
    $row_candidato = mysqli_fetch_array($result_query);
    $db_idCandidato = $row_candidato['idCandidato'];

    $count = mysqli_num_rows($result_query);
    if (!$result_query) {
        die("Query failed: " . mysqli_error($connection) . '' .
            mysqli_errno($connection));
    }


    if ($count >= 1) {

        // cifrado del id de la entrevista

        $token = md5(rand(0, 1000));

        echo $query = "INSERT INTO `entrevista_candidato` (`idEntrevista_candidato`, `oferta_idOferta`, `hash`, `candidato_idCandidato`, `estado`, `entrevista_idEntrevista`) VALUES (NULL, '{$id_oferta}', '{$token}', '{$db_idCandidato}', '0', '{$idEntrevista}') ";
        $result_query = mysqli_query($connection, $query);

        $message = "
        La empresa: " . $db_nombre_empresa . "<br>
        Te ha invitado a un proceso de entrevista personalizado<br>
        Porfavor clickea en el siguiente enlance para realizar la entrivista<br>
        http://tujob.co/interview.php?email=$regi_email&hash=$token";

        $mail = new PHPMailer(true);

        try {
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';

            $mail->Host = 'smtp.hostinger.co';
            $mail->Port = 587;
            $mail->SMTPDebug  = 0;
            $mail->SMTPAuth = true;
            $mail->Username = 'interview@tujob.co';
            $mail->Password = 'Empleatic123.';

            $mail->setFrom('interview@tujob.co');
            $mail->addAddress($regi_email);
            $mail->addReplyTo($regi_email);

            $mail->isHTML(true);
            $mail->Subject = "Invitacion | Entrevista, por tujob.co";
            $mail->Body = '' . $message;


            $mail->send();
            echo 'Message has been sent';
           

            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        
    }
}
