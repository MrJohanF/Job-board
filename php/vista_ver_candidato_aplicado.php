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

$id_oferta = $_POST['id_oferta'];
$id_Empresa = $_POST['id_Empresa'];


?>

<div class="row">
    <ul id="tabs">

        <li><a id="tab1"><?php echo $lang['dash_manage_pending'] ?></a></li>
        <li><a onclick="seleccionado()" id="tab2"><?php echo $lang['dash_manage_selected'] ?></a></li>
        <li><a onclick="preseleccionado()" id="tab3"><?php echo $lang['dash_manage_pre_selected'] ?></a></li>
        <li><a onclick="descartado()" id="tab4"><?php echo $lang['dash_manage_discarded'] ?></a></li>
        <li><a onclick="archivado()" id="tab5"><?php echo $lang['dash_manage_archived'] ?></a></li>
        <li style="float: right;"><a onclick="graficas()" id="tab6"><?php echo $lang['dash_manage_candidates'] ?></a></li>

    </ul>
    <div class="container" id="tab1C">

        <?php

        $contador = 0;

        $enviar = "SELECT * FROM postulaciones INNER JOIN candidato ON postulaciones.Candidato_idCandidato = candidato.idCandidato INNER JOIN ciudad ON candidato.ciudad = ciudad.idCiudad WHERE Oferta_idOferta = $id_oferta AND estado_postulacion = '1'";
        $resul_enviar = mysqli_query($connection, $enviar);

        while ($row = mysqli_fetch_array($resul_enviar)) {

            $db_idCandidato = $row['idCandidato'];
            $db_nombre = $row['nombre'];
            $db_ciudad = $row['ciudad_general'];
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
            $db_estado_postulacion = $row['estado_postulacion'];
            $contador = $contador + 1;

        ?>

            <div id="result_<?php echo $contador ?>" class="row fbr">

                <div class="story">
                    <div class="row">
                        <div class="col-2-of-3">
                            <div class="content-left">
                                <div class="company_img">

                                    <?php

                                    $nombre_fichero_jpg = '../uploads/profile' . $db_idCandidato . '.jpg';
                                    $nombre_fichero_jpeg = '../uploads/profile' . $db_idCandidato . '.jpeg';
                                    $nombre_fichero_png = '../uploads/profile' . $db_idCandidato . '.png';
                                    $imagen = 0;
                                    if (file_exists($nombre_fichero_jpg)) {
                                        echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/profile" . $db_idCandidato . ".jpg' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                        $imagen = 1;
                                    }
                                    if (file_exists($nombre_fichero_jpeg)) {
                                        echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/profile" . $db_idCandidato . ".jpeg' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                        $imagen = 1;
                                    }
                                    if (file_exists($nombre_fichero_png)) {
                                        echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/profile" . $db_idCandidato . ".png' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                        $imagen = 1;
                                    }
                                    if ($imagen == 0) {
                                        if ($db_genero == 1) {
                                            echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/icon-man.png' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                        } else {
                                            echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/icon-woman.png' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                        }
                                    }
                                    ?>
                                </div>
                                <h3 class="title_company"><?php echo ucwords($db_nombre); ?> <?php echo ucwords($db_apellido); ?></h3>
                                <h4 class="title_company--sub"><?php echo $db_ciudad ?></h4>
                                <h5 class="title_country" style="height: 17rem;"><?php echo substr($db_descripcion, 0, 520);  ?></h5>
                                <div>
                                    <div class='tooltip'>
                                        <button form="grupo_perfiles" onclick="ver_perfiles(<?php echo $id_oferta ?>, <?php echo $db_idCandidato ?>, <?php echo $db_estado_postulacion ?>)" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><i class="fas fa-address-card"></i></button>
                                        <span style="top: 120%;" class='tooltiptext'>Ver detalles de perfil.</span>
                                    </div>
                                    <div class='tooltip'>
                                        <a href="#enviar_entrevista" onclick="enviar_interview(<?php echo $db_idCandidato ?>, '<?php echo $db_email ?>')" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><i class="fas fa-file-alt"></i></a>
                                        <span style="top: 120%;" class='tooltiptext'>Enviar entrevista personalizada.</span>
                                    </div>
                                    <select onchange="status(this, <?php echo $db_idCandidato ?>)" style="margin-left: 5rem;padding: 1rem;">
                                        <option value="1"><?php echo $lang['dash_manage_pending'] ?></option>
                                        <option value="2"><?php echo $lang['dash_manage_selected'] ?></option>
                                        <option value="3"><?php echo $lang['dash_manage_pre_selected'] ?></option>
                                        <option value="4"><?php echo $lang['dash_manage_discarded'] ?></option>
                                        <option value="5"><?php echo $lang['dash_manage_archived'] ?></option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="col-1-of-3">
                            <div class="content-right">

                                <div style="width: 45rem; transform: translateX(-7rem);padding-top: 1rem;">
                                    <div>
                                        <canvas id="myChart_<?php echo $contador ?>"></canvas>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>


                </div>

            </div>

            <?php

            $consulta1 = "SELECT * FROM habilidades_requerida_oferta WHERE Oferta_idOferta = $id_oferta ";
            $resul_consulta1 = mysqli_query($connection, $consulta1);


            $resultado1 = 0;
            $habilidad_generar_consulta = "";

            while ($row1 = mysqli_fetch_array($resul_consulta1)) {

                $db_idHabilidad = $row1['Habilidades_generales_idHabilidades_generales'];
                $db_habilidad_valor = $row1['valor'];
                $resultado1 = $resultado1 + $db_habilidad_valor;
                $habilidad_generar_consulta .= "" . $row1['Habilidades_generales_idHabilidades_generales'] . " OR ";
            }
            $habilidad_generar_consulta = substr($habilidad_generar_consulta, 0, -3);



            $consulta2 = "SELECT * FROM habilidades_candidato WHERE candidato_idCandidato = $db_idCandidato AND Habilidades_generales_idHabilidades_generales = $habilidad_generar_consulta";
            $resul_consulta2 = mysqli_query($connection, $consulta2);
            $resultado2 = 0;

            while ($row = mysqli_fetch_array($resul_consulta2)) {

                $db_idHabilidad = $row['Habilidades_generales_idHabilidades_generales'];
                $db_habilidad_valor = $row['valor'];
                $resultado2 = $resultado2 + $db_habilidad_valor;
            }

            $porcentaje = $resultado2 / $resultado1 * 100;

            if ($porcentaje >= 100) {
                $residuo = 0;
            } else {
                $residuo = $porcentaje - 100;
            }


            ?>

            <script>
                var ctx = document.getElementById('myChart_<?php echo $contador ?>').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'doughnut',

                    // The data for our dataset
                    data: {
                        labels: ['Afinidad'],
                        datasets: [{
                            label: 'Habilidades',
                            backgroundColor: ['#0c5cf5bd', '#d9d9d9'],

                            data: [<?php echo $porcentaje ?>, <?php echo $residuo ?>],
                            borderWidth: 1
                        }]
                    },

                    // Configuration options go here
                    options: {}

                });
            </script>


        <?php

        }

        ?>


    </div>
    <div class="container" id="tab2C">
        <div id="seleccionado_candidatos">

        </div>
    </div>
    <div class="container" id="tab3C">
        <div id="preseleccionado_candidatos">

        </div>
    </div>
    <div class="container" id="tab4C">
        <div id="descartado_candidatos">

        </div>
    </div>
    <div class="container" id="tab5C">
        <div id="archivado_candidatos">

        </div>
    </div>
    <div class="container" id="tab6C">
        <div id="graficas_candidatos">

        </div>
    </div>
