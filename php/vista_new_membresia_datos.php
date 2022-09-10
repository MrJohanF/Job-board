<?php

include "db.php";


?>

<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Id membresia" id="db_idMembresia" value="" disabled>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Nombre membresia" id="db_mem_nombre" value="" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Ofertas Limite" id="db_mem_ofertas_limite" value="" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Ofertas destacadas" id="db_mem_ofertas_confidenciales" value="" required>
    </div>
</div>
<div class="form-login__group" style="display: inline-flex; width: 100%;">
    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
        <input type="text" class="form-login__input" placeholder="Ofertas urgentes" id="db_mem_ofertas_urgentes" value="" required>
    </div>
    <div class="form-login__group" style="width: 45%;">
        <input type="text" class="form-login__input" placeholder="Consultas base de datos" id="db_mem_consultas_basedatos" value="" required>
    </div>
</div>


<button onclick="btn_guardar_membresia_new()" name="login" type="submit" class="">Crear</button>



