<?php

session_start(); 

include "db.php";

$idCandidato = $_POST['idCandidato'];
$url_instragram = $_POST['instagram'];
$url_facebook = $_POST['facebook'];
$url_whatsapp = $_POST['whatsapp'];
$url_linkedin = $_POST['linkedin'];

$borrar = "DELETE FROM red_social WHERE Candidato_idCandidato = $idCandidato";
$resul_enviar = mysqli_query($connection, $borrar);

$redes = array("facebook" => $url_facebook, "instagram" => $url_instragram, "whatsapp" => $url_whatsapp, "linkedin" => $url_linkedin);


$redes_json = json_encode($redes);


$_SESSION['s_url_red_social'] = $redes_json;

$enviar = "INSERT INTO `red_social` (`Candidato_idCandidato`, `red_social`, `url_red_social`) VALUES ('$idCandidato', 'social networks', '$redes_json')";
$resul_enviar = mysqli_query($connection, $enviar);


echo "Redes sociales actualizadas";
