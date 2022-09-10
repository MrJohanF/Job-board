<section class="edit-profile">
    <div class="row">
        <div class="col-1-of-4">
            <!-- ///////////////// TABS ///////////////// -->

            <a href="#info_laboral" class="option-sub-tabs" onclick="openTabEmpleador(event, 'emplea_edit_info')"><?php echo $lang['dash_edit_main_text'] ?></a>
            <a href="#perfil_publico" class="option-sub-tabs" onclick="openTabEmpleador(event, 'edit_public_profile')"><?php echo $lang['dash_edit_main_text-2'] ?></a>
            <a href="#media_content" class="option-sub-tabs" onclick="openTabEmpleador(event, 'edit_public_video')"><?php echo $lang['dash_edit_main_social_network'] ?></a>


        </div>
        <div class="col-3-of-4">
            <div id="emplea_edit_info" class="emplea-tabcontent" style="display: block;">

                <div class="form-login__group">
                    <h3 class="text-animation">Informacion completada</h3>
                </div>

                <div id="bar_form_completed" class="form-login__group">

                </div>



                <form method="POST" style="margin-top: 4rem;" enctype="multipart/form-data">

                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['dash_edit_icon_company'] ?></h3>
                    </div>

                    <div class="form-login__group">
                        <label style="border-radius: 4px; padding-top: 1rem; height: 3rem; color: white; background-color: #2962ff;  width: 30rem; text-align: center; font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 1.5rem; " for="emple_profile" class="custom-file-upload">
                            <?php echo $lang['dash_edit_icon_company_btn'] ?> <i style="padding-left: 1rem;" class="fas fa-user-edit"></i>
                        </label>
                        <input style="background-color: #004794; display: none;" id="emple_profile" type="file" accept="image/jpeg, image/png, image/jpg" class="btn-cuadrado-submit btn-cuadrado-submit--green">

                        <div id="output"></div>

                        <script>
                            document.getElementById('emple_profile').onchange = function() {
                                $('.custom-file-upload').html(document.getElementById('emple_profile').files[0].name);

                            }
                        </script>

                    </div>

                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['dash_edit_details_company'] ?></h3>
                    </div>

                    <!-- middle Block -->
                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['dash_edit_details_company_field-name'] ?>" id="emple_nombre_empresa" value="<?php echo $_SESSION['e_nombre_empresa'] ?>" required>
                        </div>
                        <div class="form-login__group" style="width: 45%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['dash_edit_details_company_field-nit'] ?>" id="emple_nit_empresa" value="<?php echo $_SESSION['e_nit_empresa'] ?>">
                        </div>
                    </div>


                    <!-- middle Block -->
                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['dash_edit_details_company_field-address'] ?>" id="emple_direccion_empresa" value="<?php echo $_SESSION['e_direccion_empresa'] ?>">
                        </div>
                        <div class="form-login__group" style="width: 45%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['dash_edit_details_company_field-phone'] ?>" id="emple_telefono_empresa" value="<?php echo $_SESSION['e_telefono_empresa'] ?>">
                        </div>
                    </div>


                    <!-- middle Block -->
                    <div class="form-login__group" style="display: inline-flex; width: 100%;">
                        <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['dash_edit_details_company_field-contact'] ?>" id="emple_nombre_contacto_empresa" value="<?php echo $_SESSION['e_nombre_contacto_empresa'] ?>" required>
                        </div>
                        <div class="form-login__group" style="width: 45%;">
                            <input type="text" class="form-login__input required" placeholder="<?php echo $lang['dash_edit_details_company_field-email'] ?>" id="emple_correo_empresa" value="<?php echo $_SESSION['e_email_empresa'] ?>" disabled>
                        </div>
                    </div>



                    <!-- full Block -->
                    <div class="form-login__group">
                        <input type="text" class="form-login__input required" placeholder="<?php echo $lang['dash_edit_details_company_field-cellphone'] ?>" id="emple_telefono_celular_empresa" value="<?php echo $_SESSION['e_telefono_celular_empresa'] ?>">
                    </div>




                    <h3 class="text-animation"><?php echo $lang['dash_edit_description_company'] ?></h3>
                    <textarea class="formtext required" id="emple_descripcion_empresa" placeholder="<?php echo $lang['dash_edit_description_field_company'] ?>" style="width: 97.7%; margin-bottom: 2rem; padding-top: 1rem; padding-left: 1rem; background-color: white;"><?php echo $_SESSION['e_description_empresa'] ?></textarea>

                    <h3 class="text-animation"><?php echo $lang['dash_edit_benefits'] ?></h3>
                    <textarea class="formtext required" id="emple_beneficios_empresa" placeholder="<?php echo $lang['dash_edit_field_benefits'] ?>" style="background-color: white; width: 97.7%; padding-top: 1rem; padding-left: 1rem; margin-bottom: 2rem;"><?php echo $_SESSION['e_beneficios_empresa'] ?></textarea>

                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['dash_edit_employee_number'] ?></h3>
                    </div>

                    <!-- full block -->
                    <div class="form-login__group">
                        <input type="number" class="form-login__input required" placeholder="<?php echo $lang['dash_edit_employee_number'] ?>" id="emple_numero_empleados_empresa" value="<?php echo $_SESSION['e_numero_empleados'] ?>">

                    </div>


                    <div class="form-login__group">
                        <h3 class="text-animation"><?php echo $lang['dash_edit_select_country'] ?></h3>
                    </div>

                    <div class="form-login__group">
                        <select class="form-login__input" id="ubicacion" onchange="filtroPais()">

                            <?php include "php/db.php" ?>

                            <?php

                            $id_pais = $_SESSION['e_pais_empresa'];

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






                    <div class="form-login__group">
                        <select class="form-login__input" id="ubicacion_ciudad" required>

                        </select>
                    </div>


                    <div id="panel_respuesta">
                    </div>

                    <div class="form-login__group">
                        <input type="button" onclick="btn_guardar_empresa_dashboard()" class="btn-cuadrado-full btn-cuadrado-full--yellow" value="Guardar" style="margin-top: 2rem; background-color: #2962ff;">
                    </div>
                </form>


            </div>




            <div id="edit_public_profile" class="emplea-tabcontent" style="display: none;">

                <style>
                    .cuadrado_short {
                        background-color: #4174ff;
                        height: 6rem;
                        flex: 1;
                        margin: 0.5rem;
                        border-radius: 3px;
                        position: relative;
                        text-align: center;
                    }


                    .cuadrado_full {
                        background-color: #4941ff;
                        width: 100%;
                        height: 7rem;
                        text-align: center;
                        border-radius: 3px;

                    }

                    .custom-file-upload {
                        display: inline-block;
                        padding: 6px 12px;
                        cursor: pointer;
                        position: relative;
                        top: 18%;
                    }

                    .input_custom[type="file"] {
                        display: none;
                    }
                </style>


                <div class="row">
                    <div class="col-1-of-2">

                        <?php

                        $idEmpresa = $_SESSION['e_idEmpresa'];

                        $getImg_top = "SELECT * FROM `design_company_profile`  WHERE idEmpresa_empresa = $idEmpresa and posicion = 'top'";
                        $resul_getImg_top = mysqli_query($connection, $getImg_top);
                        while ($row = mysqli_fetch_array($resul_getImg_top)) {

                            $db_getTop_tipoContenido = $row['contenido_dato'];
                            $db_getTop_posicion = $row['tipo_contenido'];
                        }

                        $getImg_footer = "SELECT * FROM `design_company_profile`  WHERE idEmpresa_empresa = $idEmpresa and posicion = 'footer' ";
                        $resul_getImg_footer = mysqli_query($connection, $getImg_footer);
                        while ($row = mysqli_fetch_array($resul_getImg_footer)) {

                            $db_getFooter_tipoContenido = $row['contenido_dato'];
                            $db_getFooter_posicion = $row['tipo_contenido'];
                        }

                        ?>


                        <div style="display: none;">
                            <div class="cuadrado_full">
                                <label style="font-size: 2rem;" for="input_top_banner" class="selector_top_banner custom-file-upload">
                                    <span style="color: aliceblue; font-size: 3rem; ">

                                        <?php if (empty($db_getTop_tipoContenido)) :  ?>

                                            <i class="fas fa-image"></i>

                                        <?php else :  ?>

                                            <img style="width: 3rem;" src="<?php echo $db_getTop_tipoContenido ?>" alt="">

                                        <?php endif  ?>

                                    </span>
                                </label>
                                <input contenido_tipo="img" class="input_custom" id="input_top_banner" type="file" accept="image/jpeg, image/png, image/jpg" />
                            </div>
                        </div>

                        <!-- GRUPO -->


                        <?php


                        $contadorgrupos = 0;
                        $contadorelementos = 0;


                        $all_grupo = "SELECT * FROM `design_company_profile` INNER JOIN empresa ON design_company_profile.idEmpresa_empresa = empresa.idEmpresa WHERE idEmpresa_empresa = $idEmpresa and posicion = 'middle' GROUP BY grupo";

                        $resul_all_grupo = mysqli_query($connection, $all_grupo);
                        $count_grupos = mysqli_num_rows($resul_all_grupo);

                        if (!$resul_all_grupo) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_all_grupo)) {

                            $grupo = $row['grupo'];
                            $db_descripcion_empresa = $row['descripcion_empresa'];


                        ?>



                            <div grupo="<?php echo $grupo ?>" style="width: 100%; display: inline-flex;" id="items<?php echo $grupo ?>">


                                <?php

                                $all_elementos = "SELECT * FROM `design_company_profile` WHERE grupo = '{$grupo}' ";

                                $resul_all_elementos = mysqli_query($connection, $all_elementos);
                                if (!$resul_all_elementos) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }

                                while ($row = mysqli_fetch_array($resul_all_elementos)) {



                                    $tipo_contenido = $row['tipo_contenido'];
                                    $posicion = $row['posicion'];
                                    $grupo_elemento = $row['grupo'];
                                    $orden = $row['orden'];
                                    $contenido_dato = $row['contenido_dato'];

                                ?>

                                    <?php if ($tipo_contenido == "txt") : ?>

                                        <?php $contadorelementos = $contadorelementos + 1; ?>

                                        <div class="cuadrado_short" data-id="1">
                                            <span onclick="display_text_area_<?php echo $contadorelementos ?>()" id="btn_edit_txt_second" style="color: aliceblue; position: relative; top: 23%; font-size: 3rem; left: -6px; cursor: pointer;">
                                                <i class="fas fa-align-center"></i>
                                            </span>
                                        </div>

                                        <div class="contenedor_values_txt">

                                            <div class="row txt_area_container_<?php echo  $contadorelementos ?>">
                                                <textarea contenido_tipo="txt" style="padding-left: 1rem; padding-top: 1rem;" id="input_grupo_<?php echo $grupo ?>_elemento_2" class="formtext required" placeholder="Agrega tu informacion personalizada" style="margin-bottom: 2rem; background-color: white;"><?php echo $contenido_dato ?></textarea>
                                            </div>

                                        </div>

                                    <?php endif; ?>

                                    <?php if ($tipo_contenido == "img") :  ?>

                                        <div class="cuadrado_short" data-id="2">
                                            <label style="font-size: 2rem;" for="input_grupo_<?php echo $grupo ?>_elemento_1" class="selector_middle_img custom-file-upload">
                                                <span style="color: aliceblue; font-size: 3rem; ">

                                                    <?php if (empty($contenido_dato)) :  ?>

                                                        <i class="fas fa-image"></i>

                                                    <?php else :  ?>

                                                        <img style="width: 3rem;" src="<?php echo $contenido_dato; ?>" alt="">

                                                    <?php endif  ?>


                                                </span>
                                            </label>
                                            <input contenido_tipo="img" class="input_custom" id="input_grupo_<?php echo $grupo ?>_elemento_1" type="file" accept="image/jpeg, image/png, image/jpg" />
                                        </div>

                                    <?php endif; ?>


                                <?php

                                }
                                ?>

                            </div>

                        <?php

                        }
                        ?>


                        <?php if ($count_grupos == 0) : ?>



                            <div grupo="1" style="width: 100%; display: inline-flex;" id="items1">

                                <div onclick="display_text_area_1()" class="cuadrado_short" data-id="1">
                                    <span id="btn_edit_txt_second" style="color: aliceblue; position: relative; top: 23%; font-size: 3rem; cursor: pointer;">
                                        <i class="fas fa-align-center"></i>
                                    </span>
                                </div>

                                <div class="cuadrado_short" data-id="2">
                                    <label for="input_grupo_1_elemento_1" class="selector_footer_img custom-file-upload">
                                        <span style="color: aliceblue; font-size: 3rem; ">
                                            <i class="fas fa-image"></i>
                                        </span>
                                    </label>
                                    <input contenido_tipo="img" class="input_custom" id="input_grupo_1_elemento_1" type="file" accept="image/jpeg, image/png, image/jpg" />
                                </div>

                            </div>




                            <div class="contenedor_values_txt">

                                <div class="row txt_area_container_1">
                                    <textarea contenido_tipo="txt" style="padding-left: 1rem; padding-top: 1rem; background-color: white;" id="input_grupo_1_elemento_2" class="formtext required" placeholder="Agrega tu informacion personalizada" style="margin-bottom: 2rem;"></textarea>
                                </div>


                            </div>



                        <?php endif; ?>




                        <div>
                            <div class="cuadrado_full">
                                <label for="input_footer_banner" class="selector_footer_img custom-file-upload">
                                    <span style="color: aliceblue; font-size: 3rem; ">

                                        <?php if (empty($db_getFooter_tipoContenido)) :  ?>

                                            <i class="fas fa-image"></i>

                                        <?php else :  ?>

                                            <img style="width: 3rem;" src="<?php echo $db_getFooter_tipoContenido; ?>" alt="">

                                        <?php endif  ?>


                                    </span>
                                </label>

                                <input contenido_tipo="img" class="input_custom" id="input_footer_banner" type="file" accept="image/jpeg, image/png, image/jpg" />
                            </div>
                        </div>

                    </div>
                    <div class="col-1-of-2">

                        <div style="text-align: justify;">
                            <h1 style="color: #676666; font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 1.6rem;">
                                <?php echo $lang['dash_edit_custom_profile'] ?>
                            </h1>
                            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem;">
                                <?php echo $lang['dash_edit_custom_profile_descripcion'] ?>
                            </h1>

                            <h1 style="margin-top: 1rem; color: #676666; font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 1.6rem;">
                                <?php echo $lang['dash_edit_change_photo'] ?>
                            </h1>
                            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem;">
                                <?php echo $lang['dash_edit_change_photo_description'] ?>
                            </h1>
                            <div class="form-login__group">
                                <a onclick="btn_save_banner_top()" style="margin-left: 0;" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><?php echo $lang['dash_edit_btn_save'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="containers_txt">
                </div>


                <script>
                    let sortable_first = document.getElementById("items1");


                    Sortable.create(sortable_first, {
                        group: {
                            name: "desing1"
                        },
                        animation: 150,
                        store: {
                            set: function(sortable) {
                                const order = sortable.toArray();

                                localStorage.setItem('desing1', order.join('|'));
                            },

                            get: function() {
                                const order = localStorage.getItem('desing1');
                                return order ? order.split('|') : [];
                            }
                        }
                    })
                </script>

                <script>
                    function filtroPais() {
                        let select = document.getElementById("ubicacion"); /*Obtener el SELECT */
                        let paisSeleccion1 = select.options[select.selectedIndex].id; /* Obtener el valor */
                        let oc = {
                            paisSeleccion1: paisSeleccion1
                        };
                        $.ajax({
                            type: "POST",
                            url: '../php/filtro_ciudad.php',
                            data: oc,
                            beforeSend: function() {},
                            success: function(data) {
                                $("#ubicacion_ciudad").html(data);
                            }
                        }).always(function() {
                            console.log("complete");
                        });
                    }
                </script>



                <script>
                    let windowExpanded = 0;

                    function display_text_area_1() {

                        if (windowExpanded === 0) {

                            $(".txt_area_container_1").show("fast");
                            windowExpanded = 1;

                        } else {
                            windowExpanded = 0;
                            $(".txt_area_container_1").hide("fast");
                        }

                    }

                    window.onload = function check() {

                        console.log("funciona auto carga");
                        filtroPais();

                        $(".contenedor_values_txt").appendTo("#containers_txt");

                        $(".txt_area_container_1").hide();

                        function filtro_auto() {
                            var select = document.getElementById("ubicacion"); /*Obtener el SELECT */
                            var paisSeleccion1 = select.options[select.selectedIndex].id; /* Obtener el valor */
                            console.log("ciudad es " + paisSeleccion1);
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
                    let output = document.getElementById('output');

                    function btn_guardar_empresa_dashboard() {


                        let e = document.getElementById('emple_profile');

                        const file = e.files[0];


                        if (!file) {
                            save_information("", "");

                        } else {
                            new Compressor(file, {
                                quality: 1,

                                success(result) {

                                    let newImage = new Image();

                                    newImage.src = URL.createObjectURL(result);
                                    newImage.alt = 'Compressed image';
                                    //output.appendChild(newImage);

                                    save_information(result, result.name)

                                },
                                error(err) {
                                    console.log(err.message);


                                },
                            });
                        }

                    }


                    function save_information(objeto_img, objeto_img_name) {


                        var idEmpresa = "<?php echo $idEmpresa ?>";
                        var nombre_empresa = $("#emple_nombre_empresa").val();
                        var nit_empresa = $("#emple_nit_empresa").val();
                        var pais_empresa = $("#ubicacion").val();
                        var ciudad_empresa = $("#ubicacion_ciudad").val();
                        var direccion_empresa = $("#emple_direccion_empresa").val();
                        var telefono_empresa = $("#emple_telefono_empresa").val();
                        var telefono_celular_empresa = $("#emple_telefono_celular_empresa").val();
                        var nombre_contacto_empresa = $("#emple_nombre_contacto_empresa").val();
                        var correo_empresa = $("#emple_correo_empresa").val();
                        var descripcion_empresa = $("#emple_descripcion_empresa").val();
                        var beneficios_empresa = $("#emple_beneficios_empresa").val();
                        var numero_empleados = $("#emple_numero_empleados_empresa").val();

                        var paqueteDeDatos = new FormData();


                        paqueteDeDatos.append('idEmpresa', idEmpresa);
                        paqueteDeDatos.append('nombre_empresa', nombre_empresa);
                        paqueteDeDatos.append('nit_empresa', nit_empresa);
                        paqueteDeDatos.append('pais_empresa', pais_empresa);
                        paqueteDeDatos.append('ciudad_empresa', ciudad_empresa);
                        paqueteDeDatos.append('direccion_empresa', direccion_empresa);
                        paqueteDeDatos.append('telefono_empresa', telefono_empresa);
                        paqueteDeDatos.append('telefono_celular_empresa', telefono_celular_empresa);
                        paqueteDeDatos.append('nombre_contacto_empresa', nombre_contacto_empresa);
                        paqueteDeDatos.append('correo_empresa', correo_empresa);
                        paqueteDeDatos.append('descripcion_empresa', descripcion_empresa);
                        paqueteDeDatos.append('beneficios_empresa', beneficios_empresa);
                        paqueteDeDatos.append('numero_empleados', numero_empleados);
                        if (objeto_img_name != "") {
                            paqueteDeDatos.append('img', objeto_img, objeto_img_name);
                        }

                        //paqueteDeDatos.append('img', objeto_img.files[0]);


                        $.ajax({
                            type: "POST",
                            url: "../php/upload_empleador.php",
                            data: paqueteDeDatos,
                            contentType: false,
                            processData: false,
                            cache: false,
                            beforeSend: function(objeto) {},
                            success: function(data) {
                                console.log(data);

                                //$("#panel_respuesta").html(data);

                                $('html, body').animate({
                                    scrollTop: 0
                                }, 'slow'); //seleccionamos etiquetas,clase o identificador destino, creamos animación hacia top de la página.

                                swal("Informacion actualizada!", "Completado!", "success").then((value) => {
                                    location.reload();
                                });

                                setTimeout(function() {

                                    // location.reload();
                                    //$("#panel_respuesta").html("");
                                }, 900);
                            }
                        })
                    }
                </script>

                <style>
                    .swal-text {
                        font-family: 'Poppins', sans-serif;
                    }

                    .swal-title {
                        font-family: 'Poppins', sans-serif;
                    }
                </style>


                <script>
                    document.getElementById('input_top_banner').onchange = function() {
                        $('.selector_top_banner').html(document.getElementById('input_top_banner').files[0].name);

                    }

                    document.getElementById('input_grupo_1_elemento_1').onchange = function() {
                        $('.selector_middle_img').html(document.getElementById('input_grupo_1_elemento_1').files[0].name);

                    }

                    document.getElementById('input_footer_banner').onchange = function() {
                        $('.selector_footer_img').html(document.getElementById('input_footer_banner').files[0].name);
                    }
                </script>


                <script>
                    function btn_save_banner_top() {


                        const img_top_banner = document.getElementById('input_top_banner');
                        const img_middle = document.getElementById('input_grupo_1_elemento_1');
                        const img_footer_banner = document.getElementById('input_footer_banner');

                        let fileList = [];
                        let compressedImg = [];
                        let limitImageUpload = 0;


                        if (img_top_banner.files[0] !== undefined || img_middle.files[0] !== undefined || img_footer_banner.files[0] !== undefined) {

                            if (img_top_banner.files[0] !== undefined) {

                                img_top_banner.files[0].oldPosition = "img_top";

                                fileList.push(img_top_banner.files[0]);
                            }

                            if (img_middle.files[0] !== undefined) {

                                img_middle.files[0].oldPosition = "img_middle_first";

                                fileList.push(img_middle.files[0]);

                            }
                            if (img_footer_banner.files[0] !== undefined) {

                                img_footer_banner.files[0].oldPosition = "img_footer";
                                fileList.push(img_footer_banner.files[0]);
                            }

                            for (i = 0; i < fileList.length; i++) {


                                new Compressor(fileList[i], {
                                    quality: 0.8,


                                    beforeDraw(context, canvas) {

                                    },

                                    drew(context, canvas) {

                                    },
                                    success(result) {



                                        var newImage = new Image();



                                        newImage.src = URL.createObjectURL(result);
                                        newImage.alt = 'Compressed image';
                                        //output.appendChild(newImage);


                                        result.newposition = fileList[limitImageUpload].oldPosition;

                                        limitImageUpload = limitImageUpload + 1;

                                        compressedImg.push(result);


                                        if (limitImageUpload == fileList.length) {

                                            save_information_design(compressedImg);
                                        }


                                    },
                                    error(err) {
                                        console.log(err.message);

                                    },
                                });


                            }


                        } else {
                            save_information_design();
                        }



                    }


                    function save_information_design(data) {


                        let idEmpresa = "<?php echo $_SESSION['e_idEmpresa']; ?>";
                        let paqueteDeDatos = new FormData();
                        let cantidad_propiedad_elemento = 0;

                        var ddData4 = new Object;


                        //numero de veces que se insertan grupos de datos

                        let contador_grupos = 1;
                        let contador_elementos = 2;
                        let test = 0;


                        for (grupo_loop = 1; grupo_loop <= contador_grupos; grupo_loop++) {

                            ddData4[grupo_loop] = asignadorelementos(grupo_loop, 2);

                        }
                        //  console.log(Object.values(ddData4));


                        function asignadorelementos(grupo, elementos) {

                            var ddData2 = new Object;

                            for (elmento_loop = 1; elmento_loop <= elementos; elmento_loop++) {


                                var objeto = {

                                    tipo_contenido: $("#input_grupo_" + grupo + "_elemento_" + elmento_loop).attr("contenido_tipo"),
                                    posicion: "middle",
                                    grupo: $("#items" + grupo).attr("grupo"),
                                    orden: localStorage.getItem('desing' + grupo),
                                    contenido_dato: $("#input_grupo_" + grupo + "_elemento_" + elmento_loop).val()

                                }

                                ddData2[elmento_loop] = objeto;


                            }


                            return ddData2;

                        }


                        paqueteDeDatos.append('idEmpresa', idEmpresa);
                        paqueteDeDatos.append('array', JSON.stringify(ddData4));
                        console.log(ddData4);

                        if (data !== undefined) {
                            for (i = 0; i < data.length; i++) {
                                if (data[i].newposition == "img_top") {
                                    paqueteDeDatos.append(data[i].newposition, data[i], data[i].name);
                                }
                                if (data[i].newposition == "img_middle_first") {
                                    paqueteDeDatos.append(data[i].newposition, data[i], data[i].name);
                                }
                                if (data[i].newposition == "img_footer") {
                                    paqueteDeDatos.append(data[i].newposition, data[i], data[i].name);
                                }
                            }
                        }





                        $.ajax({
                            type: "POST",
                            url: "../php/uplo_emple_publ_profile_top.php",
                            data: paqueteDeDatos,
                            contentType: false,
                            processData: false,
                            cache: false,
                            beforeSend: function(objeto) {},
                            success: function(data) {


                    
                                swal("Exito!", "Informacion actualizada", "success").then((value) => {
                                    location.reload();
                                });






                            }
                        })


                    }
                </script>


            </div>

            <div id="edit_public_video" class="emplea-tabcontent" style="display: none;">


                <!-- ///////////////// VIDEO ///////////////// -->



                <div id="container_video">


                    <div class="row">
                        <div class="form-social__group">
                            <input id="url-video" type="url" class="form-social__youtube" placeholder="<?php echo $lang['candidato_dash_video_url'] ?>" required>
                        </div>
                        <button style="background-color: #2962ff;" onclick="add_video_empresa()" href="#" class="btn-cuadrado-submit btn-cuadrado-submit--green">+</button>
                        <button onclick="delete_video_empresa()" style="color: #333; background-color: #ecdd00;" href="#" class="btn-cuadrado-submit btn-cuadrado-submit--red">-</button>
                        <div style="float: right;">
                            <button style="background-color: #2962ff;" onclick="save_video_empresa(contador_video)" class="btn-cuadrado-submit btn-cuadrado-submit--green"><i style=" color: white; padding-right: 6px;" class="fas fa-save"></i><?php echo $lang['candidato_dash_video_save'] ?></button>
                        </div>
                    </div>


                    <?php

                    $contador_present = 0;
                    $request_present = "SELECT * FROM presentaciones_empresa where idEmpresa_empresa  = $idEmpresa";
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



                <!-- ///////////////// END VIDEO ///////////////// -->

            </div>

        </div>
</section>