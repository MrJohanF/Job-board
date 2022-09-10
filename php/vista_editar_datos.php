<?php

include "db.php";

$id_empresa = $_POST['id_empresa'];


$enviar = "SELECT * FROM empresa WHERE empresa.idEmpresa = $id_empresa";
$resul_enviar = mysqli_query($connection, $enviar);

$row = mysqli_fetch_array($resul_enviar);

$db_idEmpresa = $row['idEmpresa'];
$db_nombre_empresa = $row['nombre_empresa'];
$db_nit_empresa = $row['nit_empresa'];
$db_telefono_empresa = $row['telefono_empresa'];
$db_ciudad_empresa = $row['ciudad_empresa'];
$db_direccion_empresa = $row['direccion_empresa'];
$db_nombre_contacto_empresa = $row['nombre_contacto_empresa'];
$db_email_empresa = $row['email_empresa'];
$db_numero_empleados = $row['numero_empleados'];
$db_descripcion_empresa = $row['descripcion_empresa'];
$db_beneficios_empresa = $row['beneficios_empresa'];
$db_membresia = $row['membresia'];

?>

<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Nombre de empresa" id="nombre_empresa_ed" value="<?php echo $db_nombre_empresa?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Nit de empresa" id="nit_empresa_ed" value="<?php echo $db_nit_empresa ?>" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Ciudad de empresa" id="ciudad_empresa_ed" value="<?php echo $db_ciudad_empresa ?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Direccion de empresa" id="direccion_empresa_ed" value="<?php echo $db_direccion_empresa ?>" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Telefono de empresa" id="telefono_empresa_ed" value="<?php echo $db_telefono_empresa ?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Nombre de contacto" id="nombre_contacto_empresa_ed" value="<?php echo $db_nombre_contacto_empresa ?>" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Email de empresa" id="email_empresa_ed" value="<?php echo $db_email_empresa ?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Numero de empleados" id="numero_empleados_ed" value="<?php echo $db_numero_empleados ?>" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 7%;">
        <textarea class="formtext" style="width: 100%; max-height: 20rem;" id="descripcion_empresa_ed" placeholder="Descripcion de la empresa..."><?php echo $db_descripcion_empresa ?></textarea>
    </div>

    <div class="form-login__group" style="width: 48%; padding-right: 7%;">
        <textarea class="formtext" style="width: 100%; max-height: 20rem;" id="beneficios_empresa_ed" placeholder="Beneficios de la empresa..."><?php echo $db_beneficios_empresa ?></textarea>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Membresia" id="membresia_ed" value="<?php echo $db_membresia ?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Id de la empresa" id="idEmpresa_ed" value="<?php echo $db_idEmpresa ?>" required>
    </div>
</div>


<button onclick="btn_guardar_edicion()" name="login" type="submit" class="">Actualizar</button>


