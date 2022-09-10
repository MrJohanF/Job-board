<?php

include "db.php";

$contador_edu = $_POST['contador_edu'];


?>

<h3 id='edu_<?php echo $contador_edu ?>'>Nuevo Certificado Educativo</h3>
<div id='edu1_<?php echo $contador_edu ?>'>
    <div style='margin-top: 2rem;'>

        <div class="form-login__group" style="width: 100%; margin-bottom: 2rem;">
            <input type="text" class="form-login__input" placeholder="Titulo Obtenido" id="titulo_obtenido_<?php echo $contador_edu ?>" value="" required>
        </div>

        <div class='form-login__group' style='display: inline-flex; width: 100%;'>
            <div class='form-login__group' style='width: 48%; padding-right: 5%;'><input type='text' class='form-login__input' placeholder='Nombre de Institucion' id='nombre_institucion_<?php echo $contador_edu ?>' value='' required></div>
            <div class='form-login__group' style='width: 45%;'>
                <div class=' form-login__group'><select type='text' id="titulo_<?php echo $contador_edu ?>" class='form-login__input' placeholder='Nivel de estudio'>
                        <option>Tecnico</option>
                        <option>Tecnologo</option>
                        <option>Profesional</option>
                        <option>Diplomado</option>
                        <option>Maestria</option>
                        <option>Doctorado</option>
                        <option>Curso</option>
                    </select></div>
            </div>
        </div>
        <div class='form-login__group' style='display: inline-flex; width: 100%;'>
            <div class='form-login__group' style='width: 48%; padding-right: 5%;'>
                <select id="fecha_finalizacion_<?php echo $contador_edu ?>" type='text' class='form-login__input'>
                    <option>Cursando</option>
                    <option>Terminando Carrera</option>
                    <option>Finalizado</option>
                </select>
            </div>
            <div class='form-login__group' style='width: 45%;'><input type='date' id="encurso_estudiando_<?php echo $contador_edu ?>" class='form-login__input' placeholder='Fecha de Nacimiento' id='dash_fecha-nacimiento' value=''> </div>
        </div>
    </div>

</div>