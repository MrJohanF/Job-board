<?php session_start() ?>


<?php

$_SESSION['e_idEmpresa'] = null;
    $_SESSION['e_nombre_empresa'] = null;
    $_SESSION['e_nit_empresa'] = null;
    $_SESSION['e_pais_empresa'] = null;
    $_SESSION['e_ciudad_empresa'] = null;
    $_SESSION['e_telefono_empresa'] = null;
    $_SESSION['e_nombre_contacto_empresa'] = null;
    $_SESSION['e_apellido_contacto_empresa'] = null;
    $_SESSION['e_email_empresa'] = null;
    $_SESSION['e_password_empresa'] = null;
    $_SESSION['e_description_empresa'] = null;
    $_SESSION['e_beneficios_empresa'] = null;
    $_SESSION['e_numero_empleados'] = null;
    $_SESSION['e_verificacion_empresa'] = null;
    $_SESSION['e_aprobado_empresa'] = null;
    $_SESSION['e_active_empresa'] = null;
    $_SESSION['e_membresia_empresa'] = null;
    $_SESSION['e_servicios_empresa'] = null;

    header("Location: ../empresas.php")


?>