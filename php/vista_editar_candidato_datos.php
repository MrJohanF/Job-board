<?php

include "db.php";

$id_candidato = $_POST['id_candidato'];


$enviar = "SELECT * FROM candidato WHERE candidato.idCandidato = $id_candidato";
$resul_enviar = mysqli_query($connection, $enviar);

$row = mysqli_fetch_array($resul_enviar);

$db_idCandidato = $row['idCandidato'];
$db_nombre = $row['nombre'];
$db_apellido = $row['apellido'];
$db_numero_cedula = $row['numero_cedula'];
$db_fecha_nacimiento = $row['fecha_nacimiento'];
$db_telefono = $row['telefono'];
$db_email = $row['email'];
$db_genero = $row['genero'];
$db_direccion = $row['direccion'];
$db_numero_whatsapp = $row['numero_whatsapp'];
$db_cargo_deseado = $row['cargo_deseado'];
$db_descripcion = $row['descripcion'];

?>

<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Nombres" id="nombre_cl" value="<?php echo $db_nombre?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Apellidos" id="apellido_cl" value="<?php echo $db_apellido ?>" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Numero de cedula" id="numero_cedula_cl" value="<?php echo $db_numero_cedula ?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Fecha de nacimiento" id="fecha_nacimiento_cl" value="<?php echo $db_fecha_nacimiento ?>" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Telefono" id="telefono_cl" value="<?php echo $db_telefono ?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Email" id="email_cl" value="<?php echo $db_email ?>" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Genero" id="genero_cl" value="<?php echo $db_genero ?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Direccion" id="direccion_cl" value="<?php echo $db_direccion ?>" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 7%;">
        <textarea class="formtext" style="width: 100%; max-height: 20rem;" id="descripcion_cl" placeholder="Descripcion"><?php echo $db_descripcion ?></textarea>
    </div>

    <div class="form-login__group" style="width: 48%; padding-right: 7%;">
        <textarea class="formtext" style="width: 100%; max-height: 20rem;" id="cargo_deseado_cl" placeholder="Cargo deseado"><?php echo $db_cargo_deseado ?></textarea>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Numero Whatsapp" id="numero_whatsapp_cl" value="<?php echo $db_numero_whatsapp ?>" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Id del candidato" id="idCandidato_cl" value="<?php echo $db_idCandidato ?>" required>
    </div>
</div>

<button onclick="btn_guardar_candidato_edicion()" name="login" type="submit" class="">Actualizar</button>



