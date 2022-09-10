<?php

session_start();

if (isset($_POST["lang"])) {

    $lang = $_POST["lang"];
    if (!empty($lang)) {
        $_SESSION["lang"] = $lang;
    }
}

if (isset($_SESSION["lang"])) {
    $lang = $_SESSION["lang"];
    require "../lang/" . $lang . ".php";
} else {
    require "../lang/es.php";
}

include "db.php";


$id_entrevista = $_POST['id_entrevista'];
$id_empresa = $_POST['idEmpresa'];
?>


<div class="form-login__group">
    <h3 class="text-animation"><?php echo $lang['dash_interview_custom_questions']?></h3>
</div>
<div id="container_entrevista_formulario">




    <?php if ($id_entrevista == "nuevo") : ?>


        <?php
        $enviar = "SELECT * FROM entrevista_pregunta WHERE entrevista_idEntrevista = $id_entrevista ";
        $resul_enviar = mysqli_query($connection, $enviar);
        $contador_formulario = 0;
        ?>

        <div class="form-login__group">
            <h3 class="text-animation"><?php echo $lang['dash_interview_title_interview']?></h3>
        </div>

        <input type='text' class='form-login__input' id='entrevista_title' value='' required>

        <div style="margin-top: 1rem;">
            <button style="font-size: 1.2rem; height: 1.8rem; width: 1rem;" onclick="save_preguntas_entrevistas()" class="btn-cuadrado-submit btn-cuadrado-submit--blue"><i class="fas fa-save"></i></button>
            <input style="font-size: 1.2rem; height: 1.8rem;" type="button" onclick="add_pregunta_entrevista()" class="btn-cuadrado-submit btn-cuadrado-submit--blue" value="+">
            <input style="font-size: 1.2rem; height: 1.8rem;" type="button" onclick="delete_pregunta_entrevista()" class="btn-cuadrado-submit btn-cuadrado-submit--red" value="-">
        </div>

        <div class="form-login__group" style="margin-top: 1rem;">
            <h3 class="text-animation"><?php echo $lang['dash_interview_questions']?></h3>
        </div>

        <script>
            function save_preguntas_entrevistas() {

                var ddData = [];
                var idEntrevista = document.getElementById("entrevista_title").value;
                var id_empresa = <?php echo $id_empresa ?>;


                for (step = 1; step <= total_preguntas_entrevista; step++) {


                    // Creas un nuevo objeto.
                    var objeto = {
                        pregunta: document.getElementById("pregunta_" + step).value
                    }
                    //Lo agregas al array.
                    ddData.push(objeto);

                }

                $.ajax({
                    type: "POST",
                    url: "../php/save_preguntas_entrevista.php",
                    data: {
                        'array': JSON.stringify(ddData),
                        'idEntrevista': idEntrevista,
                        'idEmpresa': id_empresa
                    },
                    beforeSend: function(objeto) {},
                    success: function(data) {
                        window.location = "dashboard_empleador.php#main";
                        $("#btn_entrevista").click();
                    }
                })

            }
        </script>


    <?php else : ?>


        <?php

        $enviar = "SELECT * FROM entrevista_pregunta WHERE entrevista_idEntrevista = $id_entrevista ";
        $resul_enviar = mysqli_query($connection, $enviar);
        $contador_formulario = 0;

        while ($row = mysqli_fetch_array($resul_enviar)) {

            $idPregunta = $row['idPregunta'];
            $pregunta = $row['pregunta'];
            $contador_formulario = $contador_formulario + 1;
        ?>

            <input type='text' class='form-login__input' id='pregunta_<?php echo $contador_formulario ?>' value='<?php echo $pregunta ?>' required>

        <?php

        }
        ?>
</div>
<div>
    <button style="font-size: 1.2rem; height: 1.8rem; width: 1rem;" onclick="save_preguntas_entrevistas()" class="btn-cuadrado-submit btn-cuadrado-submit--blue"><i class="fas fa-save"></i></button>
    <input style="font-size: 1.2rem; height: 1.8rem; width: 1rem;" type="button" onclick="add_pregunta_entrevista(<?php echo $contador_formulario ?>)" class="btn-cuadrado-submit btn-cuadrado-submit--blue" value="+">
    <input style="font-size: 1.2rem; height: 1.8rem; width: 1rem;" type="button" onclick="delete_pregunta_entrevista()" class="btn-cuadrado-submit btn-cuadrado-submit--red" value="-">
</div>


<script>
    function save_preguntas_entrevistas() {

        var ddData = [];
        var idEntrevista = <?php echo $id_entrevista ?>;




        for (step = 1; step <= total_preguntas_entrevista; step++) {


            // Creas un nuevo objeto.
            var objeto = {
                pregunta: document.getElementById("pregunta_" + step).value
            }
            //Lo agregas al array.
            ddData.push(objeto);

        }

        $.ajax({
            type: "POST",
            url: "../php/save_preguntas_entrevista.php",
            data: {
                'array': JSON.stringify(ddData),
                'idEntrevista': idEntrevista
            },
            beforeSend: function(objeto) {},
            success: function(data) {
                window.location = "dashboard_empleador.php#main";
            }
        })

    }
</script>



<?php endif; ?>


<script>
    var total_preguntas_entrevista = <?php echo $contador_formulario ?>;

    function add_pregunta_entrevista(total_pregunta) {



        total_preguntas_entrevista = total_preguntas_entrevista + 1;

        var data = "<input type='text' class='form-login__input' id='pregunta_" + total_preguntas_entrevista + "' value='' required>";
        document.getElementById("container_entrevista_formulario").insertAdjacentHTML("beforeend", data);

    }


    function delete_pregunta_entrevista() {



        $("#pregunta_" + total_preguntas_entrevista).remove();
        total_preguntas_entrevista = total_preguntas_entrevista - 1;
        console.log(total_preguntas_entrevista);
    }
</script>