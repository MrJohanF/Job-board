<?php

include "db.php";

$contador_exp = $_POST['contador_exp'];


?>

<h3 id="exp_<?php echo $contador_exp ?>">Nueva experiencia laboral</h3>
<div id='exp1_<?php echo $contador_exp ?>'>
    <div style="margin-top: 2rem;">
        <div class="form-login__group" style="display: inline-flex; width: 100%;">
            <div class="form-login__group" style="width: 48%; padding-right: 5%;"><input type="text" class="form-login__input" placeholder="Nombre de empresa" id="nombre_empresa_laboral_<?php echo $contador_exp ?>" value="" required></div>
            <div class="form-login__group" style="width: 45%;"><input type="email" class="form-login__input" placeholder="Cargo Ocupado" id="cargo_ocupado_laboral_<?php echo $contador_exp ?>" value="" required></div>
        </div>
        <div class="form-login__group" style="display: inline-flex; width: 100%;">
            <div class="form-login__group" style="width: 48%; padding-right: 5%;"><label for="" class="form-browser__label">Fecha de inicio</label><input type="date" id="inicio_tiempo_laborado_<?php echo $contador_exp ?>" class="form-login__input" placeholder="Tiempo Laborado" value="" required></div>
            <div class="form-login__group" style="width: 45%;"><label class="form-browser__label">Fecha de finalizacion</label><input type="date" id="final_tiempo_laborado_<?php echo $contador_exp ?>" class="form-login__input" placeholder="Tiempo Laborado" value="" required></div>
        </div>

        <div class="form-login__group">
            <h3 class="text-animation">Funciones realizadas</h3>
        </div>
        <div class="form-login__group"><textarea class="formtext-blocked" id="funciones_realizadas_laboral_<?php echo $contador_exp ?>" placeholder="Cuentanos que funciones realizabas"></textarea></div>
        <div class="form-login__group">
            <h3 class="text-animation">Motivo de retiro</h3>
        </div>
        <div class="form-login__group"><textarea class="formtext-blocked" id="motivo_retiro_laboral_<?php echo $contador_exp ?>" placeholder="OH no!.. Porque te retiraste?"></textarea> </div>
        <div class="form-login__group" style="margin-top: 2rem; display: none; visibility: hidden;"><input type="file" id="pdf_exp_<?php echo $contador_exp ?>" class="btn-cuadrado-submit btn-cuadrado-submit--green"></div>
    </div>
</div>