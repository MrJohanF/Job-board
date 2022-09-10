<?php include "db.php" ?>

<?php session_start(); ?>


<?php
if (isset($_POST['login'])) {


  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);


  $query = "SELECT * FROM empresa LEFT JOIN ciudad ON empresa.ciudad_empresa = ciudad.idCiudad WHERE email_empresa = '{$username}' AND active = '1'";
  $select_user_query = mysqli_query($connection, $query);
  if (!$select_user_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_array($select_user_query)) {

    $db_idEmpresa = $row['idEmpresa'];
    $db_nombre_empresa = $row['nombre_empresa'];
    $db_nit_empresa = $row['nit_empresa'];
    $db_pais = $row['pais_idPais'];
    $db_ciudad_empresa = $row['ciudad_empresa'];
    $db_telefono_empresa = $row['telefono_empresa'];
    $db_telefono_celular_empresa = $row['telefono_celular_empresa'];
    $db_nombre_contacto_empresa = $row['nombre_contacto_empresa'];
    $db_apellido_contacto_empresa = $row['apellido_contacto_empresa'];
    $db_email_empresa = $row['email_empresa'];
    $db_password_empresa = $row['contraseña_empresa'];
    $db_description_empresa = $row['descripcion_empresa'];
    $db_direccion_empresa = $row['direccion_empresa'];
    $db_beneficios_empresa = $row['beneficios_empresa'];
    $db_numero_empleados = $row['numero_empleados'];
    $db_verificado_empresa = $row['verificado_empresa'];
    $db_aprobado_empresa = $row['aprobado'];
    $db_active_empresa = $row['active'];
    $db_membresia_empresa = $row['membresia'];
    $db_servicios_empresa = $row['servicios'];
  }

   $password = crypt($password, $db_password_empresa);
   $password;
   

  if ($username !== $db_email_empresa && $password !== $db_password_empresa) {
   
    header("Location: ../empresas.php#popup");
  } else if ($username == $db_email_empresa && $password == $db_password_empresa) {
    
 
    header("Location: ../dashboard_empleador.php#home");

    $_SESSION['e_idEmpresa'] = $db_idEmpresa;
    $_SESSION['e_nombre_empresa'] = $db_nombre_empresa;
    $_SESSION['e_nit_empresa'] = $db_nit_empresa;
    $_SESSION['e_pais_empresa'] = $db_pais;
    $_SESSION['e_ciudad_empresa'] = $db_ciudad_empresa;
    $_SESSION['e_telefono_empresa'] = $db_telefono_empresa;
    $_SESSION['e_direccion_empresa'] = $db_direccion_empresa;
    $_SESSION['e_telefono_celular_empresa'] = $db_telefono_empresa;
    $_SESSION['e_nombre_contacto_empresa'] = $db_nombre_contacto_empresa;
    $_SESSION['e_apellido_contacto_empresa'] = $db_apellido_contacto_empresa;
    $_SESSION['e_email_empresa'] = $db_email_empresa;
    $_SESSION['e_password_empresa'] = $db_password_empresa;
    $_SESSION['e_description_empresa'] = $db_description_empresa;
    $_SESSION['e_beneficios_empresa'] = $db_beneficios_empresa;
    $_SESSION['e_numero_empleados'] = $db_numero_empleados;
    $_SESSION['e_verificacion_empresa'] = $db_verificado_empresa;
    $_SESSION['e_aprobado_empresa'] = $db_aprobado_empresa;
    $_SESSION['e_active_empresa'] = $db_active_empresa;
    $_SESSION['e_membresia_empresa'] = $db_membresia_empresa;
    $_SESSION['e_servicios_empresa'] = $db_servicios_empresa;



    $_SESSION['s_id_candidato'] = null;
    $_SESSION['s_nombre'] = null;
    $_SESSION['s_url_red_social'] = null;
    $_SESSION['s_apellido'] = null;
    $_SESSION['s_numero_cedula'] = null;
    $_SESSION['s_foto_perfil'] = null;
    $_SESSION['s_fecha_nacimiento'] = null;
    $_SESSION['s_telefono'] = null;
    $_SESSION['s_email'] = null;
    $_SESSION['s_password'] = null;
    $_SESSION['s_genero'] = null;
    $_SESSION['s_id_pais'] = null;
    $_SESSION['s_ciudad'] = null;
    $_SESSION['s_id_ciudad'] = null;
    $_SESSION['s_tipo_cuenta'] = null;
    $_SESSION['s_tipo_trabajo'] = null;
    $_SESSION['s_direccion'] = null;
    $_SESSION['s_numero_whatsapp'] = null;
    $_SESSION['s_aspiracion_salarial'] = null;
    $_SESSION['s_cargo_deseado'] = null;
    $_SESSION['s_descripcion'] = null;
    $_SESSION['s_disponibilidad_vehiculo'] = null;
    $_SESSION['s_disponibilidad_viaje'] = null;
    $_SESSION['s_verificado_candidato'] = null;
    $_SESSION['s_nivel_ingles'] = null;
    
  } else {
    header("Location: ../empresas.php#popup");
  }
}

?>