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


$enviar = "SELECT * FROM oferta INNER JOIN lenguaje_general ON oferta.Lenguaje_idLenguaje = lenguaje_general.idLenguaje INNER JOIN categoria_requerido ON oferta.Categoria_idCategoria  = categoria_requerido.idCategoria INNER JOIN ciudad ON oferta.ciudad_idCiudad = ciudad.idCiudad WHERE oferta.idOferta = $id_oferta";
$resul_enviar = mysqli_query($connection, $enviar);

$row = mysqli_fetch_array($resul_enviar);

$db_idOferta = $row['idOferta'];
$db_idEmpresa = $row['Empresa_idEmpresa'];
$func_ocultar_nombre = $row['func_oculto_nombre'];
$func_ocultar_whatsapp = $row['func_oculto_whatsapp'];
$func_resaltar = $row['func_resaltar'];
$func_urgente = $row['func_urgente'];
$titulo_oferta = $row['titulo_oferta'];
$descripcion_oferta = $row['descripcion_oferta'];
$nivel_experiencia_oferta = $row['nivel_experiencia'];
$numero_vacantes_oferta = $row['vacantes_disponibles'];
$salario_mensual_oferta = $row['salario_mensual'];
$estudios_minimos_oferta = $row['estudios_minimos'];
$fecha_contratacion_oferta = $row['fecha_contratacion'];
$tipo_trabajo_oferta = $row['tipo_idTipo_trabajo'];
$jornada_laboral_oferta = $row['jornada_laboral'];
$tipo_contrato_oferta = $row['tipo_idContrato'];
$categoria_oferta = $row['nombre_categoria'];
$ciudad_oferta = $row['ciudad_general'];
$fecha_publicacion_oferta = $row['fecha_expiracion'];
$fecha_expiracion_oferta = $row['fecha_expiracion'];
$lenguaje_oferta = $row['Nombre'];
$estado_oferta = $row['estado_idEstado'];