</div>



<div class="popup" id="enviar_entrevista" style="background-color: rgba(0, 0, 0, 0.64);">
    <div class="popup__content" style="width: 30%; height: 25%;">
        <div class="popup__right" style="vertical-align: top;">
            <a href="#main" class="popup__close">&times;</a>
            <div id="panel_editar_interview">
            </div>
            <div id="panel_editar_respuesta" class="popup__right">
            </div>
        </div>
    </div>
</div>






<script>
    function ver_perfiles(idOferta, idCandidato, estado) {


        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('idOferta', idOferta);
        paqueteDeDatos.append('idCandidato', idCandidato);

        var url = 'profile.php?estado=' + estado + '&oferta=' + idOferta + '&page=1';
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="text" name="idOferta" value="' + idOferta + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();

    }


    function ver_candidatos_pendiente() {

        var idOferta = <?php echo $id_oferta ?>;

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('idOferta', idOferta);

        var request = new XMLHttpRequest();

        request.open("POST", "../profile.php");
        request.send(paqueteDeDatos);

        console.log(request);

    }
</script>



<script>
    function enviar_interview(candidato, correo) {

        var idEmpresa = <?php echo $id_Empresa ?>;
        var idOferta = <?php echo $id_oferta ?>;

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('id_oferta', idOferta);
        paqueteDeDatos.append('id_Empresa', idEmpresa);
        paqueteDeDatos.append('id_Candidato', candidato);
        paqueteDeDatos.append('correo_candidato', correo);


        $.ajax({
            type: "POST",
            url: "../php/vista_pupop_ver_entrevistas.php",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(objeto) {},
            success: function(data) {
                $("#panel_editar_interview").html(data);
            }
        })

    }
</script>


