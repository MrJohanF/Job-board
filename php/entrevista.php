<div style="display: grid;grid-template-columns: repeat(auto-fill,minmax(130px,1fr));grid-gap: 10px;">
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

    $id_empresa = $_POST['idEmpresa'];



    $enviar = "SELECT * FROM entrevista WHERE empresa_idEmpresa = $id_empresa ";
    $resul_enviar = mysqli_query($connection, $enviar);
    $contador = 0;

    while ($row = mysqli_fetch_array($resul_enviar)) {

        $db_idEntrevista  = $row['idEntrevista'];
        $db_entrevista_nombre = $row['entrevista_nombre'];
        $db_empresa_idEmpresa = $row['empresa_idEmpresa'];
        $contador = $contador + 1;

    ?>



        <div class="fbra" style="display: flex;flex-direction: column; height: auto; text-align: center;">
            <div style="flex: 1 1 auto; padding: 10px;">
                <a onclick="borrar_interview(this, <?php echo $db_idEntrevista ?>)" style="color: #ff4c4c; font-size: 2rem; position: absolute; margin-top: -1rem; margin-left: -4rem; cursor: pointer;"><i class="fas fa-times-circle"></i></a>
                <a onclick="crear_formulario_entrevista(<?php echo $db_idEntrevista ?>)" href="#popup_entrevista" style="color: #4a20df; font-size: 8rem; margin-top: -4rem;"><i class="fas fa-file-alt"></i></a>
                <h3 class="login__subtitle" style="font-size: 1.3rem;"><?php echo $db_entrevista_nombre ?></h3>
            </div>

        </div>



    <?php

    }

    ?>

    <div style="display: flex;flex-direction: column; height: auto; text-align: center;">
        <div style="flex: 1 1 auto; padding: 10px;">
            <a onclick="crear_formulario_entrevista('nuevo')" href="#popup_entrevista" style="color: #64646445; font-size: 8rem; margin-top: -4rem;"><i class="fas fa-file-medical"></i></a>
            <h3 class="login__subtitle" style="font-size: 1.3rem; color: #64646499; font-weight: 400;"><?php echo $lang['dash_interview_add'] ?></h3>
        </div>

    </div>

</div>


<script>
    var idEmpresa = "<?php echo $id_empresa ?>";

    function crear_formulario_entrevista(id_entrevista) {



        var ob = {
            id_entrevista: id_entrevista,
            idEmpresa: idEmpresa
        }

        $.ajax({
            type: "POST",
            url: "../php/vista_crear_entrevista.php",
            data: ob,
            beforeSend: function(objeto) {

            },
            success: function(data) {
                $("#panel_entrevista").html(data);
            }
        });
    }


    function borrar_interview(elemtno, idEntrevista) {
        $(elemtno).parents(".fbra").remove();

        var ob = {
            id_entrevista: idEntrevista,
        }


        $.ajax({
            type: "POST",
            url: "../php/delete_entrevista.php",
            data: ob,
            beforeSend: function(objeto) {

            },
            success: function(data) {

            }
        });

    }
</script>