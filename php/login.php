<?php include "db.php" ?>

<?php session_start(); ?>


<?php
if (isset($_POST['login'])) {


  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);


  $query = "SELECT * FROM candidato INNER JOIN ciudad ON candidato.ciudad = ciudad.idCiudad LEFT JOIN red_social ON candidato.idCandidato = red_social.Candidato_idCandidato WHERE email = '{$username}' and aprobado='1'";
  $select_user_query = mysqli_query($connection, $query);
  if (!$select_user_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_array($select_user_query)) {

    $db_id = $row['idCandidato'];
    $db_nombre = $row['nombre'];
    $db_red_social = $row['red_social'];
    $db_url_red_social = $row['url_red_social'];
    $db_apellido = $row['apellido'];
    $db_numero_cedula = $row['numero_cedula'];
    $db_foto_perfil = $row['foto_perfil'];
    $db_fecha_nacimiento = $row['fecha_nacimiento'];
    $db_edad = $row['edad'];
    $db_telefono = $row['telefono'];
    $db_email = $row['email'];
    $db_password = $row['password'];
    $db_genero = $row['genero'];
    $db_pais = $row['pais_idPais'];
    $db_id_ciudad = $row['ciudad'];
    $db_ciudad = $row['ciudad_general'];
    $db_direccion = $row['direccion'];
    $db_tipo_cuenta = $row['tipo_cuenta'];
    $db_numero_whatsapp = $row['numero_whatsapp'];
    $db_aspiracion_salarial = $row['aspiracion_salarial'];
    $db_cargo_deseado = $row['cargo_deseado'];
    $db_disponibilidad_vehiculo = $row['disponibilidad_vehiculo'];
    $db_disponibilidad_viajar = $row['disponibilidad_viaje'];
    $db_descripcion = $row['descripcion'];
    $db_verificado_candidato = $row['verificado_candidato'];
    $db_tipo_trabajo = $row['id_tipoTrabajo'];
    $db_nivel_ingles = $row['nivel_ingles'];
  }

   $password = crypt($password, $db_password);
   $password;


  if ($username !== $db_email && $password !== $db_password) {
    header("Location: ../index.php#popup");
  } else if ($username == $db_email && $password == $db_password) {
    

    $_SESSION['s_id_candidato'] = $db_id;
    $_SESSION['s_nombre'] = $db_nombre;
    $_SESSION['s_red_social'] = $db_red_social;
    $_SESSION['s_url_red_social'] = $db_url_red_social;
    $_SESSION['s_apellido'] = $db_apellido;
    $_SESSION['s_numero_cedula'] = $db_numero_cedula;
    $_SESSION['s_foto_perfil'] = $db_foto_perfil;
    $_SESSION['s_fecha_nacimiento'] = $db_fecha_nacimiento;
    $_SESSION['s_edad'] = $db_edad;
    $_SESSION['s_telefono'] = $db_telefono;
    $_SESSION['s_email'] = $db_email;
    $_SESSION['s_password'] = $db_password;
    $_SESSION['s_genero'] = $db_genero;
    $_SESSION['s_id_pais'] = $db_pais;
    $_SESSION['s_ciudad'] = $db_ciudad;
    $_SESSION['s_id_ciudad'] = $db_id_ciudad;
    $_SESSION['s_tipo_cuenta'] = $db_tipo_cuenta;
    $_SESSION['s_tipo_trabajo'] = $db_tipo_trabajo;
    $_SESSION['s_direccion'] = $db_direccion;
    $_SESSION['s_numero_whatsapp'] = $db_numero_whatsapp;
    $_SESSION['s_aspiracion_salarial'] = $db_aspiracion_salarial;
    $_SESSION['s_cargo_deseado'] = $db_cargo_deseado;
    $_SESSION['s_descripcion'] = $db_descripcion;
    $_SESSION['s_disponibilidad_vehiculo'] = $db_disponibilidad_vehiculo;
    $_SESSION['s_disponibilidad_viaje'] = $db_disponibilidad_viajar;
    $_SESSION['s_verificado_candidato'] = $db_verificado_candidato;
    $_SESSION['s_nivel_ingles'] = $db_nivel_ingles;


    $_SESSION['e_idEmpresa'] = null;
    $_SESSION['e_nombre_empresa'] = null;
    $_SESSION['e_nit_empresa'] = null;
    $_SESSION['e_ciudad_empresa'] = null;
    $_SESSION['e_telefono_empresa'] = null;
    $_SESSION['e_direccion_empresa'] = null;
    $_SESSION['e_telefono_celular_empresa'] = null;
    $_SESSION['e_nombre_contacto_empresa'] = null;
    $_SESSION['e_apellido_contacto_empresa'] = null;
    $_SESSION['e_email_empresa'] = null;
    $_SESSION['e_password_empresa'] = null;
    $_SESSION['e_description_empresa'] = null;
    $_SESSION['e_beneficios_empresa'] = null;
    $_SESSION['e_numero_empleados'] = null;
    $_SESSION['e_verificacion_empresa'] = null;
    $_SESSION['e_aprobado_empresa'] = null;
    $_SESSION['e_membresia_empresa'] = null;

    header("Location: ../dashboard.php#home");
    
  } else {
    header("Location: ../index.php#popup");
  }
}

?>