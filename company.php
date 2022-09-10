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
    require "lang/" . $lang . ".php";
} else {
    require "lang/es.php";
}
?>

<?php

$idEmpresa = $_GET["empresa"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/awesomefont/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/icon-font.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>TuJob</title>
</head>

<body>

    <?php include "loader.php"; ?>

    <header style="height: 18rem;" class="header-browser">

        <div class="row">
            <div class="main_content">
                <div class="col-1-of-3">
                    <img src="img/emplea_logo.webp" alt="logo" style="height: 3.5rem;" class="header-browser__logo">
                </div>
                <div class="col-2-of-3">
                    <div class="main_options">
                        <?php include "header.php"; ?>
                    </div>
                </div>
            </div>
        </div>


        <!--         <div class="row">
            <div class="u-margin-top-4">
                <div class="col-1-of-3">
                    <div class="header-browser__line-vertical">
                        <h1 class="header-browser__title">Detalle compañia</h1>
                        <h2 class="header-browser__subtitle">Inicio / Detalle compañia</h2>
                    </div>
                </div>
                <div class="col-2-of-3">
                    <form action="#" class="form-browser">
                        <div class="form-browser__group">

                        </div>

                    </form>
                </div>
            </div>
        </div> -->

    </header>

    <main style="margin: 0; padding: 0;">

        <section class="section-ofertas" style="padding-top: 0; padding-bottom: 5rem;">


            <style>
                .elemento_part {
                    width: 100%;
                    margin-top: 4rem;
                    margin-bottom: 4rem;
                }

                .text_descripcion {
                    font-family: 'Poppins', sans-serif;
                    font-weight: 300;
                    font-size: 1.5rem;
                }

                .logo_company {
                    width: 21rem;
                    height: 21rem;
                    position: relative;

                    border-style: solid;
                    border-width: 1px;
                    border-radius: 4px;
                    border-color: gray;
                }


                .btn_verofertas {
                    font-family: 'Poppins', sans-serif;
                    font-weight: 400;
                    font-size: 1.3rem;

                    border-style: solid;
                    border-width: 1px;
                    border-radius: 3rem;
                    padding: 1rem 2rem 1rem 2rem;
                    transition: all 0.4s;
                    cursor: pointer;
                }

                .btn_verofertas:hover {

                    background-color: #1b3fdd;
                    color: white;
                    border-style: solid;
                    border-color: #1b3fdd;
                    border-width: 1px;
                    border-radius: 3rem;
                    padding: 1rem 2rem 1rem 2rem;
                }

                .description_title-company {
                    color: #313131;
                    font-family: 'Poppins', sans-serif;
                    font-weight: 500;
                    font-size: 3rem;
                }

                .description_title-city {
                    font-family: 'Poppins', sans-serif;
                    font-weight: 300;
                    font-size: 1.5rem;
                }

                .description_title-ofertas {
                    color: #1393ff;
                    font-family: 'Poppins', sans-serif;
                    font-weight: 300;
                    font-size: 1.5rem;
                }
            </style>

            <?php

            include "php/db.php";




            $enviar = "SELECT * FROM empresa INNER JOIN ciudad ON empresa.ciudad_empresa = ciudad.idCiudad WHERE empresa.idEmpresa = $idEmpresa";
            $resul_enviar = mysqli_query($connection, $enviar);


            $row = mysqli_fetch_array($resul_enviar);

            $db_idEmpresa = $row['idEmpresa'];
            $db_nombre_empresa = $row['nombre_empresa'];
            $db_nit_empresa = $row['nit_empresa'];
            $db_telefono_empresa = $row['telefono_empresa'];
            $db_ciudad_empresa = $row['ciudad_general'];
            $db_direccion_empresa = $row['direccion_empresa'];
            $db_nombre_contacto_empresa = $row['nombre_contacto_empresa'];
            $db_email_empresa = $row['email_empresa'];
            $db_numero_empleados = $row['numero_empleados'];
            $db_descripcion_empresa = $row['descripcion_empresa'];
            $db_beneficios_empresa = $row['beneficios_empresa'];
            $db_membresia = $row['membresia'];


            $request_oferta = "SELECT * FROM `oferta` WHERE oferta.Empresa_idEmpresa = $idEmpresa";
            $resul_oferta = mysqli_query($connection, $request_oferta);
            $count_oferta = mysqli_num_rows($resul_oferta);

            ?>




            <?php


            include "php/db.php";

            $request_profile = "SELECT * FROM design_company_profile WHERE idEmpresa_empresa = {$idEmpresa} ORDER BY grupo ASC";


            $resul_profile = mysqli_query($connection, $request_profile);

            if (!$resul_profile) {
                die("QUERY FAILED" . mysqli_error($connection));
            }



            $container = array();

            $contador_elmentos = 0;
            $contadorgrupos = 0;
            $contador_elmentos1 = 1;
            $db_contenido_datoImg_footer = "";

            while ($row = mysqli_fetch_array($resul_profile)) {

                $db_tipo_contenido = $row['tipo_contenido'];
                $db_posicion = $row['posicion'];
                $db_orden = $row['orden'];
                $db_grupo = $row['grupo'];
                $db_contenido_dato = $row['contenido_dato'];



                if ($db_tipo_contenido == "img" and $db_posicion == "middle") {

                    $container[$db_grupo - 1][$contador_elmentos]["tipo_contenido"] = $db_tipo_contenido;
                    $container[$db_grupo - 1][$contador_elmentos]["posicion"] = $db_posicion;
                    $container[$db_grupo - 1][$contador_elmentos]["grupo"] = $db_grupo;
                    $container[$db_grupo - 1][$contador_elmentos]["orden"] = $db_orden;
                    $container[$db_grupo - 1][$contador_elmentos]["contenido_dato"] = $db_contenido_dato;
                }

                if ($db_tipo_contenido == "txt" and $db_posicion == "middle") {

                    $container[$db_grupo - 1][$contador_elmentos1]["tipo_contenido"] = $db_tipo_contenido;
                    $container[$db_grupo - 1][$contador_elmentos1]["posicion"] = $db_posicion;
                    $container[$db_grupo - 1][$contador_elmentos1]["grupo"] = $db_grupo;
                    $container[$db_grupo - 1][$contador_elmentos1]["orden"] = $db_orden;
                    $container[$db_grupo - 1][$contador_elmentos1]["contenido_dato"] = $db_contenido_dato;
                }


                if ($db_posicion == "footer") {

                    $db_contenido_datoImg_footer = $db_contenido_dato;
                }

            ?>


                <?php if ($db_posicion == "top") : ?>

                    <!--   <div style="height: 14rem; background-image: linear-gradient(#234187, #284289d5), url(<?php echo $db_contenido_dato ?>); background-size: cover; background-position-y: center; margin-bottom: -9rem;">

                    </div> -->



                    <div class="row" style="margin-bottom: 4rem; margin-top: -8rem;">


                        <div class="col-1-of-2">

                            <div style="display: inline-flex;">


                                <div>

                                    <?php

                                    $nombre_fichero_jpg = 'profile_empleador/profile' . $idEmpresa . '.jpg';
                                    $nombre_fichero_jpeg = 'profile_empleador/profile' . $idEmpresa . '.jpeg';
                                    $nombre_fichero_png = 'profile_empleador/profile' . $idEmpresa . '.png';
                                    $imagen = 0;
                                    if (file_exists($nombre_fichero_jpg)) {
                                        echo "<img src='profile_empleador/profile" . $idEmpresa . ".jpg' alt='logo' class='logo_company'>";
                                        $imagen = 1;
                                    }
                                    if (file_exists($nombre_fichero_jpeg)) {
                                        echo "<img src='profile_empleador/profile" . $idEmpresa . ".jpeg' alt='logo' class='logo_company'>";
                                        $imagen = 1;
                                    }
                                    if (file_exists($nombre_fichero_png)) {
                                        echo "<img src='profile_empleador/profile" . $idEmpresa . ".png' alt='logo' class='logo_company'>";
                                        $imagen = 1;
                                    }
                                    if ($imagen == 0) {
                                        echo "<img src='uploads/logo.jpg' alt='logo' class='logo_company'>";
                                    }


                                    ?>

                                </div>



                                <div style="text-align: start; margin-top: 3.3rem; margin-left: 4rem; display: block; position: relative;">
                                    <h3 style="color: white; margin-bottom: 1rem;" class="description_title-company"><?php echo ucfirst($db_nombre_empresa); ?></h3>
                                    <h3 class="description_title-city"><?php echo $db_ciudad_empresa; ?></h3>
                                    <a href="#" class="description_title-ofertas">Ver <?php echo $count_oferta; ?> Ofertas de empleo</a>

                                    <div style="display: inline-flex; width: 100%; padding-top: 1rem;">

                                        <a style="font-size: 2.6rem; padding-right: 1rem; color: #bbbbbb;" href="#"><i class="fab fa-linkedin"></i></a>
                                        <a style="font-size: 2.6rem; padding-right: 1rem; color: #bbbbbb;" href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a style="font-size: 2.6rem; padding-right: 1rem; color: #bbbbbb;" href="#"><i class="fab fa-twitter-square"></i></a>

                                    </div>

                                </div>


                            </div>



                        </div>


                        <div class="col-1-of-2">

                            <div style="text-align: end; margin-top: 12rem; margin-right: 3rem;">
                                <button onclick="verOfertasAnimation()" class="btn_verofertas">Ver ofertas de empleo</button>
                            </div>

                            <script>
                                function verOfertasAnimation() {
                                    $('html, body').animate({
                                        scrollTop: 800
                                    }, 'slow');
                                }
                            </script>

                        </div>



                    </div>





                <?php endif; ?>



            <?php


                //CIERRE LOOP WHILE
            }


            ?>




            <?php


            $consulta = 0;
            $cantidad_propiedad_elemento = 0;
            $length = count($container);

            for ($c = 0; $c < $length; $c++) {
                $consulta =  $consulta + 1;

            ?>
                <div class="row">
                    <div id="grupo_<?php echo $consulta ?>" style="display: flex;">

                        <?php
                        for ($d = 0; $d < count($container[$c]); $d++) {

                            $cantidad_propiedad_elemento =  $cantidad_propiedad_elemento + 1;

                            if ($container[$c][$d]["tipo_contenido"] == "img") {
                                echo "<div id='elemento_$cantidad_propiedad_elemento" . "_grupo_$consulta" . "' style='padding-left: 1.5rem; padding-right: 1.5rem;' class='elemento_part'>
                                         <img style='width: 100%' src='" . $container[$c][$d]["contenido_dato"] . "' alt='logo' class='profile-img'></div>";
                            }
                            if ($container[$c][$d]["tipo_contenido"] == "txt") {
                                echo "<div id='elemento_$cantidad_propiedad_elemento" . "_grupo_$consulta" . "'style='padding-left: 1.5rem; padding-right: 1.5rem;' class='elemento_part'>
                                    <h1 style='width: 100%;' class='text_descripcion'>" . $container[$c][$d]["contenido_dato"] . "</h1></div>";
                            }

                        ?>

                        <?php
                        }
                        ?>

                    </div>
                </div>

            <?php
                $cantidad_propiedad_elemento =  0;
            }


            ?>

            <div class="row">
                <div id="footer_img">

                </div>
            </div>

        </section>


        <section>

            <?php

            try {


                $request_video = "SELECT * FROM `presentaciones_empresa` WHERE idEmpresa_empresa = $idEmpresa";

                $resul_video = mysqli_query($connection, $request_video);

                if (!$resul_profile) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                $row = mysqli_fetch_array($resul_video);
                $count_videos = mysqli_num_rows($resul_video);


                if ($count_videos <= 0) {
                    $db_url_presentacion = "empty";
                } else {
                    $db_url_presentacion = $row['url'];
                }
            } catch (Exception $e) {
            }


            ?>
            <div class="row">

                <div style="margin-top: 1rem; margin-bottom: 5rem;">

                    <pre id="myCode"></pre>

                </div>

            </div>

            <script>
                function getId(url) {
                    let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                    let match = url.match(regExp);

                    if (match && match[2].length == 11) {
                        return match[2];
                    } else {
                        return 'error';
                    }
                }

                let myId = getId('<?php echo $db_url_presentacion; ?>');

                if (myId == "error") {

                    $('#myCode').html('<h3 class="title-skills"></h3>');

                } else {
                    $('#myCode').html('<iframe height="400px" width="100%"  src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');
                }
            </script>



        </section>

        <section>
        </section>

        <section style="padding-bottom: 10rem;" id="ofertas_section">


            <div class="u-center-text u-margin-botton-8 u-margin-top-2">
                <h2 class="heading-secondary-3"><?php echo $lang["section_lastest-position-title"] ?><span class="heading-color-blue"><?php echo ucfirst($db_nombre_empresa); ?></span></h2>
                <h5 class="heading-secondary-2"><?php echo $lang["section_lastest-position-subtitle"] ?></h5>

            </div>


            <div class="row">



                <?php
                // Ne
                $per_page = 6;

                if (isset($_GET['page'])) {

                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }

                $consulta = "";
                $consulta_skill = "";
                $consulta_categoria_filtro = "";
                $consulta_cargo_filtro = "";
                $consul1 = "";

                $Tipo_trabajo = "";
                $contador = "";



                $post_query_count = "SELECT DISTINCT idOferta, titulo_oferta FROM oferta INNER JOIN empresa ON oferta.Empresa_idEmpresa = empresa.idEmpresa INNER JOIN habilidades_requerida_oferta ON habilidades_requerida_oferta.Oferta_idOferta = oferta.idOferta WHERE aprobado = 1 AND oferta.fecha_expiracion > NOW() AND estado_idEstado = '1' AND Empresa_idEmpresa = $idEmpresa";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);

                $count = ceil($count / $per_page);



                $all_offer = "SELECT DISTINCT idOferta, aprobado, titulo_oferta, descripcion_oferta, salario_mensual, fecha_publicacion, ciudad_general, tipo_contrato, fecha_expiracion, func_resaltar, func_urgente FROM oferta INNER JOIN ciudad ON oferta.ciudad_idCiudad = ciudad.idCiudad INNER JOIN tipos_contrato ON oferta.tipo_idContrato = tipos_contrato.idTipo_contrato INNER JOIN empresa ON oferta.Empresa_idEmpresa = empresa.idEmpresa INNER JOIN habilidades_requerida_oferta ON habilidades_requerida_oferta.Oferta_idOferta = oferta.idOferta WHERE empresa.aprobado = 1 AND oferta.fecha_expiracion > NOW() AND estado_idEstado = '1' AND Empresa_idEmpresa = $idEmpresa limit $page_1, $per_page";




                $resul_all_offer = mysqli_query($connection, $all_offer);
                if (!$resul_all_offer) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                while ($row = mysqli_fetch_array($resul_all_offer)) {
                    $db_idOferta = $row['idOferta'];
                    $db_titulo_oferta = $row['titulo_oferta'];
                    $db_description = $row['descripcion_oferta'];
                    $db_salary = $row['salario_mensual'];
                    $db_func_resaltar = $row['func_resaltar'];
                    $db_func_urgente = $row['func_urgente'];
                    $db_fecha_publicacion = $row['fecha_publicacion'];
                    $db_ciudad_oferta = $row['ciudad_general'];
                    $db_tipo_contrato = $row['tipo_contrato'];

                ?>



                    <div style="box-shadow: 0 0.2rem 1rem #d4d4d4; margin-bottom: 2rem; border-style: solid; border-width: 1px; border-color: 
    <?php
                    if ($db_func_resaltar == 1) {
                        echo "#ecdd00";
                    }
                    if ($db_func_urgente == 1) {
                        echo "#ff0202";
                    }
                    if ($db_func_resaltar == 0 && $db_func_urgente == 0) {
                        echo "#007aff";
                    }

    ?>
    ; background-color: #f7f7f7;" class="story">
                        <div class="row">
                            <div class="col-3-of-4">
                                <div style="display: inline-flex;">
                                    <div style="padding-left: 3rem; padding-right: 3rem;">
                                        <div style="width: 10rem; height: 10rem; color: #0056b4; border-color: #0056b4; border-style: solid; border-radius: 50%; border-width: 1px; margin-top: 16%; font-size: 4rem; text-align: center;">
                                            <h1 style="padding-top: 5px; font-weight: 400;"><?php echo strtoupper($db_titulo_oferta[0]); ?></h1>
                                        </div>

                                    </div>
                                    <div style="padding-left: 0;" class="content-left">
                                        <h3 style="font-size: 1.9rem; font-weight: 600; color: #020202c4;" class="title_company"><?php if ($db_func_urgente == 1) {
                                                                                                                                        echo "<span style='background-color: red; color: white; font-size: 1.3rem; border-radius: 3px; font-weight: 500; padding: 0.1rem 1.1rem 0.1rem 1.1rem; margin-right: 1rem;'>Urgente</span>";
                                                                                                                                    }
                                                                                                                                    echo ucfirst($db_titulo_oferta); ?></h3>
                                        <h4 style="font-size: 1.6rem; font-weight: 400;" class="title_company--sub"><?php echo ucfirst($db_titulo_oferta); ?></h4>
                                        <p style="font-size: 1.4rem;" class="show-read-more title_country"><?php echo ucfirst(substr($db_description, 0, 130)) . "..."; ?></p>

                                        <div>
                                            <ul style="margin-top: 2rem;" id="skills" class="lista-habilidades">

                                                <?php
                                                $query_skills = "SELECT habilidades_generales.nombre_habilidad_general 
            FROM `habilidades_requerida_oferta` 
            INNER JOIN habilidades_generales 
            ON habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales 
            WHERE Oferta_idOferta = '$db_idOferta' LIMIT 4";

                                                $result_skills = mysqli_query($connection, $query_skills);
                                                if (!$result_skills) {
                                                    die("QUERY FAILED" . mysqli_error($connection));
                                                }
                                                while ($row = mysqli_fetch_array($result_skills)) {
                                                    $name_skill = $row['nombre_habilidad_general'];
                                                ?>
                                                    <li style="border-width: 0; color: #0056b4ab; background-color: #0000ff0d;"><?php echo $name_skill; ?></li>

                                                <?php
                                                }

                                                ?>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1-of-4">
                                <div style="text-align: left; margin-top: 7%;" class="content-right">
                                    <h4 style="font-size: 1.3rem; color: gray; margin-bottom: .4rem;" class="title_country"><i style="padding-right: 1.8rem; color: #007aff;" class="fas fa-dollar-sign"></i> <?php echo $db_salary ?></h4>
                                    <h3 style="font-size: 1.3rem; color: gray; margin-bottom: .4rem" class="title_country"><i style="padding-right: 1rem; color: #007aff;" class="far fa-map"></i> <?php echo $db_ciudad_oferta ?></h3>
                                    <h3 style="font-size: 1.3rem; color: gray; margin-bottom: .4rem" class="title_country"><i style="padding-right: 1.3rem; color: #007aff;" class="far fa-calendar-alt"></i>
                                        <?php
                                        $date = new DateTime($db_fecha_publicacion);
                                        echo $date->format('Y-m-d');
                                        ?>
                                    </h3>
                                    <h5 class="title_country"><i style="padding-right: 1.4rem; color: #007aff;" class="far fa-file"></i> <?php echo $db_tipo_contrato ?></h5>
                                    <a onclick="oferta_detalle(<?php echo $db_idOferta ?>)" style="padding: .9rem 1.5rem; font-size: 1.2rem; height: auto;" class="btn-oferta btn-oferta--blue u-margin-top-2">Aplicar</a>
                                </div>
                            </div>

                        </div>

                    </div>





                <?php
                }
                ?>


                <script>
                    function oferta_detalle(id_oferta) {

                        url = "../php/update_status_candidato.php?ofer=" + id_oferta;
                        $.ajax({
                            url: url,
                            beforeSend: function(objeto) {

                            },
                            success: function(data) {

                                location.href = "detalle_oferta.php?ofer=" + id_oferta;
                            }
                        })
                    }
                </script>


                <ul class="pager">

                    <?php


                    if (isset($_GET["page"])) {
                        $current_page_active = $_GET["page"];
                    } else {
                        $current_page_active = 1;
                    }

                    for ($i = 1; $i <= $count; $i++) {

                        echo "<li class='pagination-group'><a id='page_$i' class='pagination-option' href='company.php?empresa={$idEmpresa}&page={$i}'>{$i}</a></li>";
                    }

                    ?>

                </ul>


                <style>
                    .list_pagination {
                        list-style: none;
                        display: inline-block;
                    }

                    .pagination-group {

                        display: inline;
                    }

                    .pagination-option {

                        text-decoration: none;

                        color: black;

                        padding: .5rem 1.5rem .5rem 1.5rem;
                        font-size: 2rem;
                        font-family: 'Poppins', sans-serif;
                        font-weight: 400;
                        border-radius: 2px;

                    }

                    .pagination-option.active {

                        background-color: #1b3fdd;
                        color: white;
                    }
                </style>

                <script>
                    var current_page = <?php echo $current_page_active ?>;

                    $("#page_" + current_page).addClass("active");
                </script>

            </div>

        </section>




        <script>
            $(document).ready(function() {

                let imgFooterLocation = "<?php echo $db_contenido_datoImg_footer; ?>";

                if (imgFooterLocation !== "") {
                    $('#footer_img').append("<img style='width: 100%;' src='" + imgFooterLocation + "' alt='logo' class='profile-img'>");

                } else {

                    $(".section-ofertas").css("padding-bottom", "5rem");
                }


                asignador_grupos(<?php echo json_encode($container); ?>);


                function asignador_grupos(datos) {

                    let contador_elementos = 0;
                    let contador_grupos = 0;
                    let obj = datos;

                    for (let c = 0; c < obj.length; c++) {
                        contador_grupos = contador_grupos + 1;

                        let partes_grupo = Object.keys(obj[c]).length;



                        for (let d = 0; d < partes_grupo; d++) {

                            if (contador_elementos < 4) {


                                if (obj[c][d]["tipo_contenido"] == "img") {



                                    const order = obj[c][d]["orden"];
                                    let order_array = order ? order.split('|') : [];
                                    let indice = order_array.indexOf('2');

                                    $("#elemento_1_grupo_" + obj[c][d]["grupo"]).css("order", indice + 1);
                                }

                                if (obj[c][d]["tipo_contenido"] == "txt") {

                                    const order1 = obj[c][d]["orden"];
                                    let order_array1 = order1 ? order1.split('|') : [];
                                    let indice1 = order_array1.indexOf('1');
                                    indice1 = indice1 + 1;

                                    $("#elemento_2_grupo_" + obj[c][d]["grupo"]).css("order", indice1);
                                }
                            }
                        }
                        contador_elementos = 0;

                    }
                }

            });
        </script>

    </main>
    <?php include "footer.php"; ?>
    <?php include "popup.php"; ?>
</body>

</html>