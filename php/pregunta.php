<?php

include "db.php";

$contador_pregunta = $_POST['contador_pregunta'];


?>

<!-- full Block -->
<div class="form-login__group" id="input_pregunta_<?php echo $contador_pregunta ?>">
    <input type="text" class="form-login__input" required placeholder="Pregunta personalizada" id="pregunta_<?php echo $contador_pregunta ?>">
</div>