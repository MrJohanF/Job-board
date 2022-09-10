<?php session_start(); ?>

<?php

include "db.php";

$paisSeleccion  = $_POST['paisSeleccion1'];

$id_ciudad = $_SESSION['s_id_ciudad'];
$id_ciudad_empleador = $_SESSION['e_ciudad_empresa'];

$contar = strlen($id_ciudad);
$contar1 = strlen($id_ciudad_empleador);


$enviar = "SELECT * FROM ciudad WHERE ciudad.pais_idPais = $paisSeleccion";

if ($contar >= 1) {
  $enviar = "SELECT * FROM ciudad WHERE ciudad.pais_idPais = $paisSeleccion ORDER BY ciudad.idCiudad = $id_ciudad DESC";
}
if ($contar1 >= 1) {
   $enviar = "SELECT * FROM ciudad WHERE ciudad.pais_idPais = $paisSeleccion ORDER BY ciudad.idCiudad = $id_ciudad_empleador DESC";
}

  







$resul_enviar = mysqli_query($connection, $enviar);



if (!$resul_enviar) {
  die("QUERY FAILED" . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($resul_enviar)) {
  $db_ciudad = $row['ciudad_general'];
  $db_idCiudad = $row['idCiudad'];



?>
  <option value="<?php echo $db_idCiudad ?>"><?php echo $db_ciudad ?></option>
<?php
}
?>