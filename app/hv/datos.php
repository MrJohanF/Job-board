
<?php 

session_start();

include "../../php/db.php";

$id_candidato = $_SESSION['s_id_candidato'];

$datos = array();
$experiencia = array();
$educacion = array();
$habilidades = array();


$query = "SELECT * FROM candidato WHERE idCandidato = '{$id_candidato}' and aprobado='1'";
$select_user_query = mysqli_query($connection, $query);
if (!$select_user_query) {
  die("QUERY FAILED" . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_user_query)) {
  $datos[] = $row;
}

$query2 = "SELECT * FROM certificados_candidato_laboral WHERE Candidato_idCandidato = '{$id_candidato}'";
$select_user_query2 = mysqli_query($connection, $query2);
if (!$select_user_query2) {
  die("QUERY FAILED" . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_user_query2)) {
  $experiencia[] = $row;
}


$query3 = "SELECT * FROM certificados_candidato_educacion WHERE Candidato_idCandidato = '{$id_candidato}'";
$select_user_query3 = mysqli_query($connection, $query3);
if (!$select_user_query3) {
  die("QUERY FAILED" . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_user_query3)) {
  $educacion[] = $row;
}

$query4 = "SELECT * FROM `habilidades_candidato` INNER JOIN habilidades_generales ON habilidades_generales.idHabilidades_generales = habilidades_candidato.Habilidades_generales_idHabilidades_generales WHERE Candidato_idCandidato = '{$id_candidato}'";
$select_user_query4 = mysqli_query($connection, $query4);
if (!$select_user_query4) {
  die("QUERY FAILED" . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_user_query4)) {
  $habilidades[] = $row;
}


?>
