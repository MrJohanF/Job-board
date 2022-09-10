<section class="edit-profile">
    <div class="row">
        <div class="col-1-of-4">


            <a href="#profile" class="option-sub-tabs" onclick="openMain(event, 'information')"><?php echo $lang['candidato_dash_information_personal'] ?></a>
            <a href="#profile" class="option-sub-tabs" onclick="openMain(event, 'habilidades')"><?php echo $lang['candidato_dash_abilities'] ?></a>
            <a href="#profile" class="option-sub-tabs" onclick="openMain(event, 'experiencia')"><?php echo $lang['candidato_dash_experience'] ?></a>
            <a href="#profile" class="option-sub-tabs" onclick="openMain(event, 'video')"><?php echo $lang['candidato_dash_presentation_video'] ?></a>
            <a href="#profile" class="option-sub-tabs" onclick="openMain(event, 'social-profile')"><?php echo $lang['candidato_dash_social_networks'] ?></a>
            <a target="_blank" rel="noopener noreferrer" href="app/hv/hv.php" class="option-sub-tabs"><?php echo $lang['candidato_dash_cv'] ?></a>



        </div>
        <div class="col-3-of-4">
            <div id="information" class="sub-tabcontent" style="display: block;">

                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['candidato_dash_information_information'] ?></h3>
                </div>

                <div id="bar_form_completed" class="form-login__group">

                </div>



                <form method="POST" style="margin-top: 2rem;" enctype="multipart/form-data">


                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['candidato_dash_profile_picture'] ?></h3>
                    </div>


                    <div style="margin-bottom: 2rem;" class="form-login__group">

                        <label class="custom-file-upload" style=" cursor: pointer;padding-left: 3rem; padding-right: 3rem; padding-bottom: 1rem; border-radius: 4px; padding-top: 1rem; height: 3rem; color: white; background-color: #2962ff;  width: 30rem; text-align: center; font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 1.5rem; " for="profileImage">
                            <?php echo $lang['candidato_dash_select_photo'] ?> <i style="padding-left: 1rem;" class="fas fa-user-edit"></i>
                        </label>

                        <input style="background-color: #004794; display: none; visibility: hidden;" id="profileImage" type="file" accept="image/jpeg, image/png, image/jpg">

                        <script>
                            document.getElementById('profileImage').onchange = function() {
                                $('.custom-file-upload').html(document.getElementById('profileImage').files[0].name);

                            }
                        </script>

                    </div>


                    <h3 class="text-animation"><?php echo $lang['candidato_dash_description_profile'] ?></h3>
                    <textarea class="formtext required" id="dash_description" placeholder="Mi perfil..." style="background-color: white; margin-bottom: 2rem; padding-left: 1rem; padding-top: 1rem;"><?php echo $_SESSION['s_descripcion'] ?></textarea>

                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['candidato_dash_personal_information'] ?></h3>
                    </div>

                    <!-- middle Block -->
                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_name'] ?>" id="dash_name" value="<?php echo $_SESSION['s_nombre'] ?>">
                        </div>
                        <div class="form-login__group" style="width: 45%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_last_name'] ?>" id="dash_last-name" value="<?php echo $_SESSION['s_apellido'] ?>">
                        </div>
                    </div>

                    <!-- middle Block -->
                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_identification_number'] ?>" id="dash_cedula" value="<?php echo $_SESSION['s_numero_cedula'] ?>">
                        </div>
                        <div class="form-login__group" style="width: 45%;">
                            <input type="date" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_date_birth'] ?>" id="dash_fecha-nacimiento" value="<?php echo $_SESSION['s_fecha_nacimiento'] ?>">
                        </div>
                    </div>

                    <!-- middle Block -->
                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_cellphone'] ?>" id="dash_phone" value="<?php echo $_SESSION['s_telefono'] ?>">
                        </div>
                        <div class="form-login__group" style="width: 45%;">

                            <div class="form-login__group">
                                <select type="text" class="form-login__input" id="dash_genre">
                                    <option value="0">Select option</option>
                                    <option value="1"><?php echo $lang['candidato_dash_gender_male'] ?></option>
                                    <option value="2"><?php echo $lang['candidato_dash_gender_female'] ?></option>
                                </select>
                            </div>

                        </div>
                    </div>


                    <!-- full block -->
                    <div class="form-login__group">
                        <input type="text" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_email_address'] ?>" id="dash_correo" value="<?php echo $_SESSION['s_email'] ?>">
                    </div>
                    <div class="form-login__group">
                        <input type="text" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_whatsApp_number'] ?>" id="dash_whatsapp" value="<?php echo $_SESSION['s_numero_whatsapp'] ?>">
                    </div>

                    <div class="form-login__group">
                        <input type="text" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_desired_position'] ?>" id="dash_cargo-deseado" value="<?php echo $_SESSION['s_cargo_deseado'] ?>">
                    </div>

                    <!-- full Block -->
                    <div class="form-login__group">
                        <input type="text" class="form-login__input required" placeholder="<?php echo $lang['candidato_dash_residence_address'] ?>" id="dash_direccion" value="<?php echo $_SESSION['s_direccion'] ?>">
                    </div>


                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['candidato_dash_select_country'] ?></h3>
                    </div>







                    <div class="form-login__group">
                        <select class="form-login__input" id="ubicacion" onchange="filtroPais()">

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
                        <h3 class="text-animation"><?php echo $lang['candidato_dash_select_residence'] ?></h3>
                    </div>



                    <script>
                        function filtroPais() {
                            var select = document.getElementById("ubicacion"); /*Obtener el SELECT */
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

                                        $("#ubicacion_ciudad").html(data);
                                    }
                                })
                                .always(function() {
                                    console.log("complete");
                                });
                        }
                    </script>





                    <div class="form-login__group">
                        <select class="form-login__input" id="ubicacion_ciudad">

                        </select>
                    </div>



                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['candidato_dash_wage_aspiration'] ?></h3>
                    </div>

                    <div class="container_slide_range">

                        <input class="slide_range" id="range_salary_aspiration" type="range" name="" step="100000" value="<?php if (empty($_SESSION['s_aspiracion_salarial'])) {
                                                                                                                                echo '0';
                                                                                                                            } else {
                                                                                                                                echo $_SESSION['s_aspiracion_salarial'];
                                                                                                                            } ?>" min="400000" max="20000000">
                        <span class="rangeValue_style" style="margin-left: 2rem;">$</span>
                        <span class="rangeValue_style" id="rangeValue"><?php echo $_SESSION['s_aspiracion_salarial'] ?></span>
                        <script>
                            var slider_aspiration = document.getElementById("range_salary_aspiration");
                            var output_aspiration = document.getElementById("rangeValue");
                            output_aspiration.innerHTML = slider_aspiration.value;
                            output_aspiration.innerHTML = output_aspiration.innerHTML.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                            slider_aspiration.oninput = function() {
                                output_aspiration.innerHTML = this.value;
                                output_aspiration.innerHTML = this.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            }
                        </script>



                    </div>

                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['candidato_dash_select_job_type'] ?></h3>
                    </div>



                    <div class="form-login__group">
                        <div>
                            <input type="radio" id="cuenta_presencial" class="required" name="dash_tipo-work" value="3">
                            <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem; padding-left: 0.8rem;" for="presencial"><?php echo $lang['candidato_dash_face_to_face'] ?></label><br>
                        </div>
                        <div style="margin-top: 1rem;">
                            <input type="radio" id="cuenta_remoto" class="required" name="dash_tipo-work" value="4">

                            <label style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem; padding-left: 0.8rem;" for="remoto"><?php echo $lang['candidato_dash_remote'] ?></label><br>
                        </div>
                    </div>







                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['candidato_dash_english'] ?></h3>
                    </div>



                    <div class="form-login__group">




                        <div style="margin-bottom: 1rem;">
                            <input type="radio" id="basico" name="lvl_eng" value="1" class="required">
                            <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem; padding-left: 0.8rem;" for="basico"><?php echo $lang['candidato_dash_basic'] ?></label><br>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <input type="radio" id="intermedio" name="lvl_eng" value="2" class="required">
                            <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem; padding-left: 0.8rem;" for="intermedio"><?php echo $lang['candidato_dash_intermediate'] ?></label><br>
                        </div>
                        <div>
                            <input type="radio" id="bilingue" name="lvl_eng" value="3" class="required">
                            <label style=" font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem; padding-left: 0.8rem;" for="bilingue"><?php echo $lang['candidato_dash_bilingual'] ?></label><br>

                        </div>


                    </div>





                    <div class="form-login__group">
                        <h3 id="test" class="text-animation"><?php echo $lang['candidato_dash_travel_availability'] ?></h3>
                    </div>

                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                            <div class="form-login__group">
                                <select id="viajar" class="form-login__input required" placeholder="Cuentas con disponibilidad de viaje ?">
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-login__group" style="width: 45%;">

                            <div class="form-login__group">
                                <select id="vehiculo" class="form-login__input required" placeholder="Cuentas con vehiculo propio ?">
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                </select>

                            </div>

                        </div>
                    </div>

                    <div id="panel_respuesta">
                    </div>

                    <div class="form-login__group">
                        <input type="button" onclick="btn_guardar_candidato_dashboard()" class="btn-cuadrado-full btn-cuadrado-full--yellow" value="Guardar" style="margin-top: 2rem;">
                    </div>

                </form>


                <script>
                    window.onload = function check() {
                        collap();


                        var nivel = <?php echo $_SESSION['s_nivel_ingles'] ?>;
                        var tipo_trabajo = <?php echo $_SESSION['s_tipo_trabajo'] ?>;
                        var vehiculo = <?php echo $_SESSION['s_disponibilidad_vehiculo'] ?>;
                        var genero = <?php echo $_SESSION['s_genero'] ?>;
                        var viajar = <?php echo $_SESSION['s_disponibilidad_viaje'] ?>;


                        if (genero == 1) {
                            document.getElementById("dash_genre").options[1].selected = true;
                        }
                        if (genero == 2) {
                            document.getElementById("dash_genre").options[2].selected = true;
                        }

                        if (nivel == 1) {
                            document.getElementById("basico").checked = !document.getElementById("basico").checked;
                        }
                        if (nivel == 2) {
                            document.getElementById("intermedio").checked = !document.getElementById("intermedio").checked;
                        }
                        if (nivel == 3) {
                            document.getElementById("bilingue").checked = !document.getElementById("bilingue").checked;
                        }
                        console.log("funciona auto carga");

                        filtroPais();


                        if (tipo_trabajo == 3) {
                            document.getElementById("cuenta_presencial").checked = !document.getElementById("cuenta_presencial").checked;
                        }
                        if (tipo_trabajo == 4) {
                            document.getElementById("cuenta_remoto").checked = !document.getElementById("cuenta_remoto").checked;
                        }


                        if (vehiculo == 1) {
                            document.getElementById("vehiculo").options[0].selected = true;
                        }
                        if (vehiculo == 2) {
                            document.getElementById("vehiculo").options[1].selected = true;
                        }

                        if (viajar == 1) {
                            document.getElementById("viajar").options[0].selected = true;
                        }
                        if (viajar == 2) {
                            document.getElementById("viajar").options[1].selected = true;
                        }




                        function filtro_auto() {
                            var select = document.getElementById("ubicacion"); /*Obtener el SELECT */
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
                                        $("#ubicacion_ciudad").html(data);
                                    }
                                })
                                .always(function() {
                                    console.log("complete");
                                });
                        }
                    }
                </script>





                <script>
                    function btn_guardar_candidato_dashboard() {


                        var e = document.getElementById('profileImage');

                        const file = e.files[0];


                        if (!file) {
                            save_information_candidate("", "");

                        } else {
                            new Compressor(file, {
                                quality: 0.1,

                                success(result) {

                                    var newImage = new Image();

                                    newImage.src = URL.createObjectURL(result);
                                    newImage.alt = 'Compressed image';
                                    //output.appendChild(newImage);

                                    save_information_candidate(result, result.name)

                                },
                                error(err) {
                                    console.log(err.message);


                                },
                            });
                        }

                    }

                    function save_information_candidate(objeto_img, objeto_img_name) {


                        var idCandidato = "<?php echo $_SESSION['s_id_candidato']; ?>";
                        var nombre = $("#dash_name").val();
                        var apellido = $("#dash_last-name").val();
                        var numero_cedula = $("#dash_cedula").val();
                        var fecha_nacimiento = $("#dash_fecha-nacimiento").val();
                        var telefono = $("#dash_phone").val();
                        var email = $("#dash_correo").val();
                        var genero = $("#dash_genre").val();
                        var direccion = $("#dash_direccion").val();
                        var numero_whatsapp = $("#dash_whatsapp").val();
                        var cargo_deseado = $("#dash_cargo-deseado").val();
                        var descripcion = $("#dash_description").val();
                        var rangeValue = $("#range_salary_aspiration").val();
                        var ciudad = $("#ubicacion_ciudad").val();
                        var tipo_trabajo = $('input[name="dash_tipo-work"]:checked').val();
                        var viajar = $("#vehiculo").val();
                        var vehiculo = $("#viajar").val();
                        var level_ingles = $('input[name="lvl_eng"]:checked').val();
                        var pais = $("#ubicacion").val();



                        var paqueteDeDatos = new FormData();

                        paqueteDeDatos.append('idCandidato', idCandidato);
                        paqueteDeDatos.append('nombre', nombre);
                        paqueteDeDatos.append('apellido', apellido);
                        paqueteDeDatos.append('numero_cedula', numero_cedula);
                        paqueteDeDatos.append('fecha_nacimiento', fecha_nacimiento);
                        paqueteDeDatos.append('telefono', telefono);
                        paqueteDeDatos.append('email', email);
                        paqueteDeDatos.append('genero', genero);
                        paqueteDeDatos.append('direccion', direccion);
                        paqueteDeDatos.append('numero_whatsapp', numero_whatsapp);
                        paqueteDeDatos.append('cargo_deseado', cargo_deseado);
                        paqueteDeDatos.append('descripcion', descripcion);
                        paqueteDeDatos.append('range-value', rangeValue);
                        paqueteDeDatos.append('vehiculo', viajar);
                        paqueteDeDatos.append('viajar', vehiculo);
                        paqueteDeDatos.append('ciudad', ciudad);
                        paqueteDeDatos.append('tipo_work', tipo_trabajo);
                        paqueteDeDatos.append('level_ingles', level_ingles);
                        paqueteDeDatos.append('pais', pais);
                        if (objeto_img_name != "") {
                            paqueteDeDatos.append('img', objeto_img, objeto_img_name);
                        }

                        $.ajax({
                            type: "POST",
                            url: "../php/upload.php",
                            data: paqueteDeDatos,
                            contentType: false,
                            processData: false,
                            cache: false,
                            beforeSend: function(objeto) {},
                            success: function(data) {

                                $("#panel_respuesta").html(data);


                                $('html, body').animate({
                                    scrollTop: 0
                                }, 'slow'); //seleccionamos etiquetas,clase o identificador destino, creamos animación hacia top de la página.

                                swal("Informacion actualizada!", "Completado!", "success").then((value) => {
                                    location.reload();
                                });


                                setTimeout(function() {
                                    $("#panel_respuesta").html("");

                                }, 600);
                            }
                        })
                    }
                </script>



            </div>



            <!-- ///////////////// VIDEO ///////////////// -->

            <div id="video" class="sub-tabcontent">


                <div id="container_video">



                    <div class="row">
                        <div class="form-social__group">
                            <input id="url-video" type="url" class="form-social__youtube" placeholder="<?php echo $lang['candidato_dash_video_url'] ?>" required>
                        </div>
                        <button style="background-color: #2962ff;" onclick="add_video()" href="#" class="btn-cuadrado-submit btn-cuadrado-submit--green">+</button>
                        <button onclick="delete_video()" style="color: #333; background-color: #ecdd00;" href="#" class="btn-cuadrado-submit btn-cuadrado-submit--red">-</button>
                        <div style="float: right;">
                            <button style="background-color: #2962ff;" onclick="save_video(contador_video)" class="btn-cuadrado-submit btn-cuadrado-submit--green"><i style=" color: white; padding-right: 6px;" class="fas fa-save"></i><?php echo $lang['candidato_dash_video_save'] ?></button>
                        </div>
                    </div>


                    <?php

                    $contador_present = 0;

                    $id_cantidato = $_SESSION['s_id_candidato'];

                    $request_present = "SELECT * FROM presentaciones where idCandidato_candidato = $id_cantidato";


                    $resul_present = mysqli_query($connection, $request_present);
                    if (!$resul_present) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_array($resul_present)) {
                        $db_idPresentacion = $row['idPresentacion'];
                        $db_url_presentacion = $row['url'];

                        $contador_present = $contador_present + 1;

                    ?>

                        <div id="video_<?php echo $contador_present ?>">

                            <div id='videocontainer' class='row'>

                                <div class='container-info-youtube'>
                                    <div class='container-url-video'>
                                        <h3 class='container-url-video-title'><?php echo $db_url_presentacion ?></h3>
                                    </div>
                                </div>

                            </div>
                        </div>


                    <?php

                    }

                    ?>




                </div>


            </div>
            <!-- ///////////////// END VIDEO ///////////////// -->




            <!-- ///////////////// HABILIDADES ///////////////// -->

            <div id="habilidades" class="sub-tabcontent">


                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['candidato_dash_Skills_minimum'] ?></h3>

                </div>

                <?php


                $contador_skills = 0;


                $all_skills = "SELECT Habilidades_generales_idHabilidades_generales, nombre_habilidad_general, valor FROM habilidades_candidato INNER JOIN habilidades_generales ON habilidades_candidato.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales WHERE Candidato_idCandidato = $id_cantidato";

                $resul_all_skills = mysqli_query($connection, $all_skills);

                $count = mysqli_num_rows($resul_all_skills);

                if (!$resul_all_skills) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }


                while ($row = mysqli_fetch_array($resul_all_skills)) {
                    $db_idHabilidad = $row['Habilidades_generales_idHabilidades_generales'];
                    $db_nombre_habilidad = $row['nombre_habilidad_general'];
                    $db_valor_skill = $row['valor'];
                    $contador_skills  = $contador_skills + 1;
                ?>
                    <div id='skill_<?php echo $contador_skills ?>' class='form-login__group' style='display: inline-flex; width: 100%;'>
                        <div class='form-login__group' style='width: 89%;'><select id="skill_selected_<?php echo $contador_skills ?>" class='form-login__input'>
                                <option value="<?php echo $db_idHabilidad ?>"><?php echo $db_nombre_habilidad; ?></option>
                                <option>asd</option>
                            </select></div>
                        <div class='form-login__group' style='width: 8%;'>
                            <div class='form-login__group'><select id="valor_selected_<?php echo $contador_skills ?>" class='form-login__input'>

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



                <div class="form-login__group" style="margin-top: 2rem;">
                    <button style="background-color: #2962ff;" onclick="save_skills(contador)" class="btn-cuadrado-submit btn-cuadrado-submit--green"><i style="color: white; padding-right: 6px;" class="fas fa-save"></i><?php echo $lang['candidato_dash_skills_save'] ?></button>

                    <div style="float: right;">
                        <button style="background-color: #2962ff;" onclick="add_skills()" class="btn-cuadrado-submit btn-cuadrado-submit--green">+</button>
                        <button style="color: #333; background-color: #ecdd00;" onclick="delete_skills()" class="btn-cuadrado-submit btn-cuadrado-submit--red">-</button>
                    </div>

                </div>

                <!-- middle Block -->
                <div id="container_skills">
                </div>



            </div>

            <!-- ///////////////// END HABILIDADES ///////////////// -->


            <!-- ///////////////// CERTIFICACIONES ///////////////// -->

            <!-- ///////////////// laboral ///////////////// -->
            <div id="experiencia" class="sub-tabcontent">
                <div class="form-login__group">
                    <h3 class="text-animation"><?php echo $lang['candidato_dash_Work_experience'] ?></h3>
                </div>


                <div class="form-login__group" style="margin-top: 2rem; margin-bottom: 2rem;">


                    <div>
                        <button style="background-color: #2962ff;" onclick="add_exp()" class="btn-cuadrado-submit btn-cuadrado-submit--green">+</button>
                        <button onclick="delete_exp()" style="color: #333; background-color: #ecdd00;" class="btn-cuadrado-submit btn-cuadrado-submit--red">-</button>

                    </div>

                </div>



                <div id="container_exp_lab">

                    <div id="accordion">
                        <?php

                        $contador_exp = 0;

                        $request_exp = "SELECT * FROM certificados_candidato_laboral where Candidato_idCandidato = $id_cantidato";


                        $resul_exp = mysqli_query($connection, $request_exp);
                        if (!$resul_exp) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_exp)) {
                            $db_idCertificado_laboral = $row['idCertificados_candidato_laboral'];
                            $db_Certificado_laboral_nombre_empresa = $row['nombre_empresa'];
                            $db_Certificado_laboral_cargo_ocupado = $row['cargo_ocupado'];
                            $db_Certificado_laboral_tiempo_laborado = $row['inicio_tiempo_laborado'];
                            $db_Certificado_laboral_tiempo_laborado_final = $row['final_tiempo_laborado'];
                            $db_Certificado_laboral_funciones_realizadas = $row['funciones_realizadas'];
                            $db_Certificado_laboral_motivo_retiro = $row['motivo_retiro'];
                            $db_Certificado_laboral_certificacion_laboral = $row['certificacion_laboral'];

                            $contador_exp = $contador_exp + 1;

                        ?>


                            <h3 id="exp_<?php echo $contador_exp ?>"><?php echo ucfirst($db_Certificado_laboral_nombre_empresa); ?></h3>
                            <div id="exp1_<?php echo $contador_exp ?>">

                                <div style="margin-top: 2rem;">
                                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                                        <div class="form-login__group" style="width: 48%; padding-right: 5%;"><input placeholder="<?php echo $lang['candidato_dash_company_name'] ?>" type="text" class="form-login__input" id="nombre_empresa_laboral_<?php echo $contador_exp ?>" value="<?php echo ucfirst($db_Certificado_laboral_nombre_empresa); ?>" required></div>
                                        <div class="form-login__group" style="width: 45%;"><input type="text" class="form-login__input" placeholder="<?php echo $lang['candidato_dash_position_held'] ?>" id="cargo_ocupado_laboral_<?php echo $contador_exp ?>" value="<?php echo $db_Certificado_laboral_cargo_ocupado ?>" required></div>
                                    </div>
                                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                                        <div class="form-login__group" style="width: 48%; padding-right: 5%;"><label for="" class="form-browser__label"><?php echo $lang['candidato_dash_start_date'] ?></label><input type="date" id="inicio_tiempo_laborado_<?php echo $contador_exp ?>" class="form-login__input" placeholder="Tiempo Laborado" value="<?php echo $db_Certificado_laboral_tiempo_laborado ?>" required></div>
                                        <div class="form-login__group" style="width: 45%;"><label class="form-browser__label"><?php echo $lang['candidato_dash_finish_date'] ?></label><input type="date" id="final_tiempo_laborado_<?php echo $contador_exp ?>" class="form-login__input" placeholder="Tiempo Laborado" value="<?php echo $db_Certificado_laboral_tiempo_laborado_final ?>" required></div>
                                    </div>

                                    <div class="form-login__group">
                                        <h3 class="text-animation"><?php echo $lang['candidato_dash_functions_performed'] ?></h3>
                                    </div>
                                    <div class="form-login__group"><textarea class="formtext-blocked" id="funciones_realizadas_laboral_<?php echo $contador_exp ?>" placeholder="<?php echo $lang['candidato_dash_summary_functions'] ?>"><?php echo $db_Certificado_laboral_funciones_realizadas ?></textarea></div>
                                    <div class="form-login__group">
                                        <h3 class="text-animation"><?php echo $lang['candidato_dash_reason_withdrawal'] ?></h3>
                                    </div>
                                    <div class="form-login__group"><textarea class="formtext-blocked" id="motivo_retiro_laboral_<?php echo $contador_exp ?>" placeholder="<?php echo $lang['candidato_dash_summary_withdrawal'] ?>"><?php echo $db_Certificado_laboral_motivo_retiro ?></textarea> </div>
                                    <div class="form-login__group" style="margin-top: 2rem; visibility: hidden; display: none;">
                                        <input style="background-color: #2962ff;" type="file" id="pdf_exp_<?php echo $contador_exp ?>" class="btn-cuadrado-submit btn-cuadrado-submit--green">
                                    </div>
                                </div>

                            </div>




                        <?php

                        }

                        ?>
                    </div>

                    <div class="form-login__group" style="margin-top: 2rem;">
                        <button style="background-color: #2962ff;" onclick="save_laboral(contador_exp)" class="btn-cuadrado-submit btn-cuadrado-submit--green"><i style="color: white; padding-right: 6px;" class="fas fa-save"></i><?php echo $lang['candidato_dash_exp_save'] ?></button>
                    </div>
                </div>






                <!-- ///////////////// EDUCACION ///////////////// -->

                <div class="form-login__group" style="margin-top: 2rem;">
                    <h3 class="text-animation"><?php echo $lang['candidato_dash_education'] ?></h3>
                </div>

                <div class="form-login__group" style="margin-top: 2rem;">
            
                    <div>
                        <button style="background-color: #2962ff;" onclick="add_edu()" class="btn-cuadrado-submit btn-cuadrado-submit--green">+</button>
                        <button onclick="delete_edu()" style="color: #333; background-color: #ecdd00;" class="btn-cuadrado-submit btn-cuadrado-submit--red">-</button>
                    </div>

                </div>




                <script>
                    $(function() {
                        $("#accordion").accordion({
                            collapsible: true,
                            heightStyle: "content",
                            active: false
                        });
                    });
                </script>

                <script>
                    $(function() {
                        $("#accordion1").accordion({
                            collapsible: true,
                            heightStyle: "content",
                            active: false
                        });
                    });
                </script>



                <div id="container_edu">

                    <div id="accordion1">


                        <?php

                        $contador_edu = 0;

                        $request_edu = "SELECT * FROM certificados_candidato_educacion where Candidato_idCandidato = $id_cantidato";


                        $resul_edu = mysqli_query($connection, $request_edu);
                        if (!$resul_exp) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_edu)) {
                            $db_idCertificado_edu = $row['idCertificados_candidato'];
                            $db_titulo_obtenido = $row['titulo_obtenido'];
                            $db_nombre_institucion_edu = $row['nombre_institucion'];
                            $db_fecha_finalizacion_edu = $row['fecha_finalizacion'];
                            $db_encurso_estudiando_edu = $row['encurso_estudiando'];

                            $contador_edu = $contador_edu + 1;

                        ?>


                            <h3 id="edu_<?php echo $contador_edu ?>"> <?php echo $db_nombre_institucion_edu ?></h3>

                            <div id="edu1_<?php echo $contador_edu ?>">

                                <div style="margin-top: 2rem;">



                                    <div class="form-login__group" style="width: 100%; margin-bottom: 2rem;">
                                        <input type="text" class="form-login__input" placeholder="Titulo Obtenido" id="titulo_obtenido_<?php echo $contador_edu ?>" value="<?php echo $db_titulo_obtenido ?>" required>
                                    </div>


                                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                                            <input type="text" class="form-login__input" placeholder="Nombre de Institucion" id="nombre_institucion_<?php echo $contador_edu ?>" value="<?php echo $db_nombre_institucion_edu ?>" required>
                                        </div>
                                        <div class="form-login__group" style="width: 45%;">

                                            <div class="form-login__group">
                                                <select type="text" class="form-login__input" id="titulo_<?php echo $contador_edu ?>" placeholder="Nivel de estudio">

                                                    <option><?php echo $lang['candidato_dash_education_level_1'] ?></option>
                                                    <option><?php echo $lang['candidato_dash_education_level_2'] ?></option>
                                                    <option><?php echo $lang['candidato_dash_education_level_3'] ?></option>
                                                    <option><?php echo $lang['candidato_dash_education_level_4'] ?></option>
                                                    <option><?php echo $lang['candidato_dash_education_level_5'] ?></option>
                                                    <option><?php echo $lang['candidato_dash_education_level_6'] ?></option>
                                                    <option><?php echo $lang['candidato_dash_education_level_7'] ?></option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- middle Block -->
                                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                                            <select type="text" id="fecha_finalizacion_<?php echo $contador_edu ?>" class="form-login__input">



                                                <option><?php echo $lang['candidato_dash_education_status_finished'] ?></option>
                                                <option><?php echo $lang['candidato_dash_education_status_graduated'] ?></option>

                                            </select>
                                        </div>
                                        <div class="form-login__group" style="width: 45%;">
                                            <input type="date" class="form-login__input" placeholder="Fecha de Nacimiento" id="encurso_estudiando_<?php echo $contador_edu ?>" value="<?php echo $db_fecha_finalizacion_edu ?>">
                                        </div>
                                    </div>

                                </div>



                            </div>



                        <?php

                        }

                        ?>
                    </div>

                    <div class="form-login__group" style="margin-top: 2rem;">
                        <button style="background-color: #2962ff;" onclick="save_edu(contador_edu)" class="btn-cuadrado-submit btn-cuadrado-submit--green"><i style="color: white; padding-right: 6px;" class="fas fa-save"></i><?php echo $lang['candidato_dash_education_save'] ?></button>
                    </div>

                </div>



            </div>

            <!-- ///////////////// END CERTIFICACIONES ///////////////// -->


            <!-- ///////////////// SOCIAL BLOCK ///////////////// -->

            <div id="social-profile" class="sub-tabcontent">





                <h3 class="text-animation"><?php echo $lang['candidato_dash_social_profile'] ?></h3>

                <div class="row">
                    <div class="col-1-of-2">

                        <div class="form-social__group">
                            <input value="<?php

                                            $redes_json = $_SESSION['s_url_red_social'];
                                            $decode_redes =  json_decode($redes_json);
                                            echo $decode_redes->{'whatsapp'};

                                            ?>" type="url" class="form-social__whatsapp" placeholder="<?php echo $lang['candidato_dash_social_url'] ?> " id="social_whatsapp" required>
                        </div>


                        <div class="form-social__group">
                            <input value="<?php

                                            $redes_json = $_SESSION['s_url_red_social'];
                                            $decode_redes =  json_decode($redes_json);
                                            echo $decode_redes->{'facebook'};

                                            ?>" type="url" class="form-social__facebook" placeholder=" <?php echo $lang['candidato_dash_social_url'] ?>" id="social_facebook" required>
                        </div>

                    </div>

                    <div class="col-1-of-2">

                        <div class="form-social__group">
                            <input value="<?php

                                            $redes_json = $_SESSION['s_url_red_social'];
                                            $decode_redes =  json_decode($redes_json);
                                            echo $decode_redes->{'linkedin'};

                                            ?>" type="url" class="form-social__linkedin" placeholder=" <?php echo $lang['candidato_dash_social_url'] ?>" id="social_linkedin" required>
                        </div>

                        <div class="form-social__group">
                            <input value="<?php

                                            $redes_json = $_SESSION['s_url_red_social'];
                                            $decode_redes =  json_decode($redes_json);
                                            echo $decode_redes->{'instagram'};

                                            ?>" type="url" class="form-social__instagram" placeholder=" <?php echo $lang['candidato_dash_social_url'] ?>" id="social_instagram" required>
                        </div>

                    </div>



                </div>

                <div class="form-login__group" style="margin-top: 2rem;">
                    <button style="background-color: #2962ff;" onclick="save_social()" class="btn-cuadrado-submit btn-cuadrado-submit--green"><i style="color: white; padding-right: 6px;" class="fas fa-save"></i><?php echo $lang['candidato_dash_social_save'] ?></button>
                </div>
            </div>


        </div>
    </div>



</section>