?>
<section style="padding: 2rem;">
    <div class="row">
        <div class="col-1-of-4">



            <a href="#popup" class="option-sub-tabs" style="width: 100%;" onclick="openVistaEditDatos(event, 'funciones')"><?php echo $lang['dash_post_offer_title'] ?></a>
            <a href="#popup" class="option-sub-tabs" onclick="openVistaEditDatos(event, 'habilidades')"><?php echo $lang['dash_edit_view_skills'] ?></a>
            <a href="#popup" class="option-sub-tabs" onclick="openVistaEditDatos(event, 'titulo')"><?php echo $lang['dash_edit_view_info_details'] ?></a>
            <a href="#popup" class="option-sub-tabs" onclick="openVistaEditDatos(event, 'info_complementaria')"><?php echo $lang['dash_edit_view_complementary'] ?></a>
            <a href="#popup" class="option-sub-tabs" onclick="openVistaEditDatos(event, 'funciones_rapidas')"><?php echo $lang['dash_edit_view_features'] ?></a>
            <a href="#popup" class="option-sub-tabs" onclick="openVistaEditDatos(event, 'preguntas')"><?php echo $lang['dash_edit_view_questions'] ?></a>


        </div>
        <div class="col-3-of-4">
            <div id="funciones" class="sub-tabcontent-editDatos" style="display: block;">


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_offer_title'] ?></h3>
                </div>
                <!-- full Block -->
                <div class="form-login__group">
                    <input type="text" class="form-login__input" placeholder="<?php echo $lang['dash_post_offer_title'] ?>" id="titulo_oferta_edit" value="<?php echo $titulo_oferta ?>" disabled>
                </div>


                <h3 class="text-animation"><?php echo $lang['dash_post_description_vacancy'] ?></h3>
                <textarea class="formtext" id="descripcion_oferta_edit" placeholder="<?php echo $lang['dash_post_description_vacancy'] ?>" style="margin-bottom: 2rem;" required minlength="2"><?php echo $descripcion_oferta ?></textarea>


                <div style="float: right;">
                    <button style="background-color: #1b3fdd;" onclick="update_oferta()" class="btn-cuadrado-submit btn-cuadrado-submit--green"><?php echo $lang['dash_edit_btn_save'] ?></button>
                </div>


            </div>
            <div id="titulo" class="sub-tabcontent-editDatos">

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_edit_view_complementary'] ?></h3>
                </div>


                <!-- middle Block -->
                <div class="form-login__group" style="display: inline-flex; width: 100%;">
                    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                        <input type="text" class="form-login__input" placeholder="<?php echo $lang['dash_post_years_experience'] ?>" id="nivel_experiencia_oferta_edit" value="<?php echo $nivel_experiencia_oferta ?>" required>
                    </div>
                    <div class="form-login__group" style="width: 45%;">
                        <input type="number" class="form-login__input" placeholder="<?php echo $lang['dash_post_Number_vacancies_available'] ?>" id="numero_vacantes_oferta_edit" value="<?php echo $numero_vacantes_oferta ?>" required>
                    </div>
                </div>


                <!-- full Block -->
                <div class="form-login__group">
                    <input type="number" class="form-login__input" placeholder="<?php echo $lang['dash_post_monthly_salary'] ?>" id="salario_mensual_oferta_edit" value="<?php echo $salario_mensual_oferta ?>" required>
                </div>

                <!-- full Block -->
                <div class="form-login__group">
                    <input type="text" class="form-login__input" placeholder="<?php echo $lang['dash_post_minimum_studies'] ?>" id="estudios_minimos_oferta_edit" value="<?php echo $estudios_minimos_oferta ?>" required>
                </div>

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_hiring_date'] ?></h3>
                </div>

                <!-- full Block -->
                <div class="form-login__group">
                    <input type="date" class="form-login__input" placeholder="<?php echo $lang['dash_post_hiring_date'] ?>" id="fecha_contratacion_oferta_edit" value="<?php echo $fecha_contratacion_oferta ?>" required>
                </div>

                <div style="float: right;">
                    <button style="background-color: #1b3fdd;" onclick="update_oferta()" class="btn-cuadrado-submit btn-cuadrado-submit--green"><?php echo $lang['dash_edit_btn_save'] ?></button>
                </div>

            </div>

            <div id="info_complementaria" class="sub-tabcontent-editDatos">


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_way_working'] ?></h3>
                </div>

                <div class="form-login__group">
                    <?php

                    if ($tipo_trabajo_oferta == "3") {
                        echo "<input type='radio' id='cuenta_presencial' name='dash_tipo-work' value='3' required>
                        <label class='input-check' for='presencial'>" . $lang['dash_post_face_to_face'] . "</label><br>";
                    }
                    if ($tipo_trabajo_oferta == "4") {
                        echo "       
                        <input type='radio' id='cuenta_remoto' name='dash_tipo-work' value='4' checked required>
                        <label class='input-check' for='remoto'>" . $lang['dash_post_remote'] . "</label><br>";
                    }

                    ?>

                </div>

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_shift'] ?></h3>
                </div>

                <select class="form-login__input" style="margin-bottom: 2rem;" id="jornada_laboral_oferta_edit" required>
                    <option><?php echo $lang['dash_post_party_time'] ?></option>
                    <option><?php echo $lang['dash_post_full_time'] ?></option>
                </select>


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_language'] ?></h3>
                </div>

                <!-- full Block -->
                <div class="form-login__group">
                    <input disabled type="text" class="form-login__input" placeholder="Idioma" id="lenguaje_oferta_edit" value="<?php echo $lenguaje_oferta ?>" required>
                </div>



                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_categories'] ?></h3>
                </div>

                <!-- full Block -->
                <div class="form-login__group">
                    <input disabled type="text" class="form-login__input" placeholder="Categoria oferta" id="categoria_oferta" value="<?php echo $categoria_oferta ?>" required>
                </div>


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_edit_select_city'] ?></h3>
                </div>

                <div class="form-login__group">
                    <input disabled type="text" class="form-login__input" placeholder="Pais" id="pais_oferta" value="<?php echo $ciudad_oferta ?>" required>
                </div>

                <div style="float: right;">
                    <button style="background-color: #1b3fdd;" onclick="update_oferta()" class="btn-cuadrado-submit btn-cuadrado-submit--green"><?php echo $lang['dash_edit_btn_save'] ?></button>

                </div>

            </div>


            <div id="preguntas" class="sub-tabcontent-editDatos">

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_custom_question'] ?></h3>
                </div>



                <div class="form-login__group" style="margin-top: 2rem;">
                    <button style="background-color: #1b3fdd;" onclick="save_pregunta_edit(contador_edit_pregunta)" class="btn-cuadrado-submit btn-cuadrado-submit--green"><i style="color: white; padding-right: 6px;" class="fas fa-save"></i><?php echo $lang['dash_edit_btn_save']?></button>

                    <div style="float: right;">
                        <input type="button" onclick="add_pregunta_edit()" class="btn-cuadrado-submit btn-cuadrado-submit--green" value="+">
                        <input type="button" onclick="delete_pregunta_edit()" class="btn-cuadrado-submit btn-cuadrado-submit--red" value="-">
                    </div>

                </div>


                <!-- middle Block -->
                <div id="container_pregunta2">


                    <?php


                    $contador_pregunta_edit = 0;

                    $request_country = "SELECT * FROM `pregunta` WHERE oferta_idOferta = $id_oferta;";



                    $resul_country = mysqli_query($connection, $request_country);
                    if (!$resul_country) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_array($resul_country)) {
                        $db_idOferta = $row['idPregunta'];
                        $db_pregunta = $row['pregunta'];
                        $contador_pregunta_edit = $contador_pregunta_edit + 1;

                    ?>
                        <!-- full Block -->
                        <div class="form-login__group" id="input_pregunta_<?php echo $contador_pregunta_edit ?>">
                            <input disabled type="text" value="<?php echo $db_pregunta ?>" class="form-login__input" placeholder="Pregunta personalizada" id="pregunta_<?php echo $contador_pregunta_edit ?>">
                        </div>
                    <?php
                    }
                    ?>
                </div>




            </div>
            <div id="habilidades" class="sub-tabcontent-editDatos">



                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_skills_required'] ?></h3>
                </div>

                <div class="form-login__group" style="margin-top: 2rem;">
                    <button style="background-color: #1b3fdd;" onclick="save_skills_edit(contador_edit_skill)" class="btn-cuadrado-submit btn-cuadrado-submit--green"><i style="color: white; padding-right: 6px;" class="fas fa-save"></i><?php echo $lang['dash_edit_btn_save']?></button>

                    <div style="float: right;">
                        <button onclick="add_skills_edit_oferta()" class="btn-cuadrado-submit btn-cuadrado-submit--green">+</button>
                        <button onclick="delete_skills_edit()" class="btn-cuadrado-submit btn-cuadrado-submit--red">-</button>
                    </div>

                </div>
                <div id="container_skills_edi">


                    <?php


                    $contador_skills_edit = 0;


                    $all_skills = "SELECT * FROM habilidades_requerida_oferta INNER JOIN habilidades_generales ON habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales =  habilidades_generales.idHabilidades_generales WHERE Oferta_idOferta = $id_oferta";

                    $resul_all_skills = mysqli_query($connection, $all_skills);
                    if (!$resul_all_skills) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }


                    while ($row = mysqli_fetch_array($resul_all_skills)) {
                        $db_idHabilidad = $row['Habilidades_generales_idHabilidades_generales'];
                        $db_nombre_habilidad = $row['nombre_habilidad_general'];
                        $db_valor_skill = $row['valor'];
                        $contador_skills_edit  = $contador_skills_edit + 1;
                    ?>
                        <div id='skill_<?php echo $contador_skills_edit ?>' class='form-login__group' style='display: inline-flex; width: 100%;'>
                            <div class='form-login__group' style='width: 89%;'><select id="skill_selected_<?php echo $contador_skills_edit ?>" class='form-login__input'>
                                    <option value="<?php echo $db_idHabilidad ?>"><?php echo $db_nombre_habilidad; ?></option>
                                </select></div>
                            <div class='form-login__group' style='width: 8%;'>
                                <div class='form-login__group'><select id="valor_selected_<?php echo $contador_skills_edit ?>" class='form-login__input'>

                                        <?php

                                        if ($db_valor_skill == 10) {
                                            echo "<option value='10' selected>10%</option>";
                                        } else {
                                            echo "<option value='10'>10%</option>";
                                        }
                                        if ($db_valor_skill == 15) {
                                            echo "<option value='15' selected>15%</option>";
                                        } else {
                                            echo "<option value='15'>15%</option>";
                                        }
                                        if ($db_valor_skill == 20) {
                                            echo "<option value='20' selected>20%</option>";
                                        } else {
                                            echo "<option value='20'>20%</option>";
                                        }
                                        if ($db_valor_skill == 25) {
                                            echo "<option value='25' selected>25%</option>";
                                        } else {
                                            echo "<option value='25'>25%</option>";
                                        }
                                        if ($db_valor_skill == 30) {
                                            echo "<option value='30' selected>30%</option>";
                                        } else {
                                            echo "<option value='30'>30%</option>";
                                        }
                                        if ($db_valor_skill == 35) {
                                            echo "<option value='35' selected>35%</option>";
                                        } else {
                                            echo "<option value='35'>35%</option>";
                                        }
                                        if ($db_valor_skill == 40) {
                                            echo "<option value='40' selected>40%</option>";
                                        } else {
                                            echo "<option value='40'>40%</option>";
                                        }
                                        if ($db_valor_skill == 45) {
                                            echo "<option value='45' selected>45%</option>";
                                        } else {
                                            echo "<option value='45'>45%</option>";
                                        }
                                        if ($db_valor_skill == 50) {
                                            echo "<option value='50' selected>50%</option>";
                                        } else {
                                            echo "<option value='50'>50%</option>";
                                        }
                                        if ($db_valor_skill == 55) {
                                            echo "<option value='55' selected>55%</option>";
                                        } else {
                                            echo "<option value='55'>55%</option>";
                                        }
                                        if ($db_valor_skill == 60) {
                                            echo "<option value='60' selected>60%</option>";
                                        } else {
                                            echo "<option value='60'>60%</option>";
                                        }
                                        if ($db_valor_skill == 65) {
                                            echo "<option value='65' selected>65%</option>";
                                        } else {
                                            echo "<option value='65'>65%</option>";
                                        }
                                        if ($db_valor_skill == 70) {
                                            echo "<option value='70' selected>70%</option>";
                                        } else {
                                            echo "<option value='70'>70%</option>";
                                        }
                                        if ($db_valor_skill == 75) {
                                            echo "<option value='75' selected>75%</option>";
                                        } else {
                                            echo "<option value='75'>75%</option>";
                                        }
                                        if ($db_valor_skill == 80) {
                                            echo "<option value='80' selected>80%</option>";
                                        } else {
                                            echo "<option value='80'>80%</option>";
                                        }
                                        if ($db_valor_skill == 85) {
                                            echo "<option value='85' selected>85%</option>";
                                        } else {
                                            echo "<option value='85'>85%</option>";
                                        }
                                        if ($db_valor_skill == 90) {
                                            echo "<option value='90' selected>95%</option>";
                                        } else {
                                            echo "<option value='90'>90%</option>";
                                        }
                                        if ($db_valor_skill == 95) {
                                            echo "<option value='95' selected>95%</option>";
                                        } else {
                                            echo "<option value='95'>95%</option>";
                                        }
                                        if ($db_valor_skill == 100) {
                                            echo "<option value='100' selected>100%</option>";
                                        } else {
                                            echo "<option value='100'>100%</option>";
                                        }


                                        ?>

                                    </select></div>
                            </div>
                        </div>

                    <?php
                    }

                    ?>

                </div>




            </div>



            <div id="funciones_rapidas" class="sub-tabcontent-editDatos">


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['dash_post_quick_features'] ?></h3>
                </div>

                <?php

                if ($func_ocultar_nombre == 0) {
                    echo "<div class='form-login__group'>
                    <input type='checkbox' id='func_ocultar_nombre_edit'>
                    <label class='input-check' for='func_ocultar_nombre_edit'>" . $lang['dash_post_hide_company_name'] . "</label><br>
                    </div>";
                }
                if ($func_ocultar_nombre == 1) {
                    echo "<div class='form-login__group'>
                    <input type='checkbox' id='func_ocultar_nombre_edit' checked>
                    <label class='input-check' for='func_ocultar_nombre_edit'>" . $lang['dash_post_hide_company_name']  . "</label><br>
                    </div>";
                }
                if ($func_ocultar_whatsapp == 0) {
                    echo "<div class='form-login__group'>
                    <input type='checkbox' id='func_ocultar_whatsapp_edit'>
                    <label class='input-check' for='func_ocultar_whatsapp_edit'>" . $lang['dash_post_hide_number_whatsapp'] . "</label><br>
                    </div>";
                }
                if ($func_ocultar_whatsapp == 1) {
                    echo "<div class='form-login__group'>
                    <input type='checkbox' id='func_ocultar_whatsapp_edit' checked>
                    <label class='input-check' for='func_ocultar_whatsapp_edit'>" . $lang['dash_post_hide_number_whatsapp'] . "</label><br>
                    </div>";
                }
                if ($func_resaltar == 0) {
                    echo "<div class='form-login__group'>
                    <input class='only-one' type='checkbox' id='func_resaltar_edit'>
                    <label class='input-check' for='func_resaltar_edit'>" . $lang['dash_post_outstanding'] . "</label><br>
                    </div>";
                }
                if ($func_resaltar == 1) {
                    echo "<div class='form-login__group'>
                    <input class='only-one' type='checkbox' id='func_resaltar' checked>
                    <label class='input-check' for='func_resaltar'>" . $lang['dash_post_outstanding'] . "</label><br>
                    </div>";
                }
                if ($func_urgente == 0) {
                    echo "<div class='form-login__group'>
                    <input class='only-one' type='checkbox' id='func_urgente_edit'>
                    <label class='input-check' for='func_urgente_edit'>" . $lang['dash_post_urgent'] . "</label><br>
                    </div>";
                }
                if ($func_urgente == 1) {
                    echo "<div class='form-login__group'>
                    <input class='only-one' type='checkbox' id='func_urgente' checked>
                    <label class='input-check' for='func_urgente'>" . $lang['dash_post_urgent'] . "</label><br>
                    </div>";
                }

                ?>

                <style>
                    .input-check {
                        font-family: 'Poppins', sans-serif;
                        font-weight: 300;
                        font-size: 1.5rem;
                        padding-left: 1rem;
                    }
                </style>


                <div style="float: right;">
                    <button style="background-color: #1b3fdd;" onclick="update_oferta()" class="btn-cuadrado-submit btn-cuadrado-submit--green"><?php echo $lang['dash_edit_btn_save']?></button>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    var contador_edit_skill = <?php echo $contador_skills_edit ?>;
    var contador_edit_pregunta = <?php echo $contador_pregunta_edit ?>;



    function add_pregunta_edit() {
        try {

            contador_edit_pregunta = contador_edit_pregunta + 1;

            var ob = {
                contador_pregunta: contador_edit_pregunta
            };


            $.ajax({
                type: "POST",
                url: "../php/pregunta.php",
                data: ob,

                beforeSend: function(objeto) {

                },
                success: function(data) {
                    document.getElementById("container_pregunta2").insertAdjacentHTML("beforeend", data);

                    console.log(contador_edit_pregunta);
                }
            })



        } catch (error) {

        }
    }

    function add_skills_edit_oferta() {

        try {


            contador_edit_skill = contador_edit_skill + 1;

            var ob = {
                contador: contador_edit_skill
            };


            $.ajax({
                type: "POST",
                url: "../php/skills.php",
                data: ob,

                beforeSend: function(objeto) {

                },
                success: function(data) {
                    document.getElementById("container_skills_edi").insertAdjacentHTML("beforeend", data);

                    console.log(contador_edit_skill);
                }
            })



        } catch (error) {

        }
    }

    function delete_skills_edit() {
        $("#skill_" + contador_edit_skill).remove();
        contador_edit_skill = contador_edit_skill - 1;
        console.log(contador_edit_skill);
    }

    function delete_pregunta_edit() {
        $("#input_pregunta_" + contador_edit_pregunta).remove();
        contador_edit_pregunta = contador_edit_pregunta - 1;
        console.log(contador_edit_pregunta);
    }

    function save_skills_edit(contador) {


        var ddData = [];
        var idOferta = <?php echo $id_oferta ?>;


        for (step = 1; step <= contador; step++) {


            // Creas un nuevo objeto.
            var objeto = {
                // Le agregas la fecha
                habilidad: document.getElementById("skill_selected_" + step).value,
                valor: document.getElementById("valor_selected_" + step).value
            }
            //Lo agregas al array.
            ddData.push(objeto);

        }

        //for (x in ddData) {
        //  console.log(ddData[x]);
        //}

        $.ajax({
            type: "POST",
            url: "../php/save_skills_edit.php",
            data: {
                'array': JSON.stringify(ddData),
                'oferta': idOferta
            },
            beforeSend: function(objeto) {},
            success: function(data) {
                alert(data);

            }
        })

    }

    function save_pregunta_edit(contador) {


        var ddData = [];
        var idOferta = <?php echo $id_oferta ?>;


        for (step = 1; step <= contador; step++) {


            // Creas un nuevo objeto.
            var objeto = {
                // Le agregas la fecha
                pregunta: document.getElementById("pregunta_" + step).value
            }
            //Lo agregas al array.
            ddData.push(objeto);

        }

        for (x in ddData) {
            console.log(ddData[x]);
        }

        $.ajax({
            type: "POST",
            url: "../php/save_preguntas_edit.php",
            data: {
                'array': JSON.stringify(ddData),
                'idOferta': idOferta
            },
            beforeSend: function(objeto) {},
            success: function(data) {
                alert(data);
            }
        })

    }

    function update_oferta() {

        var idOferta = <?php echo $id_oferta ?>;
        var db_idEmpresa = <?php echo $db_idEmpresa ?>;

        var func_ocultar_nombre = $("#func_ocultar_nombre_edit").is(":checked");
        var func_ocultar_whatsapp = $("#func_ocultar_whatsapp_edit").is(":checked");
        var func_resaltar = $("#func_resaltar_edit").is(":checked");
        var func_urgente = $("#func_urgente_edit").is(":checked");
        var tipo_trabajo_oferta = $('input[name="dash_tipo-work"]:checked').val();
        var titulo_oferta_edit = $("#titulo_oferta_edit").val();
        var descripcion_oferta_edit = $("#descripcion_oferta_edit").val();
        var nivel_experiencia_oferta_edit = $("#nivel_experiencia_oferta_edit").val();
        var numero_vacantes_oferta_edit = $("#numero_vacantes_oferta_edit").val();
        var salario_mensual_oferta_edit = $("#salario_mensual_oferta_edit").val();
        var estudios_minimos_oferta_edit = $("#estudios_minimos_oferta_edit").val();
        var fecha_contratacion_oferta_edit = $("#fecha_contratacion_oferta_edit").val();
        var jornada_laboral_oferta_edit = $("#jornada_laboral_oferta_edit").val();


        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('idOferta', idOferta);
        paqueteDeDatos.append('idEmpresa', db_idEmpresa);
        paqueteDeDatos.append('func_ocultar_nombre', func_ocultar_nombre);
        paqueteDeDatos.append('func_ocultar_whatsapp', func_ocultar_whatsapp);
        paqueteDeDatos.append('func_resaltar', func_resaltar);
        paqueteDeDatos.append('func_urgente', func_urgente);
        paqueteDeDatos.append('tipo_trabajo_oferta', tipo_trabajo_oferta);
        paqueteDeDatos.append('titulo_oferta_edit', titulo_oferta_edit);
        paqueteDeDatos.append('descripcion_oferta_edit', descripcion_oferta_edit);
        paqueteDeDatos.append('nivel_experiencia_oferta_edit', nivel_experiencia_oferta_edit);
        paqueteDeDatos.append('numero_vacantes_oferta_edit', numero_vacantes_oferta_edit);
        paqueteDeDatos.append('salario_mensual_oferta_edit', salario_mensual_oferta_edit);
        paqueteDeDatos.append('estudios_minimos_oferta_edit', estudios_minimos_oferta_edit);
        paqueteDeDatos.append('fecha_contratacion_oferta_edit', fecha_contratacion_oferta_edit);
        paqueteDeDatos.append('jornada_laboral_oferta_edit', jornada_laboral_oferta_edit);





        //  for (x in ddData) {
        //    console.log(ddData[x]);
        //   }


        $.ajax({
            type: "POST",
            url: "../php/update_oferta.php",
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(objeto) {},
            success: function(data) {

                alert(data);

            }
        })

    }
</script>

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
                alert("<?php echo $lang['dash_post_skills_alert_mark_feature'] ?>");

                // Desmarcamos el ultimo elemento
                $(elemento).prop('checked', false);
                contador--;
            }

            $("#seleccionados").html(contador);
        });
    });
</script>