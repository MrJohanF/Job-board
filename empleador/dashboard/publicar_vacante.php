<section class="edit-profile" style="padding-bottom: 10rem;">
    <div class="row">

        <div class="col-1-of-3">


            <h3 class="option-sub-tabs"><?php echo $lang['dash_post_job_posting'] ?></h3>


        </div>


        <div class="col-2-of-3">

            <div id="step-1" class="sub-tabcontent" style="display: block;">

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_company_details'] ?></h3>
                </div>


                <div style="display: inline-flex;">

                    <div>

                        <div class="form-login__group">
                            <input type="checkbox" id="func_ocultar_nombre">
                            <label style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem; padding-left: 0.8rem;" for="func_ocultar_nombre"><?php echo $lang['dash_post_hide_company_name'] ?></label><br>
                        </div>
                        <div class="form-login__group">
                            <input type="checkbox" id="func_ocultar_whatsapp">
                            <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem;  padding-left: 0.8rem;" for="func_ocultar_whatsapp"><?php echo $lang['dash_post_hide_number_whatsapp'] ?></label><br>
                        </div>

                    </div>

                    <div style="padding-left: 5rem;">





                        <?php

                        //--------------------------------------------------------------- consulta membresia


                        $current_user_membresia = $_SESSION['e_membresia_empresa'];

                        $consulta_membresia = "SELECT * FROM `membresia_empresa` WHERE idMembresia = $current_user_membresia";
                        $resultado_membresia = mysqli_query($connection, $consulta_membresia);

                        $row_membresia = mysqli_fetch_array($resultado_membresia);

                        $idMembresia = $row_membresia['idMembresia'];
                        $mem_nombre = $row_membresia['mem_nombre'];
                        $mem_ofertas_limite = $row_membresia['mem_ofertas_limite'];
                        $mem_ofertas_confidenciales = $row_membresia['mem_ofertas_confidenciales'];
                        $mem_ofertas_urgentes = $row_membresia['mem_ofertas_urgentes'];

                        //--------------------------------------------------------------- verificar recopilador de insersion de ofertas

                        $idEmpresa_session = $_SESSION['e_idEmpresa'];

                        $verificar_compilacion_consulta = "SELECT * FROM `compila_datos_membresia` WHERE `compila_datos_membresia`.idEmpresa_empresa = $idEmpresa_session";
                        $resul_enviar = mysqli_query($connection, $verificar_compilacion_consulta);

                        $row_compile = mysqli_fetch_array($resul_enviar);

                        $idCompilador = $row_compile['idCompilador'];
                        $com_ofertas_publicadas = $row_compile['com_ofertas_publicadas'];
                        $com_ofertas_confidenciales = $row_compile['com_ofertas_confidenciales'];
                        $com_ofertas_urgentes = $row_compile['com_ofertas_urgentes'];
                        $com_consultas_basedatos = $row_compile['com_consultas_basedatos'];


                        if ($_SESSION['e_membresia_empresa'] > "1" && $com_ofertas_urgentes < $mem_ofertas_urgentes) : ?>

                            <div class="form-login__group">
                                <input class="only-one" type="checkbox" id="func_urgente">
                                <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem; padding-left: 1rem;" for="func_urgente"><?php echo $lang['dash_post_urgent'] ?></label><br>
                            </div>

                        <?php endif; ?>


                        <?php
                        if ($_SESSION['e_membresia_empresa'] > "1" && $com_ofertas_confidenciales < $mem_ofertas_confidenciales) : ?>

                            <div class="form-login__group">
                                <input class="only-one" type="checkbox" id="func_resaltar">
                                <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem; padding-left: 1rem;" for="func_resaltar"><?php echo $lang['dash_post_outstanding'] ?></label><br>

                            </div>

                        <?php endif; ?>



                        <script>
                            $(document).ready(function() {
                                var cantidadMaxima = 1;
                                // Evento que se ejecuta al soltar una tecla en el input
                                $("#cantidad").keydown(function() {
                                    $("input[class=only-one]").prop('checked', false);
                                    $("#seleccionados").html("0");
                                });

                                // Evento que se ejecuta al pulsar en un checkbox
                                $("input[class=only-one]").change(function() {

                                    // Cogemos el elemento actual
                                    var elemento = this;
                                    var contador = 0;

                                    // Recorremos todos los checkbox para contar los que estan seleccionados
                                    $("input[class=only-one]").each(function() {
                                        if ($(this).is(":checked"))
                                            contador++;
                                    });



                                    // Comprovamos si supera la cantidad máxima indicada
                                    if (contador > cantidadMaxima) {


                                        swal("Solo puedes seleccionar una opcion!", "Advertencia!", "warning").then((value) => {

                                        });

                                        // Desmarcamos el ultimo elemento
                                        $(elemento).prop('checked', false);
                                        contador--;
                                    }

                                    $("#seleccionados").html(contador);
                                });
                            });
                        </script>

                    </div>




                </div>


                <div style="padding-top: 1rem;">
                    <h3 class="text-animation"><?php echo $lang['dash_post_offer_title'] ?></h3>
                </div>


                <!-- full Block -->
                <div class="form-login__group">
                    <input type="text" class="form-login__input" placeholder="<?php echo $lang['dash_post_offer_title'] ?>" id="titulo_oferta" value="" required>
                </div>

                <div style="padding-top: 1rem;">
                    <h3 class="text-animation"><?php echo $lang['dash_post_description_vacancy'] ?></h3>
                </div>
                <textarea class="formtext" id="descripcion_oferta" placeholder="<?php echo $lang['dash_post_description_vacancy'] ?>" style="width: 97.7%; margin-bottom: 2rem; padding-top: 1rem; padding-left: 1rem;" required minlength="2"></textarea>






                <style>
                    .progress {
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        display: table;
                        table-layout: fixed;
                        width: 100%;
                        color: darken(#DFE3E4, 33%);
                        font-family: 'Poppins', sans-serif;
                        font-weight: 300;


                    }

                    .progress>li {
                        position: relative;
                        display: table-cell;
                        text-align: center;
                        font-size: 0.8em;
                    }

                    .progress>li:before {
                        content: attr(data-step);
                        display: block;
                        margin: 0 auto;
                        background: #DFE3E4;
                        width: 3em;
                        height: 3em;
                        text-align: center;
                        margin-bottom: 0.25em;
                        line-height: 3em;
                        border-radius: 100%;
                        position: relative;
                        z-index: 1000;
                    }

                    .progress>li:after {
                        content: '';
                        position: absolute;
                        display: block;
                        background: #DFE3E4;
                        width: 100%;
                        height: 0.5em;
                        top: 1.25em;
                        left: 50%;
                        margin-left: 1.5em\9;
                        z-index: -1;
                    }

                    .progress>li:last-child:after {
                        display: none;
                    }

                    .progress>li.is-complete {
                        color: #2962ff;
                    }

                    .progress>li.is-complete:before,
                    .progress>li.is-complete:after {
                        color: #FFF;
                        background: #2962ff;
                    }


                    .progress>li.is-active {
                        color: #333;
                    }

                    .progress>li.is-active:before {
                        color: #333;
                        background: #ecdd00;
                    }



                    .progress--medium {
                        font-size: 1.5em;
                    }

                    .progress--large {
                        font-size: 2em;
                    }
                </style>


                <!-- 
                <ol class="progress">
                    <li class="is-active" data-step="1">
                        Step 1
                    </li>
                    <li data-step="2">
                        Step 2
                    </li>
                    <li data-step="3" class="progress__last">
                        Step 3
                    </li>
                </ol>

                <ol class="progress progress--medium">
                    <li class="is-complete" data-step="1">
                        Step 1
                    </li>
                    <li class="is-active" data-step="2">
                        Step 2
                    </li>
                    <li data-step="3" class="progress__last">
                        Step 3
                    </li>
                </ol> -->

                <ol class="progress progress--large">
                    <li class="is-active" data-step="1">
                        <?php echo $lang['dash_post_basic_details'] ?>
                    </li>
                    <li data-step="2">
                        <?php echo $lang['dash_post_informative_data'] ?>
                    </li>
                    <li data-step="3">
                        <?php echo $lang['dash_post_categories'] ?>
                    </li>
                    <li data-step="4" class="progress__last">
                        <?php echo $lang['dash_post_complete'] ?>
                    </li>
                </ol>




                <div style="display: inline-flex; width: 100%;">

                    <div style="text-align: left; font-size: 3rem; padding-top: 4rem; flex: 1;">
                        <a><i style="color: gray;" class="fas fa-arrow-circle-left"></i></a>
                    </div>

                    <div style="text-align: right; font-size: 3rem; padding-top: 4rem; flex: 1;">
                        <a href="#" onclick="checkfields_sections_first()"><i style="color: darkblue;" class="fas fa-arrow-circle-right"></i></a>
                    </div>

                </div>





                <script>
                    function checkfields_sections_first() {



                        var titulo_oferta = $("#titulo_oferta").val();
                        var descripcion_oferta = $("#descripcion_oferta").val();



                        let texto_emptyfield;


                        if (titulo_oferta == "" || descripcion_oferta == "") {

                    
                            swal("Ingresa un titulo y descripcion!", "Advertencia!", "warning").then((value) => {});


                        } else {

                            openMain(event, 'step-2');
                        }


                    }
                </script>



            </div>

            <div id="step-2" class="sub-tabcontent">


                <div class="form-login__group" style="display: inline-flex; width: 100%;">


                    <select id="nivel_experiencia_oferta" class="form-login__input" style="width: 44%; padding-right: 5%;" required>
                        <option>1 <?php echo $lang['dash_post_year'] ?></option>
                        <option>2 <?php echo $lang['dash_post_year'] ?></option>
                        <option>3 <?php echo $lang['dash_post_year'] ?></option>
                        <option>4 <?php echo $lang['dash_post_year'] ?></option>
                        <option>5 <?php echo $lang['dash_post_year'] ?></option>
                        <option>6 <?php echo $lang['dash_post_year'] ?></option>
                        <option>7 <?php echo $lang['dash_post_year'] ?></option>
                        <option>8 <?php echo $lang['dash_post_year'] ?></option>
                        <option>9 <?php echo $lang['dash_post_year'] ?></option>
                        <option>10 <?php echo $lang['dash_post_year'] ?></option>
                    </select>

                    <div class="form-login__group" style="width: 45%;">
                        <input type="number" class="form-login__input" placeholder="<?php echo $lang['dash_post_Number_vacancies_available'] ?>" id="numero_vacantes_oferta" value="" required>
                    </div>
                </div>



                <div style="position: relative;" class="form-login__group">
                    <span style="position: absolute; left: 3%; top: 39%; font-size: 1.1rem; color: #5d5d5d;" class="input-group-addon" id="sizing-addon2"><i class="fas fa-dollar-sign"></i></span>
                    <input style="padding-left: 4rem; box-sizing: border-box; width: 99%;" type="text" class="form-login__input" placeholder="<?php echo $lang['dash_post_monthly_salary'] ?>" id="salario_mensual_oferta" value="" required>
                </div>


                <div class="form-login__group">
                    <select class="form-login__input" style="margin-bottom: 2rem;" id="estudios_minimos_oferta" required>
                        <option><?php echo $lang['dash_post_secondary_basic'] ?></option>
                        <option><?php echo $lang['dash_post_technical'] ?></option>
                        <option><?php echo $lang['dash_post_technologist'] ?></option>
                        <option><?php echo $lang['dash_post_professional'] ?></option>
                        <option><?php echo $lang['dash_post_masters_degree'] ?></option>
                        <option><?php echo $lang['dash_post_doctorate'] ?></option>
                    </select>
                </div>



                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_hiring_date'] ?></h3>
                </div>

                <!-- full Block -->
                <div class="form-login__group">
                    <input type="date" class="form-login__input" placeholder="<?php echo $lang['dash_post_hiring_date'] ?>" id="fecha_contratacion_oferta" value="" required>
                </div>

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_way_working'] ?></h3>
                </div>

                <div class="form-login__group">
                    <div>
                        <input type="radio" id="cuenta_presencial" name="dash_tipo-work" value="3" required>
                        <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.5rem;  padding-left: 0.8rem;" for="cuenta_presencial"><?php echo $lang['dash_post_face_to_face'] ?></label><br>
                    </div>
                    <div style="margin-top: 1rem;">
                        <input type="radio" id="cuenta_remoto" name="dash_tipo-work" value="4" required>
                        <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.5rem;  padding-left: 0.8rem;" for="cuenta_remoto"><?php echo $lang['dash_post_remote'] ?></label><br>
                    </div>

                </div>


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_shift'] ?></h3>
                </div>

                <select class="form-login__input" style="margin-bottom: 2rem;" id="jornada_laboral_oferta" required>
                    <option><?php echo $lang['dash_post_party_time'] ?></option>
                    <option><?php echo $lang['dash_post_full_time'] ?></option>
                </select>


                <ol class="progress progress--large">
                    <li class="is-complete" data-step="1">
                        <?php echo $lang['dash_post_basic_details'] ?>
                    </li>
                    <li class="is-active" data-step="2">
                        <?php echo $lang['dash_post_informative_data'] ?>
                    </li>
                    <li data-step="3">
                        <?php echo $lang['dash_post_categories'] ?>
                    </li>
                    <li data-step="4" class="progress__last">
                        <?php echo $lang['dash_post_complete'] ?>
                    </li>
                </ol>




                <div style="display: inline-flex; width: 100%;">

                    <div style="text-align: left; font-size: 3rem; padding-top: 4rem; flex: 1;">
                        <a href="#" onclick="openMain(event, 'step-1')"><i style="color: darkblue;" class="fas fa-arrow-circle-left"></i></a>
                    </div>

                    <div style="text-align: right; font-size: 3rem; padding-top: 4rem; flex: 1;">
                        <a href="#" onclick="checkfields_sections_second()"><i style="color: darkblue;" class="fas fa-arrow-circle-right"></i></a>
                    </div>

                </div>


                <script>
                    $("#salario_mensual_oferta").on({
                        "focus": function(event) {
                            $(event.target).select();
                        },
                        "keyup": function(event) {
                            $(event.target).val(function(index, value) {
                                return value.replace(/\D/g, "")
                                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                            });
                        }
                    });

                    function checkfields_sections_second() {



                        var numero_vacantes_oferta = $("#numero_vacantes_oferta").val();
                        var salario_mensual_oferta = $("#salario_mensual_oferta").val();
                        var fecha_contratacion_oferta = $("#fecha_contratacion_oferta").val();
                        var tipo_trabajo = $('input[name="dash_tipo-work"]').is(':checked');


                        let texto_emptyfield;


                        if (numero_vacantes_oferta == "" || salario_mensual_oferta == "" || fecha_contratacion_oferta == "" || tipo_trabajo == false) {

                            texto_emptyfield = "<?php echo $lang['dash_post_skills_alert_fields'] ?>";

                            swal(texto_emptyfield, "Advertencia!", "warning").then((value) => { });

                        } else {

                            openMain(event, 'step-3');
                        }


                    }
                </script>


            </div>


            <div id="step-3" class="sub-tabcontent">


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_type_contract'] ?></h3>
                </div>

                <select class="form-login__input" style="margin-bottom: 2rem;" id="tipo_contrato_oferta" required>
                    <?php include "php/db.php" ?>

                    <?php




                    $request_country = "SELECT * FROM tipos_contrato;";



                    $resul_country = mysqli_query($connection, $request_country);
                    if (!$resul_country) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_array($resul_country)) {
                        $db_idTipo_Contrato = $row['idTipo_contrato'];
                        $db_tipo_contrato = $row['tipo_contrato'];

                    ?>
                        <option value="<?php echo $db_idTipo_Contrato ?>"><?php echo $db_tipo_contrato ?></option>
                    <?php
                    }
                    ?>
                </select>

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_language'] ?></h3>
                </div>

                <div class="form-login__group">
                    <select class="form-login__input" id="lenguaje_oferta" required>
                        <?php include "php/db.php" ?>

                        <?php

                        $request_categoria = "SELECT * FROM lenguaje_general;";

                        $resul_categoria = mysqli_query($connection, $request_categoria);
                        if (!$resul_categoria) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_categoria)) {
                            $db_idLenguaje = $row['idLenguaje'];
                            $db_nombre_lenguaje = $row['Nombre'];

                        ?>
                            <option value="<?php echo $db_idLenguaje ?>" id="lang_<?php echo $db_idLenguaje ?>"><?php echo $db_nombre_lenguaje ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_categories'] ?></h3>
                </div>

                <div class="form-login__group">
                    <select class="form-login__input" id="categoria_oferta" required>
                        <?php include "php/db.php" ?>

                        <?php


                        $request_categoria = "SELECT * FROM categoria_requerido ORDER BY categoria_requerido.idCategoria  = 3 DESC;";



                        $resul_categoria = mysqli_query($connection, $request_categoria);
                        if (!$resul_categoria) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_categoria)) {
                            $db_idCategoria = $row['idCategoria'];
                            $db_nombre_categoria = $row['nombre_categoria'];

                        ?>
                            <option value="<?php echo $db_idCategoria ?>" id="cate_<?php echo $db_idCategoria ?>"><?php echo $db_nombre_categoria ?></option>
                        <?php
                        }
                        ?>


                    </select>
                </div>

                <ol class="progress progress--large">
                    <li class="is-complete" data-step="1">
                        <?php echo $lang['dash_post_basic_details'] ?>
                    </li>
                    <li class="is-complete" data-step="2">
                        <?php echo $lang['dash_post_informative_data'] ?>
                    </li>
                    <li class="is-active" data-step="3">
                        <?php echo $lang['dash_post_categories'] ?>
                    </li>
                    <li data-step="4" class="progress__last">
                        <?php echo $lang['dash_post_complete'] ?>
                    </li>
                </ol>



                <div style="display: inline-flex; width: 100%;">

                    <div style="text-align: left; font-size: 3rem; padding-top: 4rem; flex: 1;">
                        <a href="#" onclick="openMain(event, 'step-2')"><i style="color: darkblue;" class="fas fa-arrow-circle-left"></i></a>
                    </div>

                    <div style="text-align: right; font-size: 3rem; padding-top: 4rem; flex: 1;">
                        <a href="#" onclick="openMain(event, 'step-4')"><i style="color: darkblue;" class="fas fa-arrow-circle-right"></i></a>
                    </div>

                </div>



            </div>


            <div id="step-4" class="sub-tabcontent">


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_select_country'] ?></h3>
                </div>

                <div class="form-login__group">
                    <select class="form-login__input" id="ubicacion2" onchange="filtroPais2()" required>
                        <option value="10">------------</option>
                        <?php include "php/db.php" ?>

                        <?php

                        $id_pais = $_SESSION['s_id_pais'];

                        if (empty($id_pais)) {
                            $request_country = "SELECT * FROM pais;";
                        } else {
                            $request_country = "SELECT * FROM pais ORDER BY pais.idPais = $id_pais DESC;";
                        }


                        $resul_country = mysqli_query($connection, $request_country);
                        if (!$resul_country) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_country)) {
                            $db_idPais = $row['idPais'];
                            $db_nombre_pais = $row['nombre_pais'];

                        ?>
                            <option value="<?php echo $db_idPais ?>" id="<?php echo $db_idPais ?>"><?php echo $db_nombre_pais ?></option>
                        <?php
                        }
                        ?>


                    </select>
                </div>

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_edit_select_city'] ?></h3>
                </div>



                <script>
                    function filtroPais2() {
                        var select = document.getElementById("ubicacion2"); /*Obtener el SELECT */
                        var paisSeleccion1 = select.options[select.selectedIndex].id; /* Obtener el valor */
                        var oc = {
                            paisSeleccion1: paisSeleccion1
                        };

                        $.ajax({
                                type: "POST",
                                url: '../php/filtro_ciudad.php',
                                data: oc,
                                beforeSend: function() {

                                },
                                success: function(data) {

                                    $("#ubicacion_ciudad1").html(data);
                                }
                            })
                            .always(function() {
                                console.log("complete");
                            });
                    }
                </script>





                <div class="form-login__group">
                    <select class="form-login__input" id="ubicacion_ciudad1" required>

                    </select>
                </div>






                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_custom_question'] ?></h3>
                </div>

                <!-- middle Block -->
                <div id="container_pregunta">
                </div>

                <div class="form-login__group" style="margin-top: 2rem;">

                    <div>
                        <input style="background-color: #303fc4;" type="button" onclick="add_pregunta()" class="btn-cuadrado-submit btn-cuadrado-submit--green" value="+">
                        <input style="background-color: #f3e522; color: #333;" type="button" onclick="delete_pregunta()" class="btn-cuadrado-submit btn-cuadrado-submit--red" value="-">
                    </div>

                </div>




                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_skills_required'] ?></h3>
                </div>




                <!-- middle Block -->
                <div id="container_skills">
                </div>

                <div class="form-login__group" style="margin-top: 2rem; margin-bottom: 7rem;">

                    <div>
                        <input style="background-color: #303fc4;" type="button" onclick="add_skills()" class="btn-cuadrado-submit btn-cuadrado-submit--green" value="+">
                        <input style="background-color: #f3e522; color: #333;" type="button" onclick="delete_skills()" class="btn-cuadrado-submit btn-cuadrado-submit--red" value="-">
                    </div>

                </div>

                <div id="modal" class="modal">
                    <div style="padding: 2rem;">
                        <h1 style="font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 1.6rem; color: #4a4a4a;">
                            Recuerda completar tu informacion laboral, cuando completes tu perfil laboral
                            nos pondremos en contacto contigo para verificar tu cuenta, una vez tu cuenta
                            sea verificada, tus ofertas laborales seran publicadas.
                        </h1>
                    </div>

                </div>



                <script>
                    var contador = 0;
                    var contador_pregunta = 0;
                    var idEmpresa = <?php echo $_SESSION['e_idEmpresa'] ?>;

                    function add_skills() {
                        try {

                            contador = contador + 1;

                            var ob = {
                                contador: contador
                            };


                            $.ajax({
                                type: "POST",
                                url: "../php/skills.php",
                                data: ob,

                                beforeSend: function(objeto) {

                                },
                                success: function(data) {
                                    document.getElementById("container_skills").insertAdjacentHTML("beforeend", data);

                                    console.log(contador);
                                }
                            })



                        } catch (error) {

                        }
                    }


                    function add_pregunta() {
                        try {

                            contador_pregunta = contador_pregunta + 1;

                            var ob = {
                                contador_pregunta: contador_pregunta
                            };


                            $.ajax({
                                type: "POST",
                                url: "../php/pregunta.php",
                                data: ob,

                                beforeSend: function(objeto) {

                                },
                                success: function(data) {
                                    document.getElementById("container_pregunta").insertAdjacentHTML("beforeend", data);

                                    console.log(contador);
                                }
                            })



                        } catch (error) {

                        }
                    }

                    function delete_skills() {
                        $("#skill_" + contador).remove();
                        contador = contador - 1;
                        console.log(contador);
                    }

                    function delete_pregunta() {
                        $("#input_pregunta_" + contador_pregunta).remove();
                        contador_pregunta = contador_pregunta - 1;
                        console.log(contador_pregunta);
                    }


                    function add_oferta(contador, contador2) {


                        var ddData = [];
                        var ddData2 = [];
                        var hoy = new Date();
                        var expira = new Date();
                        var dias = 60;
                        var fecha = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
                        var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
                        expira.setDate(expira.getDate() + dias)
                        fecha_expira = expira.getFullYear() + '-' + (expira.getMonth() + 1) + '-' + expira.getDate();
                        var fechaYHora = fecha + ' ' + hora;


                        var func_ocultar_nombre = $("#func_ocultar_nombre").is(":checked");
                        var func_ocultar_whatsapp = $("#func_ocultar_whatsapp").is(":checked");
                        var func_resaltar = $("#func_resaltar").is(":checked");
                        var func_urgente = $("#func_urgente").is(":checked");
                        var titulo_oferta = $("#titulo_oferta").val();
                        var descripcion_oferta = $("#descripcion_oferta").val();
                        var nivel_experiencia_oferta = $("#nivel_experiencia_oferta").val();
                        var numero_vacantes_oferta = $("#numero_vacantes_oferta").val();
                        var salario_mensual_oferta = $("#salario_mensual_oferta").val();
                        var estudios_minimos_oferta = $("#estudios_minimos_oferta").val();
                        var fecha_contratacion_oferta = $("#fecha_contratacion_oferta").val();
                        var tipo_trabajo_oferta = $('input[name="dash_tipo-work"]:checked').val();
                        var jornada_laboral_oferta = $("#jornada_laboral_oferta").val();
                        var tipo_contrato_oferta = $("#tipo_contrato_oferta").val();
                        var categoria_oferta = $("#categoria_oferta").val();
                        var ciudad_oferta = $("#ubicacion_ciudad1").val();
                        var fecha_publicacion_oferta = fechaYHora;
                        var fecha_expiracion_oferta = fecha_expira;
                        var lenguaje_oferta = $("#lenguaje_oferta").val();




                        var paqueteDeDatos = new FormData();

                        for (step = 1; step <= contador; step++) {



                            var objeto = {

                                habilidad: document.getElementById("skill_selected_" + step).value,
                                valor: document.getElementById("valor_selected_" + step).value

                            }

                            //agregas al array.
                            ddData.push(objeto);

                        }


                        for (step = 1; step <= contador2; step++) {

                            var objeto = {

                                pregunta: document.getElementById("pregunta_" + step).value,


                            }

                            //agregas al array.
                            ddData2.push(objeto);

                        }

                        paqueteDeDatos.append('array', JSON.stringify(ddData));
                        paqueteDeDatos.append('array2', JSON.stringify(ddData2));
                        paqueteDeDatos.append('idEmpresa', idEmpresa);
                        paqueteDeDatos.append('func_ocultar_nombre', func_ocultar_nombre);
                        paqueteDeDatos.append('func_ocultar_whatsapp', func_ocultar_whatsapp);
                        paqueteDeDatos.append('func_resaltar', func_resaltar);
                        paqueteDeDatos.append('func_urgente', func_urgente);
                        paqueteDeDatos.append('titulo_oferta', titulo_oferta);
                        paqueteDeDatos.append('descripcion_oferta', descripcion_oferta);
                        paqueteDeDatos.append('nivel_experiencia_oferta', nivel_experiencia_oferta);
                        paqueteDeDatos.append('numero_vacantes_oferta', numero_vacantes_oferta);
                        paqueteDeDatos.append('salario_mensual_oferta', salario_mensual_oferta);
                        paqueteDeDatos.append('estudios_minimos_oferta', estudios_minimos_oferta);
                        paqueteDeDatos.append('fecha_contratacion_oferta', fecha_contratacion_oferta);
                        paqueteDeDatos.append('tipo_contrato_oferta', tipo_contrato_oferta);
                        paqueteDeDatos.append('tipo_trabajo_oferta', tipo_trabajo_oferta);
                        paqueteDeDatos.append('jornada_laboral_oferta', jornada_laboral_oferta);
                        paqueteDeDatos.append('categoria_oferta', categoria_oferta);
                        paqueteDeDatos.append('ciudad_oferta', ciudad_oferta);
                        paqueteDeDatos.append('fecha_publicacion_oferta', fecha_publicacion_oferta);
                        paqueteDeDatos.append('fecha_expiracion_oferta', fecha_expiracion_oferta);
                        paqueteDeDatos.append('lenguaje_oferta', lenguaje_oferta);




                        //  for (x in ddData) {
                        //    console.log(ddData[x]);
                        //   }


                        if (contador > 2) {



                            if (ciudad_oferta == null) {

                                window.alert("Completa todos los campos!");

                            } else {
                                $.ajax({
                                    type: "POST",
                                    url: "../php/save_oferta.php",
                                    data: paqueteDeDatos,
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    beforeSend: function(objeto) {},
                                    success: function(data) {

                                        switch (data) {
                                            case '4x00053':

                                                swal("Tienes habilidades repetidas!", "Advertencia!", "warning").then((value) => {

                                                });

                                                break;

                                            case '4x00054':

                                                swal("Limite de publicaciones alcanzado!", "Advertencia!", "warning").then((value) => {


                                                });

                                                break;


                                            case '1x00000':

                                                swal("Vacante publicada!", "Completado!", "success").then((value) => {

                                                    location.reload();
                                                    location.href = "dashboard_empleador.php#home";
                                                    /* 
                                                                                                $("#func_ocultar_nombre").is(":unchecked");
                                                                                                $("#func_ocultar_whatsapp").is(":unchecked");
                                                                                                $("#func_resaltar").is(":unchecked");
                                                                                                $("#func_urgente").is(":unchecked");
                                                                                                $("#titulo_oferta").val("");
                                                                                                $("#descripcion_oferta").val("");
                                                                                                $("#nivel_experiencia_oferta").val("");
                                                                                                $("#numero_vacantes_oferta").val("");
                                                                                                $("#salario_mensual_oferta").val("");
                                                                                                $("#estudios_minimos_oferta").val("");
                                                                                                $("#fecha_contratacion_oferta").val("");
                                                                                                $('input[name="dash_tipo-work"]:checked').val("");
                                                                                                $("#jornada_laboral_oferta").val("");
                                                                                                $("#tipo_contrato_oferta").val("");
                                                                                                $("#categoria_oferta").val("");
                                                                                                $("#ubicacion_ciudad1").val("");
                                                                                                $("#lenguaje_oferta").val("");
                                                     */

                                                });

                                                break;



                                            default:
                                                break;
                                        }



                                    }
                                })

                            }



                        } else {
                       
                            swal("<?php echo $lang['dash_post_skills_alert_reminder'] ?>", "Advertencia!", "warning").then((value) => { });
                        }

                    }

                    localStorage.setItem("modalAbierto", false);

                    var active_account = "<?php echo $_SESSION['e_aprobado_empresa']; ?>";


                    function pupup_verification() {

                        var status_pupop = abrirModal();

                        if (status_pupop == "false" && active_account == "0") {
                            $('#modal').iziModal('open');
                            localStorage.setItem("modalAbierto", true);
                        }


                    }


                    function abrirModal() {
                        var result;
                        if (!localStorage.getItem("modalAbierto")) {


                        } else {
                            result = localStorage.getItem("modalAbierto");
                        }

                        return result;
                    }


                    $(function() {
                        $("#modal").iziModal({
                            title: "Publicacion de vacante",
                            subtitle: "TuJob",
                            transitionIn: 'fadeInDown',
                            headerColor: '#2962ff',
                            transitionOut: 'comingOut',
                            width: 500,
                            height: 1000
                        });
                    });
                </script>

                <ol class="progress progress--large">
                    <li class="is-complete" data-step="1">
                        <?php echo $lang['dash_post_basic_details'] ?>
                    </li>
                    <li class="is-complete" data-step="2">
                        <?php echo $lang['dash_post_informative_data'] ?>
                    </li>
                    <li class="is-complete" data-step="3">
                        <?php echo $lang['dash_post_categories'] ?>
                    </li>
                    <li data-step="4" class="is-complete">
                        <?php echo $lang['dash_post_complete'] ?>
                    </li>
                </ol>


                <div id="panel_respuesta">
                </div>

                <div style="display: inline-flex; width: 100%;">

                    <div style="text-align: left; font-size: 3rem; padding-top: 4rem; flex: 1;">
                        <a href="#" onclick="openMain(event, 'step-3')"><i style="color: darkblue;" class="fas fa-arrow-circle-left"></i></a>
                    </div>

                    <div style="text-align: right; font-size: 3rem; padding-top: 4rem; flex: 1;">
                        <a><i style="color: gray;" class="fas fa-arrow-circle-right"></i></a>
                    </div>

                </div>

                <div class="form-login__group">
                    <input type="button" onclick="add_oferta(contador, contador_pregunta)" class="btn-cuadrado-full btn-cuadrado-full--yellow" style="margin-top: 2rem;" value="<?php echo $lang['dash_post_skills_save_btn'] ?>">
                </div>

            </div>
        </div>



    </div>
</section>