<script>
    function seleccionado() {

        var idOferta = <?php echo $id_oferta ?>;

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('id_oferta', idOferta);

        $.ajax({
            type: "POST",
            url: "../php/vista_ver_candidato_aplicado_seleccionado.php",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(objeto) {},
            success: function(data) {
                $("#seleccionado_candidatos").html(data);
            }
        })

    }
</script>

<script>
    function preseleccionado() {

        var idOferta = <?php echo $id_oferta ?>;

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('id_oferta', idOferta);

        $.ajax({
            type: "POST",
            url: "../php/vista_ver_candidato_aplicado_preseleccionado.php",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(objeto) {},
            success: function(data) {
                $("#preseleccionado_candidatos").html(data);
            }
        })

    }
</script>
<script>
    function archivado() {

        var idOferta = <?php echo $id_oferta ?>;

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('id_oferta', idOferta);

        $.ajax({
            type: "POST",
            url: "../php/vista_ver_candidato_aplicado_archivado.php",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(objeto) {},
            success: function(data) {
                $("#archivado_candidatos").html(data);
            }
        })

    }
</script>
<script>
    function descartado() {

        var idOferta = <?php echo $id_oferta ?>;

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('id_oferta', idOferta);

        $.ajax({
            type: "POST",
            url: "../php/vista_ver_candidato_aplicado_descartado.php",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(objeto) {},
            success: function(data) {
                $("#descartado_candidatos").html(data);
            }
        })

    }
</script>

<script>
    function graficas() {

        var idOferta = <?php echo $id_oferta ?>;
        var idEmpresa = <?php echo $id_Empresa ?>;

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('id_oferta', idOferta);
        paqueteDeDatos.append('id_empresa', idEmpresa);

        $.ajax({
            type: "POST",
            url: "../php/vista_ver_candidato_graficas.php",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(objeto) {},
            success: function(data) {
                $("#graficas_candidatos").html(data);
            }
        })

    }
</script>



<script>
    function status(elemto, idCandidato) {

        var contador = <?php echo $contador ?>;
        var idOferta = <?php echo $id_oferta ?>;
        var estado = $(elemto).val();


        var ob = {
            idOferta: idOferta,
            status: estado,
            idCandidato: idCandidato
        }

        if (estado == "1") {
            alert(estado);
        } else {
            $(elemto).parents(".fbr").remove();

            $.ajax({
                type: "POST",
                url: "../php/vista_ver_candidato_aplicado_save_status.php",
                data: ob,
                beforeSend: function(objeto) {},
                success: function(data) {}
            })

        }
    }
</script>



<script>
   


        $('#tabs li a').addClass('inactive');
        $('.container').hide();
        $('.container:first').show();



        $('#tabs li a').click(function() {
            var t = $(this).attr('id');
            if ($(this).hasClass('inactive')) { //this is the start of our condition 
                $('#tabs li a').addClass('inactive');
                $(this).removeClass('inactive');

                $('.container').hide();
                $('#' + t + 'C').fadeIn('slow');
            }
        });

      
</script>



<style>
    #tabs {

        width: 100%;
        height: 30px;
        border-bottom: solid 1px #CCC;
        padding-right: 2px;


    }

    a {
        cursor: pointer;
    }

    #tabs li {
        float: left;
        list-style: none;

        margin-right: 5px;

        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        outline: none;
    }

    #tabs li a {
        transition: padding .3s;
        font-family: Arial, Helvetica, sans-serif;
        font-size: small;
        font-weight: bold;
        color: #333;
        border-radius: 1rem;
        padding-top: 5px;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 8px;
        display: block;
        background: #ecdd00;

        text-decoration: none;
        outline: none;

    }

    #tabs li a.inactive {

        padding-top: 5px;
        font-weight: bold;
        padding-bottom: 8px;
        padding-left: 8px;
        padding-right: 8px;
        color: #FFF;
        background: #2962ff;
        outline: none;
        transition: padding .3s;

    }

    #tabs li a:hover,
    #tabs li a.inactive:hover {


        color: #002077;
        outline: none;
    }

    .container {

        clear: both;
        width: 100%;

        text-align: left;
        padding-top: 20px;

    }

    .container h2 {
        margin-left: 15px;
        margin-right: 15px;
        margin-bottom: 10px;
        color: #5685bc;
    }

    .container p {
        margin-left: 15px;
        margin-right: 15px;
        margin-top: 10px;
        margin-bottom: 10px;
        line-height: 1.3;
        font-size: small;
    }

    .container ul {
        margin-left: 25px;
        font-size: small;
        line-height: 1.4;
        list-style-type: disc;
    }

    .container li {
        padding-bottom: 5px;
        margin-left: 5px;
    }
</